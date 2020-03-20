<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ItemPedido extends Model
{
    protected $table = 'itens_pedido';

    public function getItensPedido($pedido_id) {
        $query = DB::table('itens_pedido as ip')
            ->join('itens as i', 'ip.item_id', '=', 'i.id' )
            ->select('i.id as item_id', 'i.nome as item_nome', 'i.valor as item_valor')
            ->where('ip.pedido_id', '=', $pedido_id)
            ->get();
        return $query;
    }
}