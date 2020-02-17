### Тестовое задание

Я с год не программировал на Symfony, потому подзабыл кое-что. Прошу не критиковать сильно. 

Извиняюсь, не успел проработать Docker.

#### Порядок установки

Для проекта требуется php = ^7.4

```
wget https://get.symfony.com/cli/installer -O - | bash

composer install

symfony server:start
```

Либо сконфигурировать веб-сервер в соответствии с документацией
```https://symfony.com/doc/4.4/setup/web_server_configuration.html```

#### Тесты
```
php bin/phpunit
```

#### Документация
```/api/doc```