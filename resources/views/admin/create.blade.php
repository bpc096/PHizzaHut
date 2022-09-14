@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{  url('/admin') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} 
                        <h3><strong> Add New Pizza </strong></h3>
                        <div class="form-group row">
                        
                            <label for="pizza_name" class="col-md-4 col-form-label text-md-left @error('pizza_name')
                                is-invalid @enderror ">{{ __('Pizza Name : ')}}</label>

                            <div class="col-md-6">
                                <input class="form-control" id="pizza_name" type="text" name="pizza_name"> <b id="err1"></b>
                            </div>
                            @error('pizza_name')<div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                        
                            <label for="pizza_price" class="col-md-4 col-form-label text-md-left @error('pizza_price')
                                is-invalid @enderror">{{ __('Pizza Price : ')}}</label>

                            <div class="col-md-6">
                                <input class="form-control" id="pizza_price" type="text" name="pizza_price"> <b id="err2"></b>
                            </div>
                            @error('pizza_price')<div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group row">
                        
                            <label for="pizza_description" class="col-md-4 col-form-label text-md-left @error('pizza_description')
                                is-invalid @enderror">{{ __('Pizza Description : ')}}</label>

                            <div class="col-md-6">
                                <input class="form-control" id="pizza_description" type="text" name="pizza_description"> <b id="err3"></b>
                            </div>
                            @error('pizza_description')<div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                        
                            <label for="pizza_image" class="col-md-4 col-form-label text-md-left @error('pizza_image')
                                is-invalid @enderror">{{ __('Pizza Image : ')}}</label>

                            <div class="col-md-6">
                                <input id="pizza_image" type="file" name="pizza_image"> <b id="err4"></b>
                            </div>
                            @error('pizza_image')<div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>                   
                            <button type="submit" class="btn btn-primary">{{ __('Add Pizza') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
