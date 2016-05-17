# Telegram-rocketeer plugin

Отправляет простые сообщения о деплоях.  

## Установка

### Шаг 1 

* Отправить сообщение /newbot контакту @botfather в Telegram
* Ввести имя бота. После этого botfather запросит username бота. Оно должно заканчиватся словом bot. Например: Rocketeer-Telegrambot
* Botfather ответит, что бот создан и даст токен бота. Например: 189098728:AAGurjzHT2gnbz7LCWiPbHs8dil-GBhmzEo. Сохраните его.

### Шаг 2

Для установки добавьте в composer.json:

```
"repositories":[
    {
      "type":"vcs",
      "url":"git@git.am15.net:advmaker/Telegram-rocketeer.git"
    }
  ],
  "require": {
    "advmaker/Telegram-rocketeer": "dev-master"
  }
```

Выполните команды:

```
Rocketeer plugin:install advmaker/Telegram-rocketeer
Rocketeer plugin:config advmaker/Telegram-rocketeer
```
Затем добавьте в массив plugins в файле .Rocketeer/config.php:

```
    'plugins'          => ['Rocketeer\Plugins\Telegram\RocketeerTelegram',
    ],
```
Проверьте загрузился ли плагин командой:

```
Rocketeer plugin:list
```
Должно получиться:

```
+----------------------------------------------+
| Plugin                                       |
+----------------------------------------------+
| Rocketeer\Plugins\Telegram\RocketeerTelegram |
+----------------------------------------------+
```
Это значит что плагин загружен и будет посылать сообщения в соответствии c заданной конфигурацией.

### Шаг 3 

Отредактируйте файл .Rocketeer/plugins/rocketeers/Telegram-rocketeer/config.php:
Введите полученый у Botfather token в api_key, введите его имя, и id чата куда он будет слать сообщения.
Например:
```
    'api_key'=>'123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11',
    'bot_name'=>'Rocketeer-Telegram',
    'chat_id'=>'12345678',

    'messages'=>[		'before_deploy' => '{1} is deploying "{2}" on "{3}" ({4})',
        'after_deploy'  => '{1} finished deploying branch "{2}" on "{3}" ({4})',]

];
```
Для того чтобы узнать chat_id:
Добавьте бота в группу и получите list of updates url запросом:
```
https://api.telegram.org/bot(api_key)/getUpdates

```
Например:
```
https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/getUpdates
```
Получаем:
```
{"update_id":8393,"message":{"message_id":3,"from":{"id":7474,"first_name":"AAA"},"chat":
{"id":,"title":""},"date":25497,"new_chat_participant":
{"id":71,"first_name":"NAME","username":"YOUR_BOT_NAME"}}}
```
Берите "id" элемента "chat"

Все. Плагин успешно установлен и настроен.