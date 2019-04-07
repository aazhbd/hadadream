@extends('base')

@section('page-title'){{ $post->title }}@endsection

@section('content')
    <h1>{{ $post->title }}</h1>
    <img src="{{ Voyager::image( $post->image ) }}" style="width:100%">
    <p>{!! $post->body !!}</p>
@endsection
