Test Project "Todo list". Backend: YII2, Frontend: Angular6.

<h2>Install:<h2>

<h6>YII2</h6>

```
1. create your virtul domen (default is http:\\todo.loc)
```

```
2. $ git clone https://github.com/tee-moore/todo.git
```

```
3. $ composer update
```

```
4. $ php init 
```

```
5. Select 0 (Development env)
```

```
5. create database
```

```
6. set database name, username, password: common\config\main-local.php
```

```
7. $ php yii migrate
```


<h6>Angular</h6>
<p>open folder 'angular' and:</p>


```
1. Install angular globally if needed: $ npm install -g @angular/cli
```
```
2. $ npm install
```

```
3. add virtul domen for api backend to src\app\config.ts (default is http:\\todo.loc)
```

```
4. $ ng serve --open
```

<h6>Testing</h6>

```
1. create database for testing
```
```
2. set database name, username, password: common\config\test-local.php
```

```
3. $ ./yii_test migrate
```
```
4. $ vendor/bin/codecept build
```
```
5. run server: $ php -S 127.0.0.1:8080 -t backend/web/
```
```
6. run tests: $ vendor/bin/codecept run -- -c backend
```



<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
