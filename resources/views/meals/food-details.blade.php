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
    <div class="container">
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        @endif
    </div>
     <!-- Service Start -->
     <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('assets/img/'.$food->image.'') }}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">{{$food->name}}</h1>
                    <p class="mb-4">{{$food->description}}</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h3>Price: $ {{$food->price}}</h3>
                            </div>
                        </div>

                    </div>
                    <form action="{{route('add-to-cart',$food->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{$food->id}}">
                    <input type="hidden" name="name" value="{{$food->name}}">
                    <input type="hidden" name="price" value="{{$food->price}}">
                    <input type="hidden" name="image" value="{{$food->image}}">
                    @if ($verfyCart & $verfyCart>0)

                    <button class="btn btn-black py-3 px-5 mt-2" disabled type="submit">Added to Cart</button>
                    @else

                    <button class="btn btn-primary py-3 px-5 mt-2" type="submit">Add to Cart</button>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
