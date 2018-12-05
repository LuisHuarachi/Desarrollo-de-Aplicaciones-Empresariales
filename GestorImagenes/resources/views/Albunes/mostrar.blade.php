@extends('app')

@section('content')

@if(Session::has('creado'))
    <div class="alert alert-success">
        <p>El album ha sido creado</p>
    </div>
@endif

@if(Session::has('actualizado'))
    <div class="alert alert-success">
        <p>El album ha sido actualizado!!</p>
    </div>
@endif

@if(Session::has('eliminado'))
    <div class="alert alert-danger">
        <p>El album ha sido actualizado!!</p>
    </div>
@endif

<div class="container-fluid">
<p><a href="/validado/albunes/crear-album" class="btn btn-primary" role=button>Crear Album</a></p>
@if(sizeof($albunes)>0)
    @foreach($albunes as $index => $album)
    @if($index%3==0)
    <div class="row">
      @endif
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <h3>{{$album->nombre}}</h3>
            <p>{{$album->descripcion}}</p>
            <p><a href="/validado/fotos?id={{$album->id}}" class="btn btn-primary" role=button>Ver fotos</a></p>
            <p><a href="/validado/albunes/actualizar-album/{{$album->id}}" class="btn btn-primary" role=button>Editar Album</a></p>
            <form action="/validado/albunes/eliminar-album" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
                <input type="hidden" name="id" value="{{ $album->id }}" required>
                <input class="btn btn-danger" role="button"  type="submit" value="Eliminar">
            </form>
          </div>
        </div>
      </div>
      @if(($index+1)%3==0)
    </div>
    @endif
    @endforeach
@else
<div class="alert alert-danger">
    <p>Al parecer no tienes albunes. Crea uno!</p>
</div>
@endif
</div>
@endsection
