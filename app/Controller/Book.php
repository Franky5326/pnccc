<?php

namespace Controller;

use Model\Books;
use Model\Readers;
use Model\UserBooks;
use Src\View;
use Src\Request;
use Src\Validator\Validator;


class Book{
    public function books(Request $request): string
    {
        $books = Books::all();
        $readers = Readers::all();
        $bookq = null;
        if($request->method === 'POST'){
            $bookq = UserBooks::where('library_card_id', $request->library_card_id)->get();
            $books = [];
            foreach ($bookq as $book) {
                array_push($books, $book->book);
            }
        }
        return (new View())->render('site.books', ['readers' => $readers,  'books' => $books, 'bookq' => $bookq]);
    }

    public function addBook(Request $request): string
    {
        if ($request->method === 'POST'){

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'author' => ['required'],
                'year' => ['required'],
                'description' => ['required'],
                'count' => ['required'],

            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('forms.addBook',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Books::create($request->all())){
                app()->route->redirect('/books');
            }
        }

        return new View('forms.addBook');
    }

    public function editBook(Request $request): string
    {
        $books = Books::where('id', $request->id)->get();
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                '$request->name' => ['required'],
                '$request->author' => ['required'],
                '$request->count' => ['required'],
                '$request->year' => ['required'],
                '$request->description' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('forms.editBook',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
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