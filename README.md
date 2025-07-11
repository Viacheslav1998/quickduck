# PET проект (Quickduck.com)

Современный информационно-новостной Сайт по современным технологиям

Используется CodeIgniter4

---

## Установка

### шаг - 1
```bash

composer install 
composer update
```
(тестировал сам работает)
### шаг - 2
- Настрой свой `.env` / скопируй с файла .env.example.conf в свой .env

### шаг - 3
- На сервере нужно указать папку `/public`, чтобы сайт корректно заработал [XAMPP]
- вот тут C:\xampp\apache\conf\extra\httpd-vhosts.conf

- не стоит забывать про C:\Windows\System32\drivers\etc\hosts [для windows]
- изменения что бы локалка заработала 

- sudo nano /etc/hosts [для linux]

```apache
<VirtualHost *:80>
    ServerName quickduck.com
    DocumentRoot "D:/xampp/htdocs/quickduck/public"

    <Directory "D:/xampp/htdocs/quickduck/public">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
    </Directory>
</VirtualHost>
```

### шаг - 4
- нужно создать в директории writable > cache а то ругается
---

## Рекомендации по серверу

- PHP версии 8.1
- MySQL
- `json` — включено по умолчанию
- `mysqlnd` — для работы с MySQL
- `libcurl` — если будешь использовать HTTP\CURLRequest library

---
### шаг - 5
## Работа с фронтендом (VUE3)

Поскольку у нас монолит и мы используем VUE3 — так вышло, такое бывает!

Для запуска нужно сделать следующее:

```bash
cd public/vue-app/
npm install
npm run format
npm run dev
```

---
### шаг - 6
## Административная панель

Чтобы управлять сайтом, нужна админка.  
В моём профиле есть репозиторий с админкой — называется `cms-quickduck`.  
Вот ссылка: https://github.com/Viacheslav1998/cms-quickduck  
Там есть инструкция по применению!

---

> **ВНИМАНИЕ:**  
> Будь осторожен с CORS, потому что им разрешено всё — не для продакшена!  
> Но ты можешь настроить как нужно, если вдруг захочешь использовать где-то в реальности.

---

По идее — готово!

## DEMO
![single](duck-space.png)