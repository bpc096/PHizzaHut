@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mb-4">
        <h1>Our freshly made pizza!</h1>
        <h3 class="text-secondary">order it now!</h3>
        <a href="{{ url('admin/create')}}" type="button" class="btn btn-dark">Add Pizza</a>
        <br><br>
        
        @if (session('success'))
            <div class="alert alert-success">
            <p> {{ session('success') }}</p>
            </div>
        @endif
        
        @foreach ($pizzaa->chunk(3) as $chunk)
        <div class="row">
          @foreach ($chunk as $pizza)
          <div class="col-md-4">
             <div class="card">
             <a href="{{ url('admin/pizza') }}/{{ $pizza->id }}">
                 <img class="card-img-top" src="{{ url('img') }}/{{ $pizza->pizza_image }}" alt="Card image cap">
               </a>
               <div class="card-body">
                 <h5 class="card-title"><strong>{{ $pizza->pizza_name }}</strong></h5>
                 <p class="card-text">Rp. {{ number_format($pizza->pizza_price) }}</p>
                 <a href="{{ url('admin/edit/'.$pizza->id) }}" class="btn btn-primary">Update Pizza</a>
                 <a href="{{ url('admin/delete/'.$pizza->id) }}" class="btn btn-danger">Delete Pizza</a>
               </div>
             </div>
             <br>
           </div>
          @endforeach
        </div>
        @endforeach
        {{ $pizzaa->links() }}
      </div>
    </div>
</div>
@endsection

