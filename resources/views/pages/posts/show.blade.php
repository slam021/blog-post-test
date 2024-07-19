@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $post->title }}</h2>
            <p class="text-muted">Posted by {{ $post->account->name }} on {{ $post->date }}</p>
        </div>
        <div class="card-body">
            <p>{{ $post->content }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('post.index') }}" type="button" class="btn btn-sm btn-secondary float-end"><i class="fa fa-arrow-circle-left"></i> BACK</a>
        </div>
    </div>
</div>
@endsection
