@extends('layouts.app', ['title' => 'All products'])

@section('content')
    <h1>Produkti</h1>
    
    <div>
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div>
        @if(sizeof($products) == 0)
            <div class="alert alert-info" role="alert">
                Nav produktu
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nosaukums</th>
                        <th>Daudzums</th>
                        <th>Cena</th>
                        <th>Apraksts</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.show', ['product' => $product]) }}">Skatīt</a>
                            </td>
                            <td>
                                <a href="{{ route('products.edit', ['product' => $product]) }}">Rediģēt</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('products.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Dzēst">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection