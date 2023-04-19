<?php
namespace Controller;
use Model\Books;
use Model\Readers;
use Model\UserBooks;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

class UserBook{

    public function addUserBook (Request $request): string
    {
        $books = Books::all();
        $readers = Readers::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'library_card_id' => ['required'],
                'book_id' => ['required'],
                'date_of_issue' => ['required'],
                'delivery_date' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('forms.addUserBook',
                    ['message' => $validator->errors(), 'readers' => $readers, 'books' => $books]);
            }
            if( UserBooks::create($request->all())){
                app()->route->redirect('/books');
            }

        }
        return new View('forms.addUserBook', ['books' => $books, 'readers' => $readers]);
    }
}