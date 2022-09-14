@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($orders as $order)
                <div class="card">
                   @if ($order->id % 2 != 0)
                   <a href="{{ url('history') }}/{{ $order->id }}" style="color: white">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color: red"> Transaction at {{ $order->created_at }} </li>
                        </ul>
                    </a>
                   @else
                   <a href="{{ url('history') }}/{{ $order->id }}" style="color:red">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color:white"> Transaction at {{ $order->created_at }} </li>
                        </ul>
                    </a>
                   @endif
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection