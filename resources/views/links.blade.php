@extends('layouts.app')
@section('content')


<br>
<form class="form-inline justify-content-center" method="POST" action="/mural">
@csrf
@method('POST')
<label  for="titulo" class="branco">Titulo:&ensp;</label>
<!-- É o nome que vai jogar para o banco de Dados-->
<!-- Old faz com que o conteudo digitado não se apague caso o usuario digite errado-->
<input type="text" class="form-control mb-2 mx-mr-sm-2" id="titulo" name="titulo" placeholder="Digite algum titulo" value="{{ old('titulo') }}">

<label for="link" class="branco">&ensp;Link:&ensp;</label>
<input type="text" class="form-control mb-2 mx-mr-sm-2" id="link"  name='link' placeholder="Digite algum link" value="{{ old('link') }}">

<button type="submit" class="btn btn-primary mb-2 margem-button-enviar">Enviar</button>
</form>

<!-- Foreach é feito para pegar vários elementos-->
@foreach($element as $e)
<div class="card col-lg-5 mx-auto mb-2 margem-card cor-card-formulario">
<div class="card-body">
<h3 class="card-title margem-texto-card">{{ $e->titulo }}</h3>
<p class="card-text margem-texto-card">{{ $e->link }}</p>
<a href="#" class="btn cor-buttons-card margem-buttons-card" data-toggle="modal" data-target="#edicao{{ $e->id }}">Editar</a>
<a href="#" class="btn cor-buttons-card" data-toggle="modal" data-target="#excluir{{ $e->id }}">Excluir</a>
</div>
</div>
@endforeach
<!-- MODAL PARA UPDATE-->

<!-- Modal -->
@foreach($element as $e)
<div class="modal fade" id="edicao{{ $e->id }}" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<!--Repare a importancia dos $e->id-->
<form method="POST" action="/mural/{{ $e->id }}">
@csrf
@method('PATCH')
<div class="modal-body">

<div class="form-group">
<label for="titulo{{ $e->id }}"></label>
<input name="titulo" type="text" class="form-control" id="titulo{{ $e->id }}" value="{{ $e->titulo }}" placeholder="Digite o Título">
</div>

<div class="form-group">
<label for="link{{ $e->id }}">Link</label>
<input name="link" type="text" class="form-control" id="link{{ $e->id }}" value="{{ $e->link }}" placeholder="Digite o Título">
</div>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
<button type="submit" class="btn btn-primary">Salvar</button>
</div>
</form>
</div>
</div>
</div>
@endforeach
<!--Modal para exclusão-->
@foreach($element as $e)

<div class="modal fade" id="excluir{{ $e->id }}" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="/mural/{{ $e->id }}">
@csrf
@method('DELETE')
<div class="modal-body">
<p>Modal body text goes here.</p>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>

@endforeach

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection