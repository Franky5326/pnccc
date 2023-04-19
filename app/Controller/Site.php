<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required', 'cyrillic'],
                'login' => ['required', 'unique:users,login', 'latinNumber'],
                'password' => ['required', 'latinNumber']
            ], [
                'required' => 'Поле :field пусто',
                'cyrillic' => 'Поле :field может состоять из кириллицы и латиницы',
                'number' => 'Поле :field должно состоять из цифр',
                'latinNumber' => 'Поле :field должно состоять из латинских букв или цифр',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('forms.signup',
                    ['message' => $validator->errors()]);
            }
            if( User::create($request->all())){
                app()->route->redirect('/login');
            }
        }
        return new View('forms.signup');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('forms.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/books');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('forms.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/login');
    }
}
