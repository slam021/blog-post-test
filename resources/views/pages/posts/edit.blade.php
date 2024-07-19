@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4 class="my-4 mt-2">Edit Post</h4>
                    <hr>
                    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">TITLE</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $post->title }}" placeholder="Masukkan Nama Lengkap...">
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">DATE POST</label>
                            <input type="date" class="form-control @error('date_post') is-invalid @enderror" name="date_post" id="date_post" value="{{ $post->date_post }}" placeholder="Masukkan Nama Lengkap...">
                            @error('date_post')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">CONTENT</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten...">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary me-3"><i class="fa fa-save"></i> UPDATE</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> RESET</button>
                        <a href="{{ route('post.index') }}" type="button" class="btn btn-sm btn-secondary float-end"><i class="fa fa-arrow-circle-left"></i> BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
