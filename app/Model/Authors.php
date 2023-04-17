<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'authors';
    protected $fillable = [
        'author_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'date_of_dirth',
        'biography',
        'photo'
    ];
}