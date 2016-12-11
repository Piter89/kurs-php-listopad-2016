@extends('layout')

@section('content')


    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>OPTIONS</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td> <a class="btn btn-info" href="{{route('categories.edit', $category ->id)}}">Edit</a></td>
                <td>
                <form method="post" action="{{route('categories.destroy', $category ->id)}}">
                <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger"  >Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    {{ $categories->links() }}


@endsection