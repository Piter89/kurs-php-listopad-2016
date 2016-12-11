@extends('layout')

@section('content')

    <form action="{{route('products.update', $products ->id)}}" method="post">
        <input name="_method" type="hidden" value="PUT">
        {{ csrf_field() }}
        <label>Edytuj stronę</label>

        <input type="text" name="name" value = "{{$products->name}}" class="form-control" id="name" placeholder="tytuł strony">
        <input type="text" name="product" value = "{{$products->description}}" class="form-control" id="description" placeholder="podtytuł strony">
        <input name="price" value = "{{$products->price}}" class="form-control" id="price" placeholder="podtytuł strony">
        <div class="form-group">
            <select class="form-control" name="category_id">
                @foreach($categories_sites as $categoriesSite)
                    @if($categoriesSite->id == $products->category_id)
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