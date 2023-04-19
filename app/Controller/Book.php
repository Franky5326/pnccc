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
    public function bookRating(Request $request): string
    {
        $books = Books::all();
        $readers = Readers::all();
        $arr = [];
        foreach ($books as $book) {
            $reting = count(UserBooks::where('book_id', $book->id)->get());
            array_push($arr, $reting);

        }
        return (new View())->render('site.bookReting', ['readers' => $readers,  'books' => $books, 'arr'=>$arr]);
    }

    public function addBook(Request $request): string
    {
        if ($request->method === 'POST'){

            $validator = new Validator($request->all(), [
                'name' => ['required','cyrillic'],
                'author' => ['required', 'cyrillic'],
                'year' => ['required', 'number' , 'year'],
                'description' => ['required', 'all'],
                'count' => ['required', 'number'],
                'photo'=> ['required', 'image'],

            ], [
                'required' => 'Поле :field пусто',
                'cyrillic' => 'Поле :field может состоять из кириллицы и латиницы',
                'all' => 'Поле :field может состоять из кириллицы, латиницы и цифр',
                'number' => 'Поле :field должно состоять из цифр',
                'year' => 'Поле :field должно содержать не более 4 цифр',
                'image' => 'Поле :field должно состоять из картинки png или jpeg или webp',
            ]);

            if($validator->fails()){
                return new View('forms.addBook',
                    ['message' => $validator->errors()]);

            }else{
                $project = Books::create($request->all());
                $project->photo($_FILES['photo']);
                $project->save();
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
                'name' => ['required','cyrillic'],
                'author' => ['required', 'cyrillic'],
                'year' => ['required', 'number' , 'year'],
                'description' => ['required', 'all'],
                'count' => ['required', 'number'],
                'photo'=> ['required', 'image'],
            ], [
                'required' => 'Поле :field пусто',
                'cyrillic' => 'Поле :field может состоять из кириллицы и латиницы',
                'all' => 'Поле :field может состоять из кириллицы, латиницы и цифр',
                'number' => 'Поле :field должно состоять из цифр',
                'year' => 'Поле :field должно содержать не более 4 цифр',
                'image' => 'Поле :field должно состоять из картинки png или jpeg или webp',
            ]);

            if($validator->fails()){
                return new View('forms.editBook',
                    ['message' => $validator->errors(), 'books' => $books]);
            } else {

                $books[0]->count = $request->count;
                $books[0]->author = $request->author;
                $books[0]->name = $request->name;
                $books[0]->year = $request->year;
                $books[0]->description = $request->description;
                $books[0]->photo($_FILES['photo']);
                $books[0]->save();
                app()->route->redirect('/books');
            }
        }
        return (new View())->render('forms.editBook', [ 'books' => $books ]);

    }

}