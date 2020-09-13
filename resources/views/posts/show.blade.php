@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100 h-50" style="max-width: 50px">
                </div>
                <div class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}" class="pr-1">
                        <span class="text-dark">
                            {{ $post->user->username }}
                        </span>
                    </a>
                    |
                    <a href="" class="pl-1">Follow</a>
                </div>
            </div>
            <hr>
            <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection