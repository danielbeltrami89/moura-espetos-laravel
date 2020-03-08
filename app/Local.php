<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Local extends Model
{
    protected $table = 'locais';

    public function getLocais() {
        $query = DB::table('locais')
            ->select('id', 'nome')
            ->get();

        return $query;
    }
}
