@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <section class="card">

                    <header class="card-header">Dashboard</header>

                    <table class="table">
                        
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Is Free</th>
                                <th>Publish</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach( $videos as $video )
                                <tr>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->slug }}</td>
                                    <td>{{ $video->is_free? 'Yes':'No' }}</td>
                                    <td>{{ $video->formatedPublishAt() }}</td>
                                    <td>
                                        <a href="{{ route( 'dash.video.show', $video ) }}" class="btn btn-sm btn-success">Show</a>
                                        <a href="{{ route( 'dash.video.edit', $video ) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" 
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-video-{{ $video->id }}' ).submit();"
                                        >Remove</a>

                                        <form id="delete-video-{{ $video->id }}" action="{{ route( 'dash.video.destroy', $video ) }}" method="POST" style="display: none;">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </section>

            </div>
        </div>
    </div>
@endsection
