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
                                <th>Videos</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach( $courses as $course )
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->slug }}</td>
                                    <td>{{ $course->videos_count }}</td>
                                    <td>
                                        <a href="{{ route( 'dash.course.show', $course ) }}" class="btn btn-sm btn-success">Show</a>
                                        <a href="{{ route( 'dash.course.edit', $course ) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" 
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-course-{{ $course->id }}' ).submit();"
                                        >Remove</a>

                                        <form id="delete-course-{{ $course->id }}" action="{{ route( 'dash.course.destroy', $course ) }}" method="POST" style="display: none;">
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
