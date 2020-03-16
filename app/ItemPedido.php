<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ItemPedido extends Model
{
    protected $table = 'itens_pedido';

    public function getItens($pedido_id) {
        $query = DB::table('itenspedido as ip')
            ->select('i.*')
            ->where('pedido_id', '=', $pedido_id)
            ->get();
        return $query;
    }}
