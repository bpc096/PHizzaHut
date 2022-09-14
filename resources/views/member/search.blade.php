@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mb-4">
        <h1>Our freshly made pizza!</h1>
        <h3 class="text-secondary">order it now!</h3>
        <form action="{{ url('/search')}}" method="GET">
          <label for="search_pizza" class="text-secondary">{{ __('Search Pizza:') }}
          </label>
          {{ csrf_field() }}
          <input type="text" class="col-md-8" placeholder="Search" name="search">
          <input type="submit" class="btn btn-primary" value="Search">
        </form>
        <br><br>
        @foreach ($pizzas->chunk(3) as $chunk)
        <div class="row">
          @foreach ($chunk as $pizza)
          <div class="col-md-4">
             <div class="card">
             <a href="{{ url('pizza') }}/{{ $pizza->id }}">
                 <img class="card-img-top" src="{{ url('img') }}/{{ $pizza->pizza_image }}" alt="Card image cap">
               </a>
               <div class="card-body">
                 <h5 class="card-title"><strong>{{ $pizza->pizza_name }}</strong></h5>
                 <p class="card-text">Rp. {{ number_format($pizza->pizza_price) }}</p>
               </div>
             </div>
             <br>
           </div>
          @endforeach
        </div>
        @endforeach
      </div>
    </div>
</div>
@endsection
