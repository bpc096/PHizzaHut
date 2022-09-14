@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img class="rounded top 
                            d-block" src="{{ url('img') }}/{{ $pizza->pizza_image }}" width="100%" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1><strong> {{ $pizza->pizza_name }} </strong></h1>
                            <br>
                            <h4> {{ $pizza->pizza_description }} </h4>
                            <br><br>
                            <h4> Rp. {{ number_format($pizza->pizza_price) }} </h4>
                            <br><br>
                            <form action="{{  url('admin/destroy/'.$pizza->id) }}" method="POST" onsubmit="return confirmation()">
                                @csrf 
                                {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">{{ __('Delete Pizza') }}</button>
                            </form>
                            <script>
                                function confirmation(){
                                    if(confirm("Delete Pizza Data?")) return true;
                                    else return false;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

