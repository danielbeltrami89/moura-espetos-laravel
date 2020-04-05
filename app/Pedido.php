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
            ->orderBy('ped.created_at', 'asc')
            ->get();
        return $query;
    }

    public function getPedido($pedido_id) {
        $query = DB::table('pedidos as ped')
            ->join('users as u', 'ped.telefone', '=', 'u.telefone' )
            ->select('ped.*', 'u.name as cliente_nome', 'u.telefone as cliente_telefone', 'u.endereco as cliente_endereco')
            ->where('ped.id', '=', $pedido_id)
            ->get();
        return $query;
    }

    public function getPedidosCliente($cliente_id) {
        $query = DB::table('pedidos as ped')
            ->select('ped.*')
            ->where('ped.telefone', '=', $cliente_id)
            ->orderBy('ped.id', 'desc')
            ->get();
        return $query;
    }
}
