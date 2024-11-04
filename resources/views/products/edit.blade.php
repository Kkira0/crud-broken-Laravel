@extends('layouts.app')

@section('content')
    <h1>Rediģēt produktu</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>
    <form method="post" action="{{ route('products.update', ['product' => $product]) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nameInput" class="form-label">Nosaukums</label>
            <input type="text" class="form-control" id="nameInput" name="name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="qtyInput" class="form-label">Daudzums</label>
            <input type="text" class="form-control" id="qtyInput" name="qty" value="{{ $product->qty }}">
        </div>
        <div class="mb-3">
            <label for="priceInput" class="form-label">Cena</label>
            <input type="text" class="form-control" id="priceInput" name="price" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="descriptionInput" class="form-label">Apraksts</label>
            <input type="text" class="form-control" id="descriptionInput" name="description" value="{{ $product->description }}">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Atjaunot">
        </div>
    </form>
@endsection