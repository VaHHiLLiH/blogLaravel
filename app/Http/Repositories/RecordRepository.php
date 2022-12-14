<?php

namespace App\Http\Repositories;

use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RecordRepository
{
    public function getPeaceRecords(Request $request)
    {
        /*$records =*/return DB::select("SELECT r.id, r.name as title, r.slug, r.description, r.image, u.name as author, u.id FROM records r LEFT JOIN users u ON (u.id = r.author_id) LIMIT " . $request->get('start') . ", " . $request->get('count'));

        /*$records = DB::table('records')->skip($request->get('start'))->take($request->get('count'))->get();

        foreach ($records as $record) {
            $post = Record::find($record->id);
            dd($post->user->get());
            $record->author = User::find($post->user);
        }*/

        //return $records;
    }

    public function getAllRecords()
    {
        return DB::table('records')->count();
    }

}
