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


}