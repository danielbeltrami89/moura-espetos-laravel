<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tipo extends Model
{
    protected $table = 'tipo';

    public function getTipos() {
        $query = DB::table('tipo')
            ->select('id', 'nome')
            ->get();

        return $query;
    }
}
