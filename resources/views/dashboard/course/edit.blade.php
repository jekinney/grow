@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">

                <section class="card">

                    <header class="card-header">
                        <h1 class="card-title">Edit a course</h1>
                    </header>

                    <form action="{{ route( 'dash.course.update', $course) }}" method="post" enctype="multipart/form-data" class="card-body">
                        @method('patch')
                        @csrf
                       
                        <div class="row">

                            <div class="col">
                                <label for="slug">Slug</label>
                                <input type="text" 
                                    name="slug" 
                                    id="slug" 
                                    value="{{ old('slug')?? $course->slug }}" 
                                    class="form-control {{ $errors->has('slug')? 'is-invalid':'' }}"
                                >

                                @if( $errors->has( 'slug' ) )
                                    <div class="invalid-feedback">
                                        {{ $errors->first( 'slug' ) }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name')?? $course->name }}" 
                                    class="form-control {{ $errors->has('name')? 'is-invalid':'' }}"
                                >
                                @if( $errors->has('name') )
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        
                        </div>

                        <div class="row mt-3">
                            
                            <div class="col-1 pt-2">
                                <img src="{{ $course->thumbnail }}" height="60px" width="60px">
                            </div>

                            <div class="col">
                                <label for="thumbnail">Thumbnail <small>resized to 200px by 200px</small></label>
                                <input type="file" 
                                    name="thumbnail" 
                                    id="thumbnail" 
                                    value="{{ old('thumbnail') }}" 
                                    class="form-control {{ $errors->has('thumbnail')? 'is-invalid':'' }}"
                                >
                                @if( $errors->has('thumbnail') )
                                    <div class="invalid-feedback">
                                        {{ $errors->first('thumbnail') }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <textarea name="description" 
                                id="description" 
                                class="form-control {{ $errors->has('description')? 'is-invalid':'' }}"
                            >{{ old('description')?? $course->description }}</textarea>
                             @if( $errors->has('description') )
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group text-right mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </section>

            </div>
        </div>
    </div>
@endsection
