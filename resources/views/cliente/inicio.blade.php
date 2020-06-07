@extends('layouts-cliente.app')

@section('content')

    <div class="position-relative overflow-hidden text-center bg-dark">
      
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('img/img_admin/banner1.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/img_admin/banner2.jpg') }}" alt="Second slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        
      </div>
    </div>
    
    <div class="d-md-flex flex-md-equal w-100 my-md-5 px-md-3">
      <div class="row mx-0 my-3">
        <div class="col p-0">
          <img class="fix-image" src="{{ asset('img/img_admin/logo-montagem.jpg') }}" >
        </div>
        <div class="col p-0 my-auto mx-5">
          <h4 class="text-center">A Moura Espetos</h4></br>
          <h6 class="text-center">
            Desde de 2019 somos um espaço especializado em espetinhos, com ambiente familiar e com conversa saudável.
            Proporcionando assim conforto e aconchego, como se estivessem rodeados de amigos, pois assim queremos que nossos
            clientes se sintam em casa, tanto em nosso espaço físico, quanto levando até vocês um pouco do que queremos oferecer,
            nossos produtos.
          </h6>
        </div>
      </div>
    </div>

      <div class="row m-5">
        <div class="col-sm">
          <img class="img-bloco" src="{{ asset('img/img_admin/bloco-cardapio.jpg') }}" >
          <h4 class="d-block mb-3 text-muted text-center">Cardápio</h4>
          <p class="d-block mb-3 text-muted text-center">
            Conheça nossos produtos, e se delicie com nossa variedade de sabores!
            </p>
        </div>
        
        <div class="col-sm">
        <img class="img-bloco" src="{{ asset('img/img_admin/bloco-frete.jpg') }}" >
          <h4 class="d-block mb-3 text-muted text-center">Entregas</h4>
          <p class="d-block mb-3 text-muted text-center">
            Nos pedidos acima de R$ 50,00 o frete é por nossa conta. 
            Válido apenas para as regiões citadas acima. Entre em contato para mais informações.</p>
        </div>

        <div class="col-sm">
        <img class="img-bloco" src="{{ asset('img/img_admin/bloco-horario.jpg') }}" >
          <h4 class="d-block mb-3 text-muted text-center">Horários</h4>
          <p class="d-block mb-3 text-muted text-center">
            Atendemos de segunda a sábado das 13h ás 21h.</p>
        </div>
        
      </div>
    

    
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.0184976144883!2d-46.75294068502076!3d-23.639508584644137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5eb9ae849417622e!2sMoura%20Espetos!5e0!3m2!1spt-BR!2sbr!4v1584808027588!5m2!1spt-BR!2sbr" 
      width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
    
  @endsection

