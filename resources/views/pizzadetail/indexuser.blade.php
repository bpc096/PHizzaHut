@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('img') }}/{{ $pizza->pizza_image }}" class="rounded mx-auto 
                            d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1><strong>{{ $pizza->pizza_name }}</strong></h1>
                            <br>
                            <h3>{{ $pizza->pizza_description }}</h3>
                            <br><br>
                            <h3>Rp. {{ number_format($pizza->pizza_price) }}</h3>
                            <form action="{{ url('pizza') }}/{{ $pizza->id }}" method="POST">
                                @csrf
                                <label for="quantity" class="col-md-4">{{ __('Quantity:') }}
                                </label>
                                <input type="text" name="quantity" class="col-md-6">
                                <input type="submit" class="btn btn-primary mt-2" value="Add to Cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection