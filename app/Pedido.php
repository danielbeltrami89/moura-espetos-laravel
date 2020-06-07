<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function getPedidos() {
        $query = DB::table('pedidos as ped')
            ->join('users as u', 'ped.user_id', '=', 'u.id' )
            ->select('ped.*', 'u.name as cliente_nome', 'u.telefone as cliente_telefone')
            ->orderBy('ped.created_at', 'asc')
            ->get();
        return $query;
    }

    public function getPedidosNovos() {
        $query = DB::table('pedidos as ped')
            ->where('ped.status', '=', 'Novo')
            ->count();
        return $query;
    }

    public function getPedido($pedido_id) {
        $query = DB::table('pedidos as ped')
            ->join('users as u', 'ped.user_id', '=', 'u.id' )
            ->select('ped.*', 
                'u.name as cliente_nome', 
                'u.telefone as cliente_telefone', 
                'u.endereco as cliente_endereco', 
                'u.numero as cliente_endereco_n', 
                'u.bairro as cliente_endereco_b',
                'u.complemento as cliente_endereco_c')
            ->where('ped.id', '=', $pedido_id)
            ->get();
        return $query;
    }

    public function getPedidosCliente($cliente_id) {
        $query = DB::table('pedidos as ped')
            ->select('ped.*')
            ->where('ped.user_id', '=', $cliente_id)
            ->orderBy('ped.id', 'desc')
            ->get();
        return $query;
    }
}
