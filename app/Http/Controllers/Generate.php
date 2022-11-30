<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class Generate extends Controller
{
    public function generateRecord(int $count)
    {
        $posts = Record::factory()->count($count)->for(User::factory()->create())->create();
        dd($posts);
    }

    public function generateComment(int $count)
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->count($count)->for(Record::factory()->create([
            'author_id' => $user->id,
        ]))->create([
            'author_id' => $user->id,
        ]);
        dd($comment);
    }

    public function generateUser(int $count)
    {
        $users = User::factory()->count($count)->create();
        dd($users);
    }
}
