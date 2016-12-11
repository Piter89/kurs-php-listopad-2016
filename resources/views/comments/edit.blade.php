@extends('layout')

@section('content')

    <form action="{{route('comments.update', $comment ->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <label>Edytuj stronę</label>

        <input type="text" name="title" value = "{{$comment->title}}" class="form-control" id="title" placeholder="tytuł strony">
        <input type="text" name="subtitle" value = "{{$comment->subtitle}}" class="form-control" id="title" placeholder="podtytuł strony">
        <textarea name="content" class="form-control" placeholder="treść strony" rows="3"> {{$comment->content}}</textarea>
        <div class="form-group">
            <select class="form-control" name="category_id">
                @foreach($categories_sites as $categoriesSite)
                    @if($categoriesSite->id == $comment->category_id)
                        <option selected ="selected" value="{{ $categoriesSite->id  }}">{{ $categoriesSite->name }}</option>
                    @else
                        <option value="{{ $categoriesSite->id  }}">{{ $categoriesSite->name }}</option>


                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edytuj</button>




    </form>



@endsection