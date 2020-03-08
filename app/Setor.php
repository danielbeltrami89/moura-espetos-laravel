<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Setor extends Model
{
    //
    protected $table = 'setores';

    public function getSetores() {
        $query = DB::table('setores')
            ->select('id', 'nome')
            ->get();

        return $query;
    }
}
