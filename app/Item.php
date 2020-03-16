<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    protected $table = 'itens';

    public function getItens() {
        $query = DB::table('itens as i')
            ->select('i.*')
            ->get();
        return $query;
    }

    public function getTop5Itens() {
        $query = DB::table('itens as i')
            ->select('i.*')
            ->orderBy('i.id', 'desc')->take(5)
            ->get();            

        return $query;
    }
}
