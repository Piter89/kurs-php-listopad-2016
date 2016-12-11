@extends('layout')

@section('content')

    <form action="{{route('categories.store')}}" method="post">

    {{ csrf_field() }}
    <label>Dodaj kategorie</label>

    <input type="text" name="name" class="form-control" id="name" placeholder="tytuł kategorii">

    <button type="submit" class="btn btn-primary">Dodaj</button>




</form>



@endsection