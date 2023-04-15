<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Readers extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'readers';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'patronymic',
        'address',
        'number'
    ];
    protected static function booted()
    {
        static::created(function ($readers) {
            $readers->save();
        });
    }

    public function readBook():HasMany
    {
        return $this->HasMany(
            UserBooks::class,
            'library_card_id',
            'id',
        );
    }
}