@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row offset-3 w-50 h-auto">
        
            @foreach($element as $e)
                
                    <div id="conta" class="{ $user->tema } col-12 mt-5 ">
                        <a class="btn btn-outline-secondary col-12 select-width bg-dark"  href="{{ $e->link }}" role="button"><h2>{{ $e->titulo }}</h2></a>
                    </div>
                
                    <div id="conta" class="{ $user->tema } col-12 mt-5">
                        <a class="btn btn-outline-secondary col-12 select-width bg-dark"  href="{{ $e->link }}" role="button"><h2>{{ $e->titulo }}</h2></a>
                    </div>

                    <div id="conta" class="{ $user->tema } col-12  mt-5">
                        <a class="btn btn-outline-secondary col-12 select-width bg-dark"  href="{{ $e->link }}" role="button"><h2>{{ $e->titulo }}</h2></a>
                    </div>
            @endforeach
        
    </div>
</div>
@endsection