@extends('layouts.app')

@section('title', 'Create a new post')

@section('content')
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts.partials.form')
    <div>
        <input class="btn btn-primary btn-block col-12 mt-2"  type="submit" name="submit" value="Create" />
    </div>
</form>
@endsection
