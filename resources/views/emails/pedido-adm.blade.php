@component('mail::message')
# Novo pedido

Novo pedido foi feito, mais detalhes no botão:

@component('mail::button', ['url' => 'http://d73d876c.ngrok.io/painel/pedidos/editar/'.$pedido_id])
Ver pedido
@endcomponent

Adminstração <br>
{{ config('app.name') }}
@endcomponent
