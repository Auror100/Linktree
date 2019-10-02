@extends('layouts.app')
@section('content')






<div class="container-fluid bg-danger">



<div class="row offset-3 col-6 h-auto bg-warning">

<img class="offset-4 col-4 imagem-perfil-borda" src="https://media.licdn.com/dms/image/C5603AQEGPiPM8ccAEg/profile-displayphoto-shrink_200_200/0?e=1573689600&amp;v=beta&amp;t=klvQqPdibPgBvvxPoY0d5i7fZu-g2cdaLZHbg_g-pVA">

<a class="botao col-lg-6 offset-3 mudei-botao nome-do-boneco mt-4 h-25" href="" role="button">{{ $user->name }}</a>

<form method="POST" action="/settings"  enctype="multipart/form-data" class="w-100 bg-success mt-3" >
@csrf
@method('PATCH')

<div class="form-group mb-2 offset-3">
<label for="tema">tema: </label>

<select name="tema" id="tema" class="col-6">

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

<div class="form-group mb-2 offset-3">
<label for="name">name: </label>
<input type="text" class="form-control col-9" id="name" name="name" value="{{ old('name') }}" placeholder="Seu nome">
</div>

<div class="form-group mb-2 offset-3">
<label for="username">username: </label>
<input type="text" class="form-control col-9" id= "username" name="username" value="{{ old('username') }}" placeholder=" Um username">
</div>

<div class="form-group mb-2 offset-3">
<div class="custom-file">

<input type="file" class="custom-file-input" id="customFile" name="foto">
<label class="custom-file-label col-9 mt-3" for="customFile">Choose file</label>
</div>
</div>
<br>
<button type="submit"class="offset-6 col-2">Enviar</button>
</form>
</div>


</div>

<div id="example" class="blue-pink">

<h1 class="frase-exemplo">Hello!!!</h1>


</div>














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



@endsection