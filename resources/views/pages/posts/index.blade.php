@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center my-4 mt-2">
                        <h4 class="mb-0">Data Post</h4>
                        <a href="{{ route('post.create') }}" class="btn btn-sm btn-success"><i class='fa fa-plus-circle'></i> TAMBAH</a>
                    </div>
                    <hr>
                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{ $post->title }}</b></h5>
                                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                        <br>
                                        <p class="card-text"><small class="text-muted">Author : {{ $post->account->user_name }} <br>
                                            Posted on {{ $post->date_post }}</small></p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <div>
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">Show</a>
                                        </div>
                                        <form action="{{ route('post.delete', $post->id) }}" method="POST" class="ml-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    Belum ada post.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

