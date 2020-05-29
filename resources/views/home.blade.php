@extends('layouts.app')

@section('content')
 @include('includes.navbar')

    <div class="row justify-content-center">
        <div class="pro">
        <div class="row">
        @foreach ($allproducts as $product)
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="{{$product->cover_img}}" alt="Product image">
                    <div class="card-body">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <p class="product-name">{{$product->name}}</p>
                        <h3 class="product-title">{{$product->description}}</h3>
                        <h3 class="product-price">$ {{$product->price}}</h3>
                        <div class="card-body">
                            <a href="{{ route('cart.add', $product->id) }}" class="cart">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        </div>
    </div>

    <div class="container-fluid p-0">
    <div class="site-content">
        <div class="d-flex justify-content-center">
            <div class="d-flex flex-column">
                <h1 class="site-title">..</h1>
                <div class="d-flex flex-row">
                    <p class="booking">.</p>
                </div>
            </div>
        </div>
    </div>
</div>
     @include('includes.footer')
@endsection



