# Тестовое задание - FutureGroup

## Инициализация проекта
1. Клонировать репозиторий
2. Запустить докер ``docker-compose build && docker-compose up``
3. Зайти в образ: ``docker exec -it notebook-app bash``
4. Установить зависимости проекта ``composer install``
5. Создать .env ``cp .env.example .env``
6. Сгенерировать API_KEY ``php artisan key:generate``
7. Запустить миграции ``php artisan migrate``

## Структура проекта
1. Работа с записной книжкой: app/Http/Controllers/NotebookController.php
2. Работа с хранилищем: app/Http/Controllers/StorageController.php
3. API маршруты: routes/api.php

## Тестирование
Тестирование проводилось с помощью интрумента тестирования - [https://www.postman.com/](Postman)

## Документирование
Swagger - находится по пути: public/openapi.yaml
