<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status as Status;

class ItemStatusController extends Controller
{
    public function __construct(Status $statusItem) {
        $this->statusItem = $statusItem;
    }

    public function index() {

        $data = [];
        $data['status_itens'] = $this->statusItem->all();

        //dd($data);

        return view('item/status_item', $data);
    }

    public function novo( Request $request, Status $statusItem)
    {

        $data = [];

        $data['nome'] = $request->input('nome');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                ]
            );

            $statusItem->insert($data);

            session()->flash('alert_sucesso', 'Status criado com sucesso!');
            return redirect()->route('ver_status_item');
        }

        return view('itens/status_item', $data);
    }

    public function deletar($statusItem_id)
    {
        $statusItem_del = $this->statusItem->find($statusItem_id);
        
        if ($statusItem_del != null){
            $statusItem_del->delete();

            session()->flash('alert_sucesso', 'Status deletado com sucesso!');
            return redirect()->route('ver_status_item');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar status, tente novamente mais tarde.');
        return redirect()->route('ver_status_item');
    } 
    
}
