<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Fornecedor extends Model
{
    //
    protected $table = 'fornecedores';
    
    public function getForns() {
        $query = DB::table('fornecedores')
            ->select('id', 'razao')
            ->get();

        return $query;
    }
}
