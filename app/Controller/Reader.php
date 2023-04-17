<?php

namespace Controller;

use Model\Books;
use Model\Readers;
use Model\UserBooks;
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
        return (new View())->render('site.reader', ['readers' => $reader, 'books' => $books,]);
    }

    public function profileReader (Request $request): string
    {
        $reader = Readers::where('id', $request->id)->get();
        $books = Books::all();
        return (new View())->render('site.profileReader', ['readers' => $reader, 'books'=>$books]);

    }

    public function listReaderBook (Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('forms.listBook',[ 'request' => $request]);
        }
        if ($request->method === 'POST') {
            $reader = Readers::where('id', $request->id_read)->get();
            return (new View())->render('forms.listBook', ['readers' => $reader, 'request' => $request]);
        }

    }

}