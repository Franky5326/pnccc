<?php

namespace Controller;

use Model\Books;
use Src\View;
use Src\Request;


class Book{
    public function books(Request $request): string
    {
        $books = Books::all();
        return new View('site.books', ['books' => $books]);

    }
}