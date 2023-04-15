<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'Books';
    protected $fillable = [
        'book_id',
        'name',
        'year',
        'description',
        'count',
        'photo',
    ];
}