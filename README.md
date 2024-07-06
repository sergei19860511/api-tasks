## Приложение для управлениями задачами через АПИ.

### Для тестирования приложения Вам необходимо выполнить ряд действий:

- Клонировать репозиторий на свою машину
- Перейти в корень проекта и выполнить composer install
- Выполнить команду alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)' для привязки алиаса
- Запустить сервер sail up, убедиться что все контейнеры запущены
- Выполнить миграции sail artisan migrate
- Выполнить сиды sail artisan db:seed

### Приложение имеет несколько эндпоинтов

- api/task - GET|HEAD просмотреть все задачи
  - api/task - POST создать задачу, имеет ряд обязательных параметров
  {
    - title - string
    - description - string
    - status - string
    - deadline - string
  }
- api/task/{task} - GET|HEAD просмотреть конкретную задачу, {task} обязательный, id задачи 
- api/task/{task} - PUT|PATCH редактировать задачу, {task} обязательный, id задачи
  {
    - title - string
    - description - string
    - status - string
    - deadline - string
  }
- api/task/{task} - DELETE удалить задачу, {task} обязательный, id задачи
- api/tasks/search - GET|HEAD поиск задач, имеет 2 необязательных параметра
  {
    - timestamps - метка времени в формате timestamps
    - status - string
  }
