@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>
                        <a href="{{route('user.order')}}" class="list-group-item list-group-item-action">View Order</a>
                    </ul>
                </div>
            </div>
            @if(count($errors)>0)
            <div class="card mt-5">
                <div class="card-body">
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                <form action="{{route('pizza.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" placeholder="name of pizza" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of Pizza</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Price($)</label>
                            <input type="number" class="form-control" placeholder="small pizza price"
                                name="small_pizza_price">
                            <input type="number" class="form-control" placeholder="medium pizza price"
                                name="medium_pizza_price">
                            <input type="number" class="form-control" placeholder="large pizza price"
                                name="large_pizza_price">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="">Select One</option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non Vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
