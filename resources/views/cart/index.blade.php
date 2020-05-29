@extends('layouts.app')

@section('content')
@include('includes.navbar')
    <h2 class="checkout-header">Checkout</h2>
    {{-- {{dd(\Cart::session(auth()->id())->getContent())}} --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <th scope="row">{{$item->name}}</th>
                        <td>

                            ₦ {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                        </td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}">
                                <input name="quantity" type="number" value="{{$item->quantity}}">
                                <input class="update-item-btn" type="submit" value="Update">
                            </form>
                        </td>
                        <td><a href="{{ route('cart.destroy', $item->id) }}">Remove</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 class="total-price">Total Price : ₦ {{\Cart::session(auth()->id())->getTotal()}}</h3>
        <a class="checkout-btn" href="/cart/checkout" role="button">Proceed to checkout</a>
         @include('includes.footer')
@endsection
