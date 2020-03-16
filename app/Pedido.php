<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function getPedidos() {
        $query = DB::table('pedidos as ped')
            ->join('users as u', 'ped.telefone', '=', 'u.telefone' )
            ->select('ped.*', 'u.name as cliente_nome', 'u.telefone as cliente_telefone')
            ->get();
        return $query;
    }

}
