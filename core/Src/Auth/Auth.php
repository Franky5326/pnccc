<?php

namespace Src\Auth;

use function Collect\collection;

class Auth
{
    //Свойство для хранения любого класса, реализующего интерфейс IdentityInterface
    private static IdentityInterface $user;

    //Инициализация класса пользователя
    public static function init(IdentityInterface $user): void
    {
        self::$user = $user;
        if (self::user()) {
            self::login(self::user());
        }
    }

    //Вход пользователя по модели
    public static function login(IdentityInterface $user): void
    {
        self::$user = $user;
        collection()->set('id', self::$user->getId());
        collection()->set('role', self::$user->getRole());
    }

    //Аутентификация пользователя и вход по учетным данным
    public static function attempt(array $credentials): bool
    {
        if ($user = self::$user->attemptIdentity($credentials)) {
            self::login($user);
            return true;
        }
        return false;
    }
    public static function generateCSRF(): string
    {
        $token = md5(time());
        collection()->set('csrf_token', $token);
        return $token;
    }


    public static function chRole()
    {
        $role = collection()->get('role') ?? 0;
        return $role;
    }

    //Возврат текущего аутентифицированного пользователя
    public static function user()
    {
        $id = collection()->get('id') ?? 0;
        return self::$user->findIdentity($id);
    }

    //Проверка является ли текущий пользователь аутентифицированным
    public static function check(): bool
    {
        if (self::user()) {
            return true;
        }
        return false;
    }


    public static function checkRole(): bool
    {
        if (self::chRole()) {
            return true;
        }
        return false;
    }

    //Выход текущего пользователя
    public static function logout(): bool
    {
        collection()->clear('id');
        return true;
    }

}
