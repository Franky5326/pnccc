<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'validators' => [
        'required' => \Validator\RequireValidator::class,
        'unique' => \Validator\UniqueValidator::class,
        'number' => \Validator\NumbersValidator::class,
        'cyrillic' => \Validator\CyrillicValidator::class,
        'all' => \Validator\AllValidator::class,
        'image' => \Validator\ImageValidator::class,
        'year' => \Validator\YearValidator::class,
        'latinNumber' => \Validator\LatinNumberValidator::class,
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

