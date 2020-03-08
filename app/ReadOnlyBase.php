<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadOnlyBase
{
    //
    protected $tipos_array = [];

    public function allTipos()
    {
        return $this->tipos_array;
    }

    public function getTipos( $id )
    {
        return $this->tipos_array[$id];
    }

    public function allStatus()
    {
        return $this->status_array;
    }

    public function getStatus( $id )
    {
        return $this->status_array[$id];
    }
}
