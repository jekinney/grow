@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <section class="card">
                    
                    <header class="card-header">
                        <h1 class="card-title text-center">{{ $video->name }}</h1>
                    </header>
                    
                    <article class="card-body">

                        <div class="text-center"> 
                            {!! $video->path !!}
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <p>{{ $video->description }}</p>
                            </div>
                        </div>
                        
                    </article>

                    <footer class="card-footer text-right">
                        <a href="{{ route( 'dash.video.edit', $video ) }}" class="btn btn-primary">Edit</a>
                    </footer>

                </section>

            </div>
        </div>
    </div>
@endsection
