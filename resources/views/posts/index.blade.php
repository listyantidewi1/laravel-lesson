@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

@forelse ($posts as $key => $post)
{{-- @break($key = 2) --}}
{{-- @continue($key = 1) --}}
    @include('posts.partials.post')
@empty
<p>No post found!</p>

@endforelse

@endsection
