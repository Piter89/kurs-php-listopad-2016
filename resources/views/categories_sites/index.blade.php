@extends('layout')

@section('content')


    <table class="table table-hover">



        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>OPTIONS</th>
        </tr>
        @foreach( $categories_sites as $category_sites)
            <tr>
                <td>{{ $category_sites->id }}</td>
                <td>{{ $category_sites->name }}</td>
                <td> <a class="btn btn-info" href="{{route('categories_sites.edit', $category_sites ->id)}}">Edit</a></td>
                <td>
                <form method="post" action="{{route('categories_sites.destroy', $category_sites ->id)}}">
                <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger"  >Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>


    <div> <a href="http://strona.pl/categories_sites/create" class="btn btn-primary">dodaj kategorie</a></div>
    {{ $categories_sites->links() }}


@endsection