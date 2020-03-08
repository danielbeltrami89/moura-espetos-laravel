<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Status extends Model
{
    protected $table = 'status';

    public function getStatus() {
        $query = DB::table('status')
            ->select('id', 'nome')
            ->get();

        return $query;
    }
}
