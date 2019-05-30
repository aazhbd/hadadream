@extends('base')

@section('page-title'){{ $post->title }}@endsection

@section('content')
    <div class="card mb-4 rounded-corners">
        <div class="card-body">
            <h2 class="card-title"><a href="/dream/{{ $post->slug }}"><span>{{ $post->title }}</span></a></h2>
            @if ($post->image)
            <img src="{{ Voyager::image( $post->image ) }}" style="width:100%">
            @endif
            <p class="card-text">{!! $post->body !!}</p>
            <a href="/dream/{{ $post->slug }}">alles anzeigen</a>
            <table class="table table-sm text-muted my-0 mt-2">
                <tr>
                    <td class="px-0 py-0 pt-2">{{$post->views}} mal gelesen</td>
                    <td class="px-0 py-0 pt-2 text-center">2 Kommentare</td>
                    <td class="px-0 py-0 pt-2 text-right">{{ $post->created_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
