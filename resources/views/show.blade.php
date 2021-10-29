@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if(Auth::check())
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <p>Name: {{auth()->user()->name}}</p>
                            <p>Email: {{auth()->user()->email}}</p>
                            <p>Phone Number: <input type="number" name="phone" class="form-control"></p>
                            <p>Small Pizza Order: <input type="number" name="small_pizza" class="form-control"
                                    value="0"></p>
                            <p>Medium Pizza Order: <input type="number" name="medium_pizza" class="form-control"
                                    value="0"></p>
                            <p>Large Pizza Order: <input type="number" name="large_pizza" class="form-control"
                                    value="0"></p>
                            <p><input type="hidden" name="pizza_id" value="{{$pizza->id}}"></p>
                            <p><input type="date" class="form-control" name="date" required></p>
                            <p><input type="time" class="form-control" name="time" required></p>
                            <p><textarea class="form-control" name="body"></textarea></p>
                            <p class="text-center"><button class="btn btn-danger" type="submit">Order Now</button></p>
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                            @if (session('errmessage'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('errmessage') }}
                            </div>
                            @endif
                        </div>
                    </form>
                    @else
                    <p><a href="/login">Please Login to make order</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <img src="{{Storage::url($pizza->image)}}" class="img-thumbnail" alt="Pizza Image"
                        style="width: 100%;">
                    <p>
                    <h3>{{$pizza->name}}</h3>
                    </p>
                    <p>
                    <h3>{{$pizza->description}}</h3>
                    </p>
                    <p>Small Pizza Price : ${{$pizza->small_pizza_price}}</p>
                    <p>Medium Pizza Price : ${{$pizza->medium_pizza_price}}</p>
                    <p>Large Pizza Price : ${{$pizza->large_pizza_price}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item {
        font-size: 18px;
    }

    a.list-group-item:hover {
        background-color: red;
        color: #fff;
    }

    .card-header {
        background-color: red;
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection
