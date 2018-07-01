@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">

                <section class="card">

                    <header class="card-header">
                        <h1 class="card-title">Create a new video</h1>
                    </header>

                    <form action="{{ route( 'dash.video.store' ) }}" method="post" class="card-body">
                        @csrf
                        
                        <course-select courses="{{ $courses }}"></course-select>
                        

                        <slug-name-date slugged="{{ old('slug') }}" 
                            named="{{ old('name') }}" 
                            date="{{ old('publish_at') }}" 
                            errored="{{ $errors }}"
                        ></slug-name-date>


                        <div class="form-group">
                            <label for="path">Path</label>
                            <textarea name="path" 
                                id="path" 
                                class="form-control {{ $errors->has( 'path' )? 'is-invalid':'' }}"
                            >{{ old('path') }}</textarea>
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
                            >{{ old('description') }}</textarea>
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
