@component('mail::message')
# Recebemos seu pedido. :)

Estamos cuidando do seu pedido com muito carinho e amor, enquanto isso você pode acompanhar seu pedido pelo botão abaixo:

@component('mail::button', ['url' => 'http://d73d876c.ngrok.io/pedidos-cliente/'.$cliente_id.'/pedido/'.$pedido_id])
Acompanhar pedido
@endcomponent

Muito obrigado,<br>
{{ config('app.name') }}
@endcomponent
