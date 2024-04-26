@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Service Start -->
    <div class="container">

        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Checkout</h1>
                <form  class="col-md-12" action="{{route('checkout.store.paypal')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" value="{{old('name',Auth::user()->name)}}" name="name" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                                @error('name')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('name' , Auth::user()->email)}}" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                                @error('email')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"  value="{{old('town')}}" name="town" id="Town" placeholder="Town">
                                <label for="Town">Town</label>
                                @error('town')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"  value="{{old('country')}}" name="country" id="Country" placeholder="Country">
                                <label for="Country">Country</label>
                                @error('country')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('zipcode')}}"   name="zipcode" id="Zipcode" placeholder="Zipcode">
                                <label for="Zipcode">Zipcode</label>
                                @error('zipcode')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('phone')}}" name="phone" id="phone_number" placeholder="Phone number">
                                <label for="Phone_number">Phone number</label>
                                @error('phone')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="adderss" name="address" id="message" style="height: 100px"></textarea>
                                <label for="message">Address</label>
                                @error('address')
                                <p class="text-danger"> {{$message}} </p>

                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Order and Pay Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
