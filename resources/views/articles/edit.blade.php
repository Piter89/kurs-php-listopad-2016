@extends('layout')

@section('content')

    <form action="{{route('articles.update', $article ->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <label>Edytuj stronę</label>

        <input type="text" name="title" value = "{{$article->title}}" class="form-control" id="title" placeholder="tytuł strony">
        <textarea name="content" class="form-control" placeholder="treść strony" rows="3"> {{$article->content}}</textarea>
        <div class="form-group">
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    @if($category->id == $article->category_id)
                        <option selected ="selected" value="{{ $category->id  }}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id  }}">{{ $category->name }}</option>


                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edytuj</button>




    </form>



@endsection