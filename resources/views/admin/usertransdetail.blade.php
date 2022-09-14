@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (!empty($order))
                 @foreach ($order_details as $order_detail)
                <div class="card card-group mb-2">
                    <div class="col-md-3">
                        <br><br>
                        <img src="{{ url('img') }}/{{ $order_detail->pizza->pizza_image }}" class="rounded mx-auto 
                            d-block" width="100%" alt="">
                        <br><br>
                    </div>
                    <div class="col-md-9">
                        <br><br>
                        <h2><strong>{{ $order_detail->pizza->pizza_name }}</strong></h2>
                        <h3> Rp. {{ number_format($order_detail->pizza->pizza_price) }} </h3>
                        <h3> Quantity : {{ $order_detail->quantity }}</h3>
                        <h3> Total Price : Rp. {{ number_format($order_detail->total_price) }}</h3>
                        <br><br>
                    </div>
                </div>
                <br>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

