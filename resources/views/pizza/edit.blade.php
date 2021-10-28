@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pizza</div>
                <form action="{{route('pizza.update',$pizza->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" placeholder="name of pizza" name="name"
                                value="{{$pizza->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of Pizza</label>
                            <textarea class="form-control" name="description">{{$pizza->description}}</textarea>
                        </div>
                        <div class="form-inline">
                            <label>Price($)</label>
                            <input type="text" class="form-control" placeholder="small pizza price"
                                name="small_pizza_price" value="{{$pizza->small_pizza_price}}">
                            <input type="text" class="form-control" placeholder="medium pizza price"
                                name="medium_pizza_price" value="{{$pizza->medium_pizza_price}}">
                            <input type="text" class="form-control" placeholder="large pizza price"
                                name="large_pizza_price" value="{{$pizza->large_pizza_price}}">
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
                            <input type="file" name="image" class="form-control mb-2">
                            <img src="{{Storage::url($pizza->image)}}" alt="Pizza edit image" width="80">
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
