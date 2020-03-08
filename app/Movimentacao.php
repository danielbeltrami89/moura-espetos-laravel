<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Movimentacao extends Model
{
    //
    protected $table = 'movimentacao';
    protected $dates = ['create_at'];

    public function getMovimentacoes() {
        $query = DB::table('movimentacao as m')
            ->join('itens as i', 'm.item_id', '=', 'i.id' )
            ->join('locais as lo', 'm.local_entrada_id', '=', 'lo.id' )
            ->join('locais as ld', 'm.local_saida_id', '=', 'ld.id' )
            ->join('users as u', 'm.responsavel_id', '=', 'u.id' )
            ->select('m.id', 'm.created_at', 'i.nome as item', 'u.name as responsavel', 'lo.nome as local_orig', 'ld.nome as local_dest')
            ->get();

        return $query;
    }

    public function getTop5Movimentacoes() {
        $query = DB::table('movimentacao as m')
            ->join('itens as i', 'm.item_id', '=', 'i.id' )
            ->join('locais as lo', 'm.local_entrada_id', '=', 'lo.id' )
            ->join('locais as ld', 'm.local_saida_id', '=', 'ld.id' )
            ->join('users as u', 'm.responsavel_id', '=', 'u.id' )
            ->select('m.id', 'm.created_at', 'i.nome as item', 'u.name as responsavel', 'lo.nome as local_orig', 'ld.nome as local_dest')
            ->orderBy('m.id', 'desc')->take(5)
            ->get();

        return $query;
    }

}
