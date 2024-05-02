@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-4">
        @include("layouts.sidebar")
    </div>
    <div class="col-md-8">
        <div class="card p-3">
           <h3 class="card-title m-4">
            Add a product
               </h3>
               <div class="card-body">
                <form method="POST" action="{{ route("products.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text"
                    name="title"
                    placeholder="Title"
                    class="form-control">
                </div>
                <div class="form-group">
                <textarea name="description" placeholder="Description"
                         cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="number"
                    name="price"
                    placeholder="Prix"
                    class="form-control">
                </div>
                <div class="form-group">
                    <input type="number"
                    name="old_price"
                    placeholder="Prix Ancien"
                    class="form-control">
                </div>
                <div class="form-group">
                    <input type="number"
                    name="inStock"
                    placeholder="Quantité en stock"
                    class="form-control">
                </div>
                <div class="form-group">
                    <input type="file"
                    name="image"
                    class="form-control">
                </div>
                <div class="form-group">
                  <select name="category_id" id="" class="form-control">
                      <option value="" selected disabled>
                        Choose a category
                      </option>
                      @foreach ($categories as $category )
                         <option value="{{ $category->id }}">
                          {{ $category->title }}
                        </option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Validate</button>
                </div>
                </form>
               </div>
        </div>
    </div>
    </div>
</div>
@endsection
