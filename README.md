Необходимо реализовать сервис со следующим функционалом на языке PHP с использованием фреймворка Yii2.

В базе данных Mysql/PosgreSql должна быть таблица currency c колонками:

id — первичный ключ

name — название валюты

rate — курс валюты к рублю

insert_dt – время обновления валюты

Должна быть консольная команда для обновления данных в таблице currency.

Данные по курсам валют можно взять отсюда: http://www.cbr.ru/scripts/XML_daily.asp

Таблица в БД должна создаваться через миграции yii.

Реализовать 2 REST API метода:
GET /currencies — должен возвращать список курсов валют с возможность пагинации
GET /currency/ — должен возвращать курс валюты для переданного id
