@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('danger'))
                <div class="alert alert-danger">
                <p> {{ session('danger') }}</p>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                <p> {{ session('success') }}</p>
                </div>
            @endif
                @if (!empty($order))
                    @foreach ($order_details as $order_detail)
                    <div class="card card-group mb-2">
                        <div class="col-md-3">
                            <br><br>
                            <img src="{{ url('img') }}/{{ $order_detail->pizza->pizza_image }}" class="rounded mx-auto 
                                d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-9">
                            <br><br>
                            <h2><strong>{{ $order_detail->pizza->pizza_name }}</strong></h2>
                            <h3> Rp. {{ number_format($order_detail->pizza->pizza_price) }} </h3>
                            <h3> Quantity : {{ $order_detail->quantity }}</h3>
                            <br>
                            <form action="{{ url('viewcart/update') }}/{{ $order_detail->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <label for="quantity" class="col-md-4">{{ __('Quantity:') }}</label>
                                <input type="text" name="quantity" class="col-md-6">
                                <br><br>
                                <button type="submit" class="btn btn-primary">{{ __('Update Quantity') }}</button>
                            </form>
                            <br>
                            <form action="{{ url('viewcart/delete') }}/{{ $order_detail->id }}" method="post" onsubmit="return confirmation()">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">{{ __('Delete From Cart') }}</button>
                            </form>
                            <script>
                                function confirmation(){
                                    if(confirm("Delete Pizza Order?")) return true;
                                    else return false;
                                }
                            </script>
                            <br><br><br>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    <div class="row justify-content-center">
                        <a href="{{ url('checkout') }}" class="btn btn-dark"> Checkout
                        </a>
                    </div>
                @endif
        </div>
    </div>
</div>
@endsection

