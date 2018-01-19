@extends('layouts.app') 

@include('partials.navbar-2')

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center title">
                        <h2>Хяналтын камерын шийдэл</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <div class="card card-raised page-carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="{{ asset('img/cctv.png') }}">
                                    </div>
                                </div>
                                <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td><strong>Дотор болн гадна IP камерууд</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">LILIN</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Тусгай зориулалтын дугаар бүртгэх камер</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">LILIN</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Монирторинг програм хангамж</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">Oнлайн & Оффлайн горим</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Хяналтын сервер, бичлэг хадгалах төхөөрөмж</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">LILIN</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Бусад дэд бүтэц</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">Сүлжээ, серверийн өрөө</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-6">
                        <p>
                            &emsp; &emsp; Айл гэр, албан байгууллагын аюулгүй байдлыг хангахад хяналтын камер чухал үүрэгтэй. Камерын системийг хяналт, хамгаалалт, ажиглалт, аюулгүй байдлыг хангахад ашиглахаас гадна процессыг удирдан зохицуулах, тандалт судалгаа хийх, тайлан шинжилгээ хийх зэргээр илүү өргөн хүрээнд ашиглаж болох юм. Хяналтын камерын системийг цар хүрээний хувьд хялбар энгийнээс асар том сүлжээ бүхий олон үйлдэлтэй, цогц систем хүртэл зохион байгуулах боломжтой.
                        </p>
                        <hr>
                        <h5>
                            <strong>Гар утас таблет</strong>
                        </h5>
                        <p>
                            Түүнчлэн маркетингийн болон хэрэглэгчийн зан төлөвийн судалгаа хийх зорилгоор хяналтын камерын хүн тоолох, царай таних, хөдөлгөөн дагах зэрэг нэмэлт програмуудтай хамт ашиглах боломжтой.
                        </p>
                        <hr>
                        <h5>
                            <strong>Онлайн</strong>
                        </h5>
                        <p>
                            Хяналтын камерын шийдлүүд нь ашиглах зорилго, орчин, онцлогоос хамааран олон сонголттой байгаа. Том хэмжээний талбай (үйлчилгээний заал, нийтийн эзэмшлийн талбай...) хянах өргөн өнцөгтэйгөөс авахуулаад жижиг эд анги, ажлын явц (касс, теллер, орох гарах хэсэг...) хянах нарийн өнцөгтэй, харанхуй орчинд шөнө болон гэрэл унтарсан үед хянах функцтэй зэрэг төрөл бүрийн камеруудыг ашиглаж болно.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Бүтээгдэхүүнүүд</h4>
                        <br>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#">
                                    <img src="{{ asset('img/lilin1.png') }}" alt="Rounded Image" class="img-rounded img-responsive">
                                </a>
                                <div class="card-block">
                                    <div class="card-description">
                                        <h5 class="card-title">Lilin  IP камер</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#">
                                    <img src="{{ asset('img/tattile2.png') }}" alt="Rounded Image" class="img-rounded img-responsive">
                                </a>
                                <div class="card-block">
                                    <div class="card-description">
                                        <h5 class="card-title">ImageVega 2HD IP камер</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#">
                                    <img src="{{ asset('img/tattile2.png') }}" alt="Rounded Image" class="img-rounded img-responsive">
                                </a>
                                <div class="card-block">
                                    <div class="card-description">
                                        <h5 class="card-title">ImageVega HD IP камер</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card card-product">
                            <div class="card-image">
                                <a href="#">
                                    <img src="{{ asset('img/tattile1.jpg') }}" alt="Rounded Image" class="img-rounded img-responsive">
                                </a>
                                <div class="card-block">
                                    <div class="card-description">
                                        <h5 class="card-title">ImageANPR Mobile</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
