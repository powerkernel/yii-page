Yii Static Page
===============

Prerequisites
-------------
- [Yii API Starter Kit](https://github.com/powerkernel/yii-api-starter-kit)
- [Yii Common](https://github.com/powerkernel/yii-common)
- [Yii Auth API](https://github.com/powerkernel/yii-auth)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).
Either run

```
composer require powerkernel/yii-page "@dev"
```

or add

```
"powerkernel/yii-page": "@dev"
```

to the require section of your `composer.json` file

DB Migration
------------
Run in `/bin` directory

```
php yii mongodb-migrate --migrationPath=@vendor/powerkernel/yii-page/src/migrations --migrationCollection=page_migration
```

API Documentation
-----------------
[View on Postman](https://to-be-doc.io)