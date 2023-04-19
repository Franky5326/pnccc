<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'books';
    protected $fillable = [
        'id',
        'name',
        'author',
        'year',
        'description',
        'count',
        'photo',
    ];
    public function photo($img)
    {
        $photo = time() . $img['name'] ;
        $this->photo = $photo;
        move_uploaded_file($img['tmp_name'], __DIR__ . '/../../public/assets/img/' . $photo);
    }


}