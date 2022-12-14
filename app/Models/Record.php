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
        'like',
        'looked',
    ];

    protected $guarded = [
        'slug',
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'likes', 'record_id', 'user_id');
    }
}
