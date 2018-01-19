@extends('layouts.app') 

@section('content')
<div class="ecommerce">
@include('partials.navbar-2')
<div class="wrapper">
    <div class="section ">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul id="imageGallery">
                                @foreach(unserialize($product->photos) as $photo)
                                    <li data-thumb="{{ asset($photo)}}" data-src="{{ asset($photo)}}">
                                        <img src="{{ asset($photo)}}" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h2>{{$product->name}}</h2>
                            <h4 class="price"><strong>{{number_format($product->price)}} ₮</strong></h4>
                            <hr>
                            <p>
                               {{$product->short_description}}
                            </p>
                            <span class="label label-success shipping">Захиалгаар</span>
                            <hr>
                            <div class="row">
                                <div class="col-md-7 offset-md-5 col-sm-8">
                                    <a href="{{ URL('/contact') }}">
                                        <button class="btn btn-danger btn-block btn-round">Холбогдох &nbsp;<i class="fa fa-chevron-right"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="col-md-12 col-sm-12">

                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#hardware" role="tab">Техникийн үзүүлэлт</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#about" role="tab">{{ $product->brand->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="hardware" role="tabpanel">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane" id="about" role="tabpanel">
                        <p>{!! $product->brand->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <hr>
            <div class="row card-block-row">
                <div class="col-md-4 col-sm-4">
                    <div class="info">
                        <div class="icon icon-warning">
                            <i class="nc-icon nc-delivery-fast"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title"> Хүргэлт суурилуулалт </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae justo et odio consectetur viverra at sed nisi. Proin non leo eget urna eleifend ultrices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-credit-card"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title"> Төлбөрийн таатай нөхцөл </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae justo et odio consectetur viverra at sed nisi. Proin non leo eget urna eleifend ultrices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="info">
                        <div class="icon icon-success">
                            <i class="nc-icon nc-bulb-63"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Баталгаатай найдвартай </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae justo et odio consectetur viverra at sed nisi. Proin non leo eget urna eleifend ultrices.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="faq">
                @if(!$faqs->isEmpty())
                    <h4>Түгээмэл асуулт хариултууд</h4> <br>
                    <div id="acordeon">
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card no-transition">
                                @foreach($faqs as $faq)
                                <div class="card-header card-collapse" role="tab" id="headingOne">
                                    <h5 class="mb-0 panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                            {{$faq->question}}
                                            <i class="nc-icon nc-minimal-down"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse{{$faq->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                       {!! $faq->answer !!}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--  end acordeon -->
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection