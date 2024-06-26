@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
               <h3 class="card-header">{{ $product->title }}</h3>
                             <div class="card-img-top">
                                <img class="img-fluid w-100" src="{{ asset($product->image) }}" 
                                alt="{{ $product->title }}">
                            </div>  
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product->title }}
                                </h5>
                                <p class="text-dark font-weight-bold">
                                    {{ $product->category->title }}
                                </p>
                                <p class="d-flex flex-row justify-content-between align-items-center">
                                    <span class="text-danger">
                                        <strike>
                                            {{ $product->old_price }} DZD
                                        </strike>
                                    </span>
                                    <span class="text-muted">
                                        {{ $product->price }} DZD
                                   </span>  
                                </p>
                                <p class="card-text">
                                    {{$product->description }}
                                </p>
                                <p class="font-weight-bold">
                                    @if ($product->inStock >0)
                                    <span class="text-success">
                                      Disponible  
                                    </span>
                                    @else
                                    <span class="text-danger">
                                        Non Disponible
                                    </span>   
                                    @endif
                                </p>
                            </div>     
                   </div>
                </div>

            
                <div class="col-md-4">
                 <form action="{{ route("add.cart",$product->slug) }}" method="post">
                     @csrf
                     <div class="form-group">
                         <label for="qty" class="label-input">
                             Quntité :
                         </label>
                         <input type="number" name="qty" id="qty" 
                         value="1" placeholder="Quantité"
                         max="{{ $product->inStock }}"
                         min="1"
                         class="form-control" >
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block text-white bg-dark">
                             <i class="fa fa-shopping-cart"></i>
                             Ajouter au panier
                         </button>
                     </div>
                 </form>
                </div>
        </div>
    </div>
</div>
@endsection
