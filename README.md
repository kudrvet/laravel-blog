# Задание   
Реализована бэкенд часть задания - rest api.   
[Полное описание](https://gist.github.com/5aava/672492097c6b2a033c2d7e0a737a643e#%D0%BC%D0%B8%D0%BD%D0%B8%D0%B0%D1%82%D1%8E%D1%80%D0%B0-%D1%81%D1%82%D0%B0%D1%82%D1%8C%D0%B8)
# Технологии:
- laravel 8 framework
- mysql db
- redis
- docker

Работа с :
- rest api
- кешерование
- очереди
- выполнение задач по расписанию
# Требования к проекту
- docker

# Установка
- ./setup.sh

## Роуты:
- Все ответы в формате json. 
- Каждый ответ содержит поле 'success' true  или false
- В случае успеха ответ содержит поле 'data'
- При ошибке ответ содержит поля  'exception' и 'message'

### Домашняя страница
GET /api
____
### Список статей :   
GET /api/articles
____
### Станица статьи :  
GET /api/articles/{slug}
___
### Создание комментария :   
POST /api/articles/{articleId}/comments
body : 
```json
{
	"subject": "Хайповая статья",
	"body": "Это неверотяно, но php не умер!"
}
```
____
### Увеличение счетчика лайков статьи
PATCH /api/articles/{articleId}/likes
_____
### Увеличение счетчика просмотров статьи
PATCH /api/articles/{articleId}/views
### Дополнительно
Дополнительно доступны  веб-роуты для мониторинга:
- /telescope - для локальной разработки развернут пакет telescope для мониторинга работы приложения
- /horizon - мониторинг очередей






        