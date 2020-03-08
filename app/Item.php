<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Item extends Model
{
    protected $table = 'itens';

    public function getItens() {
        $query = DB::table('itens as i')
            ->join('users as u', 'i.user_id', '=', 'u.id' )
            ->join('status as sta', 'i.status_id', '=', 'sta.id' )
            ->join('setores as s', 'i.setor_id', '=', 's.id' )
            ->join('locais as l', 'i.local_id', '=', 'l.id' )
            ->join('fornecedores as f', 'i.fornecedor_id', '=', 'f.id' )
            ->select('i.*', 'u.name as user', 'sta.nome as status', 's.nome as setor', 'l.nome as local', 'f.razao as fornecedor')
            ->get();

        return $query;
    }

    public function getTop5Itens() {
        $query = DB::table('itens as i')
            ->join('users as u', 'i.user_id', '=', 'u.id' )
            ->join('status as sta', 'i.status_id', '=', 'sta.id' )
            ->join('setores as s', 'i.setor_id', '=', 's.id' )
            ->join('locais as l', 'i.local_id', '=', 'l.id' )
            ->join('fornecedores as f', 'i.fornecedor_id', '=', 'f.id' )
            ->select('i.*', 'u.name as user', 'sta.nome as status', 's.nome as setor', 'l.nome as local', 'f.razao as fornecedor')
            ->orderBy('i.id', 'desc')->take(5)
            ->get();

        return $query;
    }
}
