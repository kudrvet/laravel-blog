#Задание
Реализована бэкенд часть задания, то есть только rest api.

[Полное описание](https://gist.github.com/5aava/672492097c6b2a033c2d7e0a737a643e#%D0%BC%D0%B8%D0%BD%D0%B8%D0%B0%D1%82%D1%8E%D1%80%D0%B0-%D1%81%D1%82%D0%B0%D1%82%D1%8C%D0%B8)
# Требования к проекту
- php8 + 
- redis (кеш + очереди)
- sql database (mysql for ex)

# Установка
- git clone
- создаем файл .env на базе .env.example
- прописыаем переменные окружения для db и redis
- make setup (сервер развернется на 80 порту)