@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('img') }}/{{ $pizz->pizza_image }}" class="rounded mx-auto 
                            d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1><strong>{{ $pizz->pizza_name }}</strong></h1>
                            <br>
                            <h3>{{ $pizz->pizza_description }}</h3>
                            <br><br>
                            <h3>Rp. {{ number_format($pizz->pizza_price) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection