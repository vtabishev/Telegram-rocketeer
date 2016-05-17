# Telegram-rocketeer plugin

Отправляет простые сообщения о деплоях.  

## Установка

### Шаг 1 

* Отправить сообщение /newbot контакту @botfather в Telegram
* Ввести имя бота. После этого botfather запросит username бота. Оно должно заканчиватся словом bot. Например: Rocketeer-Telegrambot
* Botfather ответит, что бот создан и даст токен бота. Например: 189098728:AAGurjzHT2gnbz7LCWiPbHs8dil-GBhmzEo. Сохраните его.

### Шаг 2

Для установки добавьте в .rocketeer/composer.json:

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
rocketeer plugin:install advmaker/Telegram-rocketeer
rocketeer plugin:config advmaker/Telegram-rocketeer
```

Затем добавьте в массив plugins в файле .rocketeer/config.php:

```
    'plugins'          => ['Rocketeer\Plugins\Telegram\RocketeerTelegram',
    ],
```
Выполните команду:

```
rocketeer plugin:list
```
Должно получиться:

```
+----------------------------------------------+
| Plugin                                       |
+----------------------------------------------+
| Rocketeer\Plugins\Telegram\RocketeerTelegram |
+----------------------------------------------+
```
Это значит что плагин загружен.

### Шаг 3 

Отредактируйте файл .rocketeer/vendor/advmaker/Telegram-rocketeer/src/config/config.php:
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
Добавьте бота в группу назначив его администратором, отправьте личное сообщение в чате и получите list of updates запросом url:
```
https://api.telegram.org/bot(api_key)/getUpdates

```
Например:
```
https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/getUpdates
```
Получаем:
```
"message":{"message_id":9,
"from":{"id":175846562,"first_name":"test","last_name":"test","username":"test"},
"chat":{"id":123456,"title":"test","type":"group"},
"date":1463496376,"text":"test","entities":[{"type":"mention","offset":0,"length":12}]}}]}
```
Берите "id" элемента "chat"

Все. Плагин успешно установлен и настроен.