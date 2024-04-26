@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>

      <!-- Service Start -->
      <div class="container">
        <div class="container">
            @if(Session::has('orderdeleted'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('orderdeleted') }}</p>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($cart->count()>0)
                    @foreach ($cart as $item)
                    <tr>
                        <th><img width="60" height="60" src="{{asset('assets/img/'.$item->food->image.'')}}" alt=""></th>
                        <td>{{$item->food->name}}</td>
                        <td>${{$item->food->price}}</td>
                        <form method="post" action="{{route('cart.destroy',$item->id)}}">
                            @method("DELETE")
                            @csrf
                            <td><button class="btn btn-danger text-white" type="submit"> delete</button></td>
                        </form>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="3" class="text-center"> <h5>you have no orders yet</h5></td>

                    @endif

                </tbody>
              </table>
              <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: ${{$totalPrice}}</p>
                @if ($totalPrice==0)

                @else
                <form action="{{route('checkout.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="{{$totalPrice}}">
                    <button type="submit"  class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                </form>
                @endif
            </div>
        </div>
    </div>
<!-- Service End -->
@endsection
