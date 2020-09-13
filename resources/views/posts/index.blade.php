@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-50">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-md-8 offset-md-2">
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">
                                {{ $post->user->username }}
                            </span>
                        </a>
                    </span> 
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    @endforeach
    
    <div class="row">
        <div class="col-md-8 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection