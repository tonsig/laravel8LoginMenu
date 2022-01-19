@extends('template')

@section('identifica')
<!-- identifica usuário -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
      <span>Olá 
      <strong>
        @if(session()->has('nome_usuario'))
        {{ session()->get('nome_usuario') }}  
        @endif 
      </strong>
      </span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container w3-pale-blue">
    <h5>Menu</h5>
  </div>
<!-- Sidebar/menu -->
  <div class="w3-bar-block">
     <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Fechar Menu</a>
    @php $itemPai=0; @endphp
	  @foreach($menus as $menu)
      @if ($menu->ativo)
            @if ( ($itemPai != 0) && ($itemPai != $menu->idMenuPai) )
                   </div></div>
                   <span class="w3-white"><br></span>
                  @php $itemPai=0; @endphp		
            @endif
            @if ( ($menu->id) == ($menu->idMenuPai) )
                  @php $itemPai=$menu->idMenuPai; @endphp
                  <div class="w3-dropdown-hover"> 
                        <button class="w3-bar-item w3-button w3-padding w3-pale-blue expandivel">
                          <i class="{{$menu->icone}}"></i>{{$menu->titulo}}&ensp;<i class="fa fa-caret-down"></i>
                        </button>		 
                  <div class="w3-dropdown-content w3-bar-block w3-card-4 contentexp">
            @else
                <a href="{{ $menu->rota }}" class="w3-bar-item w3-button w3-padding">
                <i class="{{$menu->icone}}"></i>{{ $menu->titulo }}</a>
            @endif        
     @endif  
    @endforeach
 	  @if ( ($itemPai != 0) && ($itemPai != $menu->idMenuPai) )
			</div></div>  
    @endif
</nav>
@stop

@section('conteudo')
<!-- conteudo da página -->
  <h2>Aqui vai o conteúdo da página</h2>
@stop
  
 