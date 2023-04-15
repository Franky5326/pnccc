<?php

namespace Controller;

use Model\Books;
use Model\Readers;
use Src\View;
use Src\Request;


class Reader{
    public function addReader (Request $request): string
    {
        if ($request->method === 'POST' && Readers::create($request->all())) {
            app()->route->redirect('/books');
        }
        return new View('forms.addReader');

    }

    public function readers (Request $request): string
    {
        $reader = Readers::all();
        $books = Books::all();
        return (new View())->render('site.readers', ['readers' => $reader, 'books' => $books,]);
    }

    public function profileReader (Request $request): string
    {
        $reader = Readers::where('id', $request->id)->get();
        $books = Books::all();
        return (new View())->render('site.profileReader', ['readers' => $reader, 'books' => $books,]);

    }

}