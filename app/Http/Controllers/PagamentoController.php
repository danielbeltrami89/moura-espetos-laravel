<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Pedido as Pedido;
use App\Item as Item;
use App\User as Cliente;
use App\ItemPedido as ItemPedido;

use MercadoPago\SDK as MercadoPago;
use MercadoPago\Preference as MercadoPagoPref;
use MercadoPago\Item as MercadoPagoItem;
use MercadoPago\Payer as MercadoPagoPayer;
use MercadoPago\Payment as MercadoPagoPayment;

use App\Mail\EnviaEmail as EmailCliente;
use App\Mail\EnviaEmailAdm as EmailAdm;

    
class PagamentoController extends Controller {

    public function __construct(Pedido $pedido, Item $item, Cliente $cliente, ItemPedido $itemPedido) 
    {
        $this->pedido = $pedido;
        $this->item = $item;
        $this->cliente = $cliente;
        $this->itemPedido = $itemPedido;
    }

    public function index() {

        $data = [];
        $data['itens'] = $this->item->getItens();

        return view('item/index', $data);
    }

    public function pagarPedido($cliente_id, $pedido_id) {

        $data = [];
        $pedido = $this->pedido->getPedido($pedido_id);
        $cliente = $this->cliente->find($cliente_id);
        $data['pedido'] = $pedido;
        $data['itens_pedido'] = $this->itemPedido->getItensPedido($pedido_id);

        // Configura credenciais
        MercadoPago::setAccessToken('TEST-8068967814060495-050502-37957f49ddcaf002450c1c11fce2003b-66974022');
    
        // Cria um objeto de preferência
        $preference = new MercadoPagoPref();
    
        // Cria um item na preferência
        $item = new MercadoPagoItem();
        $item->id = $pedido_id;
        $item->title = 'Pedido #'.$pedido_id;
        $item->quantity = 1;
        $item->unit_price = $pedido[0]->valor_total + 5;
        //$item->unit_price = 1;

        $payer = new MercadoPagoPayer();
        $payer->email = $cliente->email;
        $payer->name = $cliente->name;
        
        $preference->back_urls = array(
            "success" => url('/pedidos-cliente/'.$cliente_id.'/pedido/'.$pedido_id.'/success'),
            "failure" => url('/pedidos-cliente/'.$cliente_id.'/pedido/'.$pedido_id.'/failure'),
            "pending" => url('/pedidos-cliente/'.$cliente_id.'/pedido/'.$pedido_id.'/pending')
        );
        $preference->auto_return = "approved";

        $preference->payer = $payer;
        $preference->items = array($item);
        $preference->save();

        $data['preference'] = $preference;
        //dd($data);
        
        return view('cliente/confirmar-pedido', $data);
    
    }

    public function pagarResponse(Request $request, $cliente_id, $pedido_id, $response) {

        $cliente = Cliente::find($cliente_id);
        $pedido = Pedido::find($pedido_id);
        $pedido->pag_id = $request->order_id;
        $mensagem = "";

        switch($response) {
            case "success":
                $pedido->pag_status = "Pagamento Aprovado"; 
                $mensagem = "Pagamento Aprovado";
                break;
            
            case "failure":
                $pedido->pag_status = "Pagamento Recusado";
                $mensagem = "Pagamento Recusado, tente novamente mais tarde";
                break;

            case "pending":
                $pedido->pag_status = "Aguardando confimação";
                $mensagem = "Pagamento aguardando confimação";
                break;
        }

        // Envia email para o cliente
        $email = new EmailCliente();
        $email->pedido_id = $pedido_id;
        $email->cliente_id = $cliente_id;
        Mail::to($cliente->email)->send($email);

        // Envia email ao adm
        $emailAdm = new EmailAdm();
        $emailAdm->pedido_id = $pedido_id;
        Mail::to("mouragrazielle@gmail.com")->send($emailAdm);

        return redirect()
                        ->route('pedido-cliente', ['cliente_id' => $cliente_id, 'pedido_id' => $pedido->id ])
                        ->with('msg_return', $mensagem);

    }

    // testes 
    public function pagar() {

        // Configura credenciais
        MercadoPago::setAccessToken('TEST-8068967814060495-050502-37957f49ddcaf002450c1c11fce2003b-66974022');
    
        // Cria um objeto de preferência
        $preference = new MercadoPagoPref();
    
        // Cria um item na preferência
        $item = new MercadoPagoItem();
        $item->title = 'Pedido #32 - Moura Espetos';
        $item->quantity = 1;
        $item->unit_price = 1.56;
        $preference->items = array($item);
        $preference->save();

        $data = [];
        $data['preference'] = $preference;
        //dd($data);
        return view('cliente/pago', $data);

    
    }

    public function envia() {
        // Envia email ao adm
        $emailAdm = new EmailAdm();
        $emailAdm->pedido_id = 10;
        Mail::to("moraesdan89@gmail.com")->send($emailAdm);
    }
 
    // Para notificacao de novos pagamentos
    //https://www.mercadopago.com.br/developers/en/guides/notifications/webhooks/
    public function recebePag(Request $request) {
        MercadoPago::setAccessToken('TEST-8068967814060495-050502-37957f49ddcaf002450c1c11fce2003b-66974022');

        dd($request);
        
        switch($request->type) {
            case "payment":
                $payment = MercadoPagoPayment().find_by_id($request->id);
                //dd($payment);
                break;
            // case "plan":
            //     $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
            //     break;
            // case "subscription":
            //     $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
            //     break;
            // case "invoice":
            //     $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
            //     break;
            case "test":
                $plan = $request->id;
                //dd($plan);
                break;
        }
    }
    
}
