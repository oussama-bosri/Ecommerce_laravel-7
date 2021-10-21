@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include("layouts.sidebar")
        </div>
        <div class="col-md-8">   
            <table class="table table-hover">
               <thead>
                <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Disponible</th>
                <th>Image</th>
                <th>Catégorie</th>
                </tr>
               </thead>
                    <tbody>
                     @foreach ($products as $product )
                             <tr>
                             <td>{{ $product->id }}</td>
                             <td>{{ $product->title }}</td>
                             <td>{{ Str::limit($product->description,50) }}</td>
                             <td>{{ $product->inStock }}</td>
                             <td>{{ $product->price }} DZD</td>
                             <td>
                                 @if ($product->inStock >0)
                                     <i class="fa fa-check text-success"></i>
                                 @else
                                     <i class="fa fa-check text-danger"></i>   
                                 @endif
                             </td>
                             <td>
                                <img src="{{ $product->image }}" 
                                     alt="{{ $product->title  }}"
                                     width="50"
                                     height="50"
                                     class="img-fluid rounded"

                                     >
                            </td>
                             <td>{{ $product->category->title }}</td>
                             <td>
                                <form id="{{ $product->id }}" method="POST" action="{{ route("products.destroy",$product->slug) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button onclick="event.preventDefault();
                                    if(confirm('Voulez vous vraiment supprimer le produit {{ $product->title }} ?'))
                                      document.getElementById({{ $product->id }}).submit();
                                    " 
                                    class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                             </td>
                         </tr>
                     @endforeach
                    </tbody>
            </table>  
            <div class="justify-content-center d-flex">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
