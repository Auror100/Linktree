@extends('layouts.app')
@section('content')


<div class="container-fluid">
    <div class="row offset-3 w-50 h-auto bg-warning">

    <img class="imagem-perfil-borda offset-4" src="https://media.licdn.com/dms/image/C5603AQEGPiPM8ccAEg/profile-displayphoto-shrink_200_200/0?e=1573689600&amp;v=beta&amp;t=klvQqPdibPgBvvxPoY0d5i7fZu-g2cdaLZHbg_g-pVA">

    <a class="botao col-lg-6 offset-3 mudei-botao nome-do-boneco mt-4 h-25" href="" role="button">{{ $user->username }}</a>

            
                @foreach($element as $e)
                <a class="botao col-lg-12 mudei-botao mt-4 h-25" href="{{ $e->link }}" role="button">{{ $e->titulo }}</a>
             
                       
                        
                @endforeach    
                    
                    
            
        
    </div>
</div>
@endsection