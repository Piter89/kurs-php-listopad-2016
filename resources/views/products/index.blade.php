@extends('layout')

@section('content')


    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>OPTIONS</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name  }}</td>
                <td>{{ $product->description  }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name  }}</td>
                <td> <a class="btn btn-info" href="{{route('products.edit', $product ->id)}}">Edit</a></td>
                <td>
                <form method="post" action="{{route('products.destroy', $product ->id)}}">
                <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger"  >Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    {{ $products->links() }}


@endsection