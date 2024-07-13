## Приложение для управлениями задачами через api.

### Для локального тестирования приложения Вам необходимо выполнить несколько действий:

- Клонировать репозиторий на свою машину
- в корне проекта запустить команду make init

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
- api/task/search - GET|HEAD поиск задач, имеет 2 необязательных параметра
  {
    - timestamps - метка времени в формате timestamps
    - status - string
  }
