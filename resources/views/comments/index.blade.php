@extends('layout')

@section('content')


    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>OPTIONS</th>
        </tr>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->title  }}</td>
                <td>{{ $comment->subtitle  }}</td>
                <td>{{ $comment->category->name  }}</td>
                <td> <a class="btn btn-info" href="{{route('comments.edit', $comment ->id)}}">Edit</a></td>
                <td>
                <form method="post" action="{{route('comments.destroy', $comment ->id)}}">
                <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger"  >Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    {{ $comments->links() }}


@endsection