<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'validators' => [
        'required' => \Validator\RequireValidator::class,
        'unique' => \Validator\UniqueValidator::class
    ],
    'routeAppMiddleware' => [
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
        'csrf' => \Middlewares\CSRFMiddleware::class,
    ],
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
        'user' => \Middlewares\UserMiddleware::class,
    ]
];

