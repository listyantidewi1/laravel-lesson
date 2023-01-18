@extends('layouts.app')

@section('title', $post['title'])

@section('content')


@if($post['is_new'])
<div>A new blog post! <i> (using if)</i></div>

@elseif(!$post['is_new'])
<div>This blog post is old <i>(using else if)</i></div>

@else
<div>Unknown post</div>

@endif

@unless ($post['is_new'])
<div>This blog post is old <i>(using unless)</i></div>
@endunless

<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($post['has_comments'])
<div>The post has some comments <i>(using isset)</i></div>
@endisset


@endsection
