@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($orderrr as $orderr)
                <div class="card">
                   @if ($orderr->id % 2 != 0)
                   <a href="{{ url('admin/usertrans') }}/{{ $orderr->id }}" style="color: white">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color: red"> 
                                Transaction at {{ $orderr->created_at }} 
                                <br>
                                User ID : {{ $orderr->user_id }}
                                <br>
                                Username : {{ $orderr->user->name }}
                            </li> 
                        </ul>
                    </a>
                   @else
                   <a href="{{ url('admin/usertrans') }}/{{ $orderr->id }}" style="color:red">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color:white"> 
                                Transaction at {{ $orderr->created_at }}
                                <br>
                                User ID : {{ $orderr->user_id }}
                                <br>
                                Username : {{ $orderr->user->name }}
                            </li>
                        </ul>
                    </a>
                   @endif 
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection