@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">   
            <table class="table tabel-hover">
                <th>
                    <tr>Id</tr>
                    <tr>client</tr>
                    <tr>Produit</tr>
                    <tr>Quantity</tr>
                    <tr>Prix</tr>
                    <tr>Total</tr>
                    <tr>Payé</tr>
                    <tr>Livrée</tr>
                    <tr></tr>
                </th>
                <thead>
                    <tbody>
                     @foreach ($orders as $order )
                         <tr>
                             <td>{{ $order->id }}</td>
                             <td>{{ $order->user->name }}</td>
                             <td>{{ $order->product_name }}</td>
                             <td>{{ $order->qty }}</td>
                             <td>{{ $order->price }} DZD</td>
                             <td>{{ $order->total }} DZD</td>
                             <td>
                                 @if ($order->paid)
                                     <i class="fa fa-check text-success"></i>
                                 @else
                                     <i class="fa fa-check text-danger"></i>   
                                 @endif
                             </td>
                             <td>
                                 @if ($order->delivered)
                                     <i class="fa fa-check text-success"></i>
                                 @else
                                     <i class="fa fa-check text-danger"></i>   
                                 @endif
                             </td>
                             <td></td>
                         </tr>
                     @endforeach
                    </tbody>
                </thead>
            </table>  
        </div>
    </div>
</div>
@endsection
