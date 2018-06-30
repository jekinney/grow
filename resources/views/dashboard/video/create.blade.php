@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <section class="card">

                    <header class="card-header">
                        Create a new video
                    </header>

                    <form action="{{ route( 'dash.video.store' ) }}" method="post" class="card-body">
                       @csrf

                       <div class="row">

                            <div class="col">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                            
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                            </div>

                            <div class="col-3">
                                <label for="publish_at">Publish Date</label>
                                <input type="date" name="publish_at" id="publish_at" value="{{ old('publish_at') }}" class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="path">Path</label>
                            <textarea name="path" id="path" class="form-control">{{ old('path') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" 
                                        name="is_free" 
                                        id="is_free" 
                                        value="1" 
                                        class="form-check-input"
                                        {{ old('is_free')? 'checked':'' }}
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
