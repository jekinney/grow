@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <section class="card">

                    <header class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="card-title">Courses</h1>
                        <div class="dropdown">
                            <button type="button" 
                                id="addDropdown" 
                                data-toggle="dropdown"
                                aria-haspopup="true" 
                                aria-expanded="false"
                                class="btn btn-secondary dropdown-toggle"
                            >
                                Add
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <a href="{{ route( 'dash.course.create' ) }}" class="dropdown-item">Course</a>
                                <a href="{{ route( 'dash.subcourse.create' ) }}" class="dropdown-item">Subcourse</a>
                            </div>
                        </div>
                    </header>
                    
                    @foreach( $courses as $course )
                        <div class="media mb-2 mt-2 ml-2">
                            <img class="mr-3" 
                                src="{{ $course->thumbnail }}" 
                                alt="{{ $course->name }}" 
                                title="{{ $course->name }}" 
                                height="50px" 
                                width="50px"
                            >
                            <div class="media-body">
                                <h5 class="mt-0">{{ $course->name }}</h5>

                                {{ $course->description }}

                                @foreach( $course->subcourses as $subcourse )
                                    <div class="media mt-2">
                                        <img class="mr-3" 
                                            src="{{ $subcourse->thumbnail }}" 
                                            alt="{{ $subcourse->name }}" 
                                            title="{{ $subcourse->name }}" 
                                            height="50px" 
                                            width="50px"
                                        >
                                        <div class="media-body">
                                            <h5 class="mt-0">{{ $subcourse->name }}</h5>

                                            {{ $subcourse->description }}

                                            <div>
                                                <a href="{{ route( 'dash.subcourse.edit', $subcourse ) }}" 
                                                    class="btn btn-sm btn-ghost-info"
                                                >Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                                <div>
                                    <a href="{{ route( 'dash.course.edit', $course ) }}" 
                                        class="btn btn-sm btn-ghost-info"
                                    >Edit</a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </section>

            </div>
        </div>
    </div>
@endsection
