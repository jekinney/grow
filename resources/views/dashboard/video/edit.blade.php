@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <section class="card">

                    <header class="card-header">
                        Create a new video
                    </header>

                    <form action="{{ route( 'dash.video.update', $video ) }}" method="post" class="card-body">
                        @method('patch')
                        @csrf

                        <div class="row">

                            <div class="col">
                                <label for="slug">Slug</label>
                                <input type="text" 
                                    name="slug" 
                                    id="slug" 
                                    value="{{ old('slug')?? $video->slug }}" 
                                    class="form-control {{ $errors->has( 'slug' )? 'is-invalid':'' }}"
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
                                    value="{{ old('name')?? $video->name }}" 
                                    class="form-control {{ $errors->has( 'name' )? 'is-invalid':'' }}"
                                >
                                @if( $errors->has( 'name' ) )
                                    <div class="invalid-feedback">
                                        {{ $errors->first( 'name' ) }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-3">
                                <label for="publish_at">Publish Date</label>
                                <input type="text" 
                                    name="publish_at" 
                                    id="publish_at" 
                                    value="{{ old('publish_at')?? $video->formatedPublishAt() }}" 
                                    class="form-control {{ $errors->has( 'publish_at' )? 'is-invalid':'' }}"
                                >
                                @if( $errors->has( 'publish_at' ) )
                                    <div class="invalid-feedback">
                                        {{ $errors->first( 'publish_at' ) }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="path">Path</label>
                            <textarea name="path" 
                                id="path" 
                                class="form-control {{ $errors->has( 'path' )? 'is-invalid':'' }}"
                            >{{ old('path')?? $video->path }}</textarea>
                            @if( $errors->has( 'path' ) )
                                <div class="invalid-feedback">
                                    {{ $errors->first( 'path' ) }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                class="form-control {{ $errors->has( 'description' )? 'is-invalid':'' }}"
                            >{{ old('description')?? $video->description }}</textarea>
                            @if( $errors->has( 'description' ) )
                                <div class="invalid-feedback">
                                    {{ $errors->first( 'description' ) }}
                                </div>
                            @endif
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" 
                                        name="is_free" 
                                        id="is_free" 
                                        value="1" 
                                        class="form-check-input"
                                        {{ $video->is_free? 'checked':'' }}
                                    >
                                    <label for="is_free" class="form-check-label">
                                        Is a free video?
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div>

                    </form>

                </section>

            </div>
        </div>
    </div>
@endsection
