 @if (Auth::id() == $user->id)
     @if (Auth::user()->is_favoriting($micropost->id))
             {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                 {!! Form::submit('unfav', ['class' => "btn btn-danger btn-block"]) !!}
             {!! Form::close() !!}
    @else
            {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
                 {!! Form::submit('fav', ['class' => "btn btn-primary btn-block"]) !!}
             {!! Form::close() !!}
     @endif
@endif            