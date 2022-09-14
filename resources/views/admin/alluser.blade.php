@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                @foreach ($users->chunk(4) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $user)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header" style="background-color: red"> 
                                    <p style="color: white"> User ID : {{ $user->id }} </p> 
                                </div>
                            </div>
                            <div class="card-body">
                                <p> Username : {{ $user->name }} </p>
                                <p> Email : {{ $user->email }} </p>
                                <p> Address : {{ $user->address }} </p>
                                <p> Phone Number : {{ $user->phone_number }} </p>
                                <p> Gender : {{ $user->gender }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
                {{ $users->links() }}
        </div>
    </div>
</div>
@endsection

