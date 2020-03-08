<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class NomeItem extends Model
{

    protected $table = 'nome_item';

    public function getNomes() {
        $query = DB::table('nome_item')
            ->select('id', 'nome')
            ->get();

        return $query;
    }
}
