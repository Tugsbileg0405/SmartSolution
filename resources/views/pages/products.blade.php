@extends('layouts.app') 

@section('content')

<div class="ecommerce">

@section('header')
@include('partials.navbar-2')
@stop
<div class="wrapper">
    <div class="section section-gray">
        <div class="container">
            <h3 class="section-title">Бүтээгдэхүүнүүд</h3>
            <div class="row">
                <div class="col-md-3" style="padding-right:0">
                    @include('partials.sidemenu')
                </div>
                <div class="col-md-9">
                    <div class="products">
                        <div class="row">
                            @if(!$products->isEmpty())
                                @foreach($products as $product)
                                <div class="col-md-4 col-sm-4">
                                    <div class="card card-product" data-radius="none">
                                        <div class="card-image">
                                            <a href="{{ URL('/products', ['products' => $product->id]) }}">
                                                <img src="{{ asset(unserialize($product->photos)[0]) }}" class="img-responsive">
                                            </a>
                                            <div class="card-block">
                                                <div class="card-description">
                                                    <h5 class="card-title">{{$product->name}}</h5>
                                                    <p class="card-description">{{$product->brand->name}}</p>
                                                </div>
                                                <div class="price">
                                                    <h5>{{number_format( $product->price)}} ₮</h5>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                        <div class="col-md-3 offset-md-4">
                                <nav>
                                {{ $products->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection