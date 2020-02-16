@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
             <div>
               @include('users.navtabs', ['user' => $user])
            </div>
            <div>
            <ul class="list-unstyled">
    @foreach ($favorites as $favorite)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($favorite->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $favorite->user->name, ['id' => $favorite->user->id]) !!} <span class="text-muted">posted at {{ $favorite->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                </div>
                <div>
                   <div>
                    @if (Auth::id() == $favorite->user_id)
                        {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                <div>
                    @if (Auth::user()->is_favoriting($favorite->id))
                         {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                            {!! Form::submit('unfavorite', ['class' => "btn btn-danger btn-sm"]) !!}
                         {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['favorites.favorite', $favorite->id]]) !!}
                            {!! Form::submit('favorite', ['class' => "btn btn-primary btn-sm"]) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
                </div>
        </div>
    </div>
@endsection