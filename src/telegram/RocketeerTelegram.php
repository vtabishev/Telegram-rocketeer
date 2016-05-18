<?php

namespace Rocketeer\Plugins\Telegram;

use Illuminate\Container\Container;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use Rocketeer\Plugins\AbstractNotifier;


/**
 * Telegram plugin for Rocketeer
 */
class RocketeerTelegram extends AbstractNotifier
{
    /**
     * RocketeerTelegram constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        parent::__construct($app);
        $this->configurationFolder = __DIR__ . '/../config';
    }

    /**
     * @param Container $app
     * @return Container
     */
    public function register(Container $app)
    {
        $app->bind('Telegram', function ($app) {
            return new Telegram(
                $app['config']->get('rocketeer-telegram::api_key'),
                $app['config']->get('rocketeer-telegram::bot_name')
            );
        });

        return $app;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function getMessageFormat($message)
    {
        return $this->app['config']->get('rocketeer-telegram::' . $message);
    }

    /**
     * @param string $message
     */
    public function send($message)
    {
        Request::initialize($this->Telegram);
        $notify = [
            'text'    => $message,
            'chat_id' => $this->config->get('rocketeer-telegram::chat_id'),
        ];
        Request::sendMessage($notify);
    }
}
