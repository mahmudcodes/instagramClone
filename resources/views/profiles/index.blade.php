@extends('layouts.app')
@section('style')
    <style>
        .postImg{
            width: 250px;
            height: 250px;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img src="{{ $user->profile->profileImage() }}"  class="rounded-circle w-100"> 
        </div>
        <div class="col-md-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username}}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                
                @can('update', $user->profile)
                    <a href="/p/create">Create New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
               <a href="/profile/{{ $user->id }}/edit">Edit Profile</a> 
            @endcan
            
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                <p class="mb-1">{{ $user->profile->description }}</p>
            </div>
            <div>
                <a href="#" style="color:#000; text-decoration:none;"><strong>{{ $user->profile->url ?? 'N/A'}}</strong></a>
            </div>
        </div>
    </div>
    <div class="row pt-3 offset-md-3">
        @foreach ($user->posts as $post)
            <div class="col-md-4 p-2 pb-4">
                <a href="/p/{{ $post->id}}">
                    <img class="w-100" src="/storage/{{ $post->image }}" />
                </a>
                {{-- <p>{{ $post->caption }}</p> --}}
            </div>
        @endforeach
    </div>
</div>
@endsection
