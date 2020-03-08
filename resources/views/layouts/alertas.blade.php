
@if(session()->has('alert_sucesso'))
<div class="row">
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sucesso: </strong> {{ session()->get('alert_sucesso') }}
    </div>
</div>
@endif

@if(session()->has('alert_erro'))
<div class="row">
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Erro: </strong> {{ session()->get('alert_erro') }}
    </div>
</div>
@endif
