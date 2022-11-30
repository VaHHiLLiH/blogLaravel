<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'author_id',
    ];

    /**
     * @User автор этой записи
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'record_id');
    }
}
