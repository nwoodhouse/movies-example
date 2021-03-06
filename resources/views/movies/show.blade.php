@extends('layouts.main')

@section('content')

    <h1>
        {{ $movie->name }}

        @can('update', $movie)
            <a class="float-end btn btn-outline-secondary" href="{{ route('movies.edit', $movie) }}">Edit movie</a>
        @endcan
    </h1>

    @can('destroy', $movie)
        <form action="{{ route('movies.destroy', $movie) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger">Delete movie</button>
        </form>
    @endcan

    

    <h2>
        Directed by: {{ $movie->director->name }}, 
        who has directed {{ $movie->director->movies()->count() }} movies.
    </h2>

    <img src="{{ $movie->image }}" alt="" class="img-fluid">

    <h3>
        This movie starred {{ $movie->actors->count() }} actors.
    </h3>

    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <p>
                {{ $movie->description }}
            </p>
        </div>
    </div>

    <div class="row">

        @foreach($movie->actors as $actor)
            <div class="col-3">    
                <div class="card summary">
                    <img src="{{ $actor->image }}" class="card-img-top" alt="Actor image">
                    <div class="card-body">
                        This actor has starred in {{ $actor->movies->count() }} movies
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection