<?php
namespace Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UserBooks extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'userbooks';
    protected $fillable = [
        'id',
        'library_card_id',
        'book_id',
        'date_of_issue',
        'delivery_date',
    ];
    public function book():BelongsTo
    {
        return $this->BelongsTo(
            Books::class,
            'book_id',
            'id',
        );
    }

    public function reader():BelongsTo
    {
        return $this->BelongsTo(
            Readers::class,
            'library_card_id',
            'id',
        );
    }

    protected static function booted()
    {
        static::created(function ($userBook) {
            $book = Books::find($userBook->book_id);
            $book->count--;
            $book->save();
            $userBook->save();
        });
    }
}