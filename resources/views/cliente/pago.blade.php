@extends('layouts-cliente.app')

@section('content')

<form action="/processar_pagamento" method="POST">
  <script
   src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
   data-preference-id="{{ $preference->id }}">
  </script>
</form>

  @endsection

