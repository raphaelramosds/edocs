<h1 align="center">📄 <b>Edocs</b></h1>

## 🚀 Technologies

This application was built with

- Laravel 10.x (PHP framework)
- Blade Engine
- Tailwind CSS

## How to run

Install PHP, Node.js and Composer. After, install vite

```
npm install --save-dev vite laravel-vite-plugin
npm install --save-dev @vitejs/plugin-vue
```

Now, install the project dependencies

```
composer install
npm install
```

Rename .env.example as .env and edit the database lines as follow

```
DB_CONNECTION=sqlite
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Then run

```
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Start the project

```
php artisan serve
npm run deve
```

##  💻 Project

Eletronic docs is a system where users can follow announcements status. It allows an administrator to create, update and delete announcements and its attachments. Then, a guest user can see all registeres documents.

## 🔍 Architecture

Edocs's main class is **Document** which has a one-to-one relationship with **Announcement** class, since a document, on the context of this application, can be related to an announcement, a minute and a resolution. These last two type of documents will be implemented soon. **Announcement**, in turn, can be related with many **Attachment** registers.
