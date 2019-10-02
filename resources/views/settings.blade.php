@extends('layouts.app')
@section('content')

<script>
function blackOrange() {
    document.getElementById("example").className = "black-orange";
 
}
function blackYellow() {
    document.getElementById("example").className = "black-yellow";
 
}
function yellowRed() {
    document.getElementById("example").className = "yellow-red";
 
}
function purplePink() {
    document.getElementById("example").className ="purple-pink";
 
}
function blueGreen() {
    document.getElementById("example").className ="blue-green";
 
}
function orangePùrple() {
    document.getElementById("example").className ="orange-purple";
 
}


</script>

<script>$("#tema option[value={{ Auth::user()->tema }}]").attr('selected', 'selected');</script>





<img class="imagem-perfil-borda" src="https://media.licdn.com/dms/image/C5603AQEGPiPM8ccAEg/profile-displayphoto-shrink_200_200/0?e=1573689600&amp;v=beta&amp;t=klvQqPdibPgBvvxPoY0d5i7fZu-g2cdaLZHbg_g-pVA">
<h1 class="titulo-temas">{{ $user->name }}</h1>

<form method="POST" action="/settings"  enctype="multipart/form-data" >
@csrf
@method('PATCH')

<div class="form-group mb-2  label-width">
<label for="tema">tema: </label>

<select name="tema" id="tema" class="select-width">

<option value="black-yellow" onclick="blackYellow(this)">Black & Yellow</option>
<option value="yellow-red" onclick="yellowRed(this)">Yellow & Red </option>
<option value="purple-pink" onclick="purplePink(this)">Purple & Pink</option>
<option value="blue-green" onclick="blueGreen(this)">Blue & White</option>
<option value="orange-purple" onclick="orangePùrple(this)">Orange & Purple</option>
<option value="purple-yellow">Purple & Yellow</option>
<option value="black-red">Black & Red</option>
<option value="blue-turquoise">Blue & Turquoise</option>
<option value="orange-blue">Orange & Blue</option>
<option value="blue-white">Blue & White</option>
<option value="yellow-green">Yellow &  Green</option>
<option value="black-orange" onclick="blackOrange(this)">Black & Orange</option>
<option value="blue-pink">Blue & Pink</option>
</select>
</div>

<div class="form-group mb-2 label-width">
<label for="name">name: </label>
<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Seu nome">
</div>

<div class="form-group mb-2 label-width">
<label for="username">username: </label>
<input type="text" class="form-control" id= "username" name="username" value="{{ old('username') }}" placeholder=" Um username">
</div>

<div class="form-group mb-2">
<div class="custom-file">
<input type="file" class="custom-file-input" id="customFile" name="foto">
<label class="custom-file-label label-width" for="customFile">Choose file</label>
</div>
</div>
<br>
<br>
<br>
<br>
<button type="submit"class="col-md-4 col-md-offset-4">Enviar</button>
</form>














<div id="example" class="blue-pink">

<h1 class="frase-exemplo">Hello!!!</h1>


</div>




@endsection