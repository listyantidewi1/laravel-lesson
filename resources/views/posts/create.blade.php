@extends('layouts.app')

@section('title', 'Create a new post')

@section('content')
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts.partials.form')
    <div>
        <input type="submit" name="submit" value="Create" />
    </div>
</form>
@endsection
