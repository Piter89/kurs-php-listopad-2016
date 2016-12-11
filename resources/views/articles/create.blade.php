@extends('layout')

@section('content')

    <form action="{{route('articles.store')}}" method="post">

        {{ csrf_field() }}
        <label>Dodaj stronę</label>

        <input type="text" name="title" class="form-control" id="title" placeholder="tytuł strony">
        <textarea name="content" class="form-control" placeholder="treść strony" rows="3"></textarea>
        <div class="form-group">
            <select class="form-control" name="category_id">
                @foreach($categories as $categorie)

                    <option value="{{ $categorie->id  }}">{{ $categorie->name }}</option>

                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>




    </form>



@endsection