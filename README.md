# Bitrix-Volt

Модуль подключения шаблонизатора Volt из фреймворка Phalcon для Битрикс

## Установка

* Загрузить и установить модуль через Маркетплейс Битрикс. 
* После установки он появится в пункте "установленные решения" - "Шаблонизатор Volt".
* Установить фреймворк Phalcon https://phalconphp.com/ru/download

## Использование

* В init.php необходимо подключить модуль с помощью `CModule::IncludeModule("olympia.volt");`.
* Для обработки шаблонизатором Volt шаблон должен иметь расширение `.volt`.

## Работа с шаблонами

### Переменные Битрикс, передаваемые в Twig-шаблон

* `PARAMS` — `$arParams`;
* `RESULT` — `$arResult`;
* `LANG` — `$arLangMessages`;
* `template` — `$template`;
* `templateFolder` — `$templateFolder`;
* `parentTemplateFolder` — `$parentTemplateFolder`.
