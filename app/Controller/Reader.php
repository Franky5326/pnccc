<?php

namespace Controller;

use Model\Books;
use Model\Readers;
use Model\UserBooks;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

class Reader{
    public function addReader (Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'first_name' => ['required', 'cyrillic'],
                'last_name' => ['required', 'cyrillic'],
                'address' => ['required', 'all'],
                'number' => ['required', 'number'],
            ], [
                'required' => 'Поле :field пусто',
                'all' => 'Поле :field может состоять из кириллицы, латиницы и цифр',
                'number' => 'Поле :field должно состоять из цифр',
                'cyrillic' => 'Поле :field может состоять из кириллицы и латиницы',
            ]);

            if($validator->fails()){
                return new View('forms.addReader',
                    ['message' => $validator->errors()]);
            }
            if( Readers::create($request->all())){
                app()->route->redirect('/books');
            }
        }
        return new View('forms.addReader');

    }

    public function readers (Request $request): string
    {
        $readers = Readers::all();
        $books = Books::all();
        if($request->method === 'POST'){
            $readerq = UserBooks::where('book_id', $request->book_id)->get();
            $readers = [];
            foreach ($readerq as $a) {
                array_push($readers, $a->reader);
            }
        }
        return (new View())->render('site.reader', ['readers' => $readers,  'books' => $books]);
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
            $validator = new Validator($request->all(), [
                'id_read' => ['required', 'number'],

            ], [
                'required' => 'Поле :field пусто',
                'number' => 'Поле :field должно состоять из цифр',
            ]);

            if($validator->fails()){
                return new View('forms.listBook',
                    ['message' => $validator->errors()]);
            }
            return (new View())->render('forms.listBook', ['readers' => $reader, 'request' => $request]);
        }
    }

}