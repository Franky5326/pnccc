<?php

namespace Controller;

use Model\Books;
use Model\Readers;
use Src\View;
use Src\Request;


class Book{
    public function books(Request $request): string
    {
        $books = Books::all();
        $readers = Readers::all();
        return new View('site.books', ['books' => $books, 'readers' => $readers ]);

    }

    public function addBook(Request $request): string
    {
        if ($request->method === 'POST' && Books::create($request->all())) {
            app()->route->redirect('/books');
        }
        return new View('forms.addBook');
    }

    public function editBook(Request $request): string
    {
        $books = Books::where('id', $request->id)->get();
        if ($request->method === 'POST') {
            $books[0]->count = $request->count;
            $books[0]->author = $request->author;
            $books[0]->name = $request->name;
            $books[0]->year = $request->year;
            $books[0]->description = $request->description;
            $books[0]->save();
            app()->route->redirect('/books');
        }
        return (new View())->render('forms.editBook', [ 'books' => $books ]);

    }
}