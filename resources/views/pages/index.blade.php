@extends('layouts.app') 

@section('header')
@include('partials.navbar')
@stop

@section('content')
<div class="wrapper">
    <div class="page-carousel">
        <div class="filter"></div>
        <div id="maincarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#maincarousel" data-slide-to="0" class="active"></li>
                <li data-target="#maincarousel" data-slide-to="1" class=""></li>
                <li data-target="#maincarousel" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="page-header header-video">
                    <div class="filter filter-danger"></div>
                    <!-- We show the video image placeholder instead of the video for small devices  -->
                    <div class="video-image visible-xs visible-sm" style="background-image: url('assets/img/video-placeholder.png')"></div>
                        <video id="video-source" preload="auto" loop="loop" muted="muted" volume="0">
                            <source src="{{ asset('videos/1518600092.mp4') }}" type="video/mp4">
                                Video not supported
                        </video>
                        <div class="content-center">
                            <div class="container upper-container text-center">
                                <div class="video-text">
                                    <h2>Make it</h2>
                                    <h1 class="title-uppercase title-no-upper-margin">Stand out</h1>
                                </div>
                                <br>
                                <!--  We hide the play button on small devices -->
                                <button type="button" data-video="video-source" data-toggle="video" class="btn btn-lg btn-neutral">
                                    <i class="fa fa-play"></i> Play Video
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header" style="background-image: url('{{ asset('img/fabio-mangione.jpg') }}')">
                        <div class="filter"></div>
                        <div class="content-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2 text-center">
                                        <h1 class="title">Smart Solution LLC</h1>
                                        <h5>Байгууллагад зориулсан тоног төхөөрөмж, программ хангамжийн цогц шийдэл</h5>
                                        <br>
                                        <h6>Бидэнтэй холбогдох:</h6>
                                        <div class="buttons">
                                            <a href="#pablo" class="btn btn-neutral btn-link btn-just-icon">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-neutral btn-link btn-just-icon">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-neutral btn-link btn-just-icon">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header" style="background-image: url('{{ asset('img/federico-beccari.jpg') }} ')">
                        <div class="filter"></div>
                        <div class="content-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 offset-md-5 text-right">
                                        <h2 class="title">Smart Solution LLC</h2>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus neque felis, pretium tristique erat fermentum
                                            sit amet. Nam quis feugiat lacus.
                                        </h5>
                                        <br>
                                        <div class="buttons">
                                            <a href="#pablo" class="btn btn-success btn-round btn-lg">
                                            <i class="fa fa-shopping-cart"></i> Бүтээгдэхүүн
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <a class="left carousel-control carousel-control-prev" href="#maincarousel" role="button" data-slide="prev">
                <span class="fa fa-angle-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control carousel-control-next" href="#maincarousel" role="button" data-slide="next">
                <span class="fa fa-angle-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


<div class="cd-section section-white" id="features">

    <div class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2  text-center">
                    <h2 class="title">Манай давуу тал</h2>
                    <h5 class="description">Өрөөлийг муулж өөрийгөө магтахгүй. Давуугаа мэдэхгүй ч дутуугаа мэднэ. Тантай хамт суралцаж түмэнтэйгээ хуваалцана
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-bulb-63"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Шилдэг Технологи</h4>
                            <p class="description">Дэлхийн хаа нэгтээ чадаж л байвал монгол хүн чадна. Танд хэрэгтэй бүх л техник технологийг нийлүүлж туслана</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-single-02"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Мэргэжилийн хамт олон</h4>
                            <p class="description">Тал бүрийн авьяастай талын чинээ хараатай мэргэжил бүхний захтай мэргэн түргэн шийдэлтэй хэлсэндээ эзэн хийсэндээ бардам хамт олон байна</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" id="statistics">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-chart-bar-32"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Урт хугацааны дэмжлэг</h4>
                            <p class="description">Удаан явбал унаж осолдохгүй, дулаан явбал даарч осгохгүй, холыг зорьвол хорвоог туулна, ашидыг хичээж ашгийг тэвчих нь аль алиндаа өлзий орших учиртай билээ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="features-5 section-image" style="background-image: url(' {{ asset('img/joshua-stannard.jpg') }} ')">
        <div class="container">

            <div class="row">
                <div class="col-sm-4">
                    <div class="info">
                        <div class="icon">
                            <i class="nc-icon nc-paper" aria-hidden="true"></i>
                        </div>
                        <h2 class="title" id="projects">0</h2>
                        <p>АМЖИЛТТАЙ ТӨСӨЛ</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="info">
                        <div class="icon">
                            <i class="nc-icon nc-single-02" aria-hidden="true"></i>
                        </div>
                        <h2 class="title" id="users">0</h2>
                        <p>ИДЭВХТЭЙ ХЭРЭГЛЭГЧ</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="info">
                        <div class="icon">
                            <i class="nc-icon nc-globe" aria-hidden="true"></i>
                        </div>
                        <h2 class="title" id="distrobutors">0</h2>
                        <p>ОЛОН УЛСЫН АЛБАН ЁСНЫ ХАМТРАГЧ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="features-3">
        <div class="section section-content section-white">
            <div class="container">

                <div class="row">
                    <div class="col-md-8 offset-md-2  text-center">
                        <h2 class="title">Манай бүтээгдэхүүн үйлчилгээ</h2>
                        <h5 class="description">Хүн биет эцэж ядрана, алдаа мадаг алмайрч алгуурах нь элбэг.Худал хуумгай, хулгайч хүмүүн цөөнгүй. Манай техник технологи дутууг гүйцээж дундуурыг дүүргэж хүний оролцоог багасгана.
                        </h5>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-md-6 animated" id="element1left">
                        <div class="info info-horizontal">
                            <div class="description">
                                <h2 class="title">Нэвтрэх хяналтын шийдэл</h2>
                                <p>Байгууллагын дотоод хэрэглээнд тааруулан онлайн болон гар утас, таблетнээс хянах боломжтой хяналтын камерын цогц
                                    шийдэл юм.</p>
                                <a href="{{ URL('/solution', ['solution' => '1']) }}" class="btn btn-link">Дэлгэрэнгүй</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animated" id="element1right">
                        <div class="iphone-container">
                            <img src="{{ asset('img/image1.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 animated" id="element2left">
                        <div class="iphone-container">
                            <img src="{{ asset('img/image2.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6 animated" id="element2right">
                        <div class="info info-horizontal">
                            <div class="description">
                                <h2 class="title">Хяналтын камерын шийдэл</h2>
                                <p>Төвийн нэгдсэн удирлагатай агуулахын бараа бүтээгдэхүүн тооллого, цагдаа хүчний байгууллагад зөөврийн хяналт хийх
                                    цогц шийдэл юм.</p>
                                <a href="{{ URL('/solution', ['solution' => '2']) }}" class="btn btn-link">Дэлгэрэнгүй</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 animated" id="element3left">
                        <div class="info info-horizontal">
                            <div class="description">
                                <h2 class="title">Зөөврийн терминалын систем</h2>
                                <p>Нууцлал бүхий давхрагтай, мэдээлэл хадгалах боломжтой, хүссэн загвартай цахим картын цогц үйлчилгээ юм.</p>
                                <a href="{{ URL('/solution', ['solution' => '3']) }}" class="btn btn-link">Дэлгэрэнгүй</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animated" id="element3right">
                        <div class="iphone-container">
                            <img src="{{ asset('img/image3.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 animated" id="element4left">
                        <div class="iphone-container">
                            <img src="{{ asset('img/image4.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6 animated" id="element4right">
                        <div class="info info-horizontal">
                            <div class="description">
                                <h2 class="title">Цахим картын систем</h2>
                                <p>Байгууллагын хянан нэвтрүүлэх хэрэглээнд хурууний хээ уншигч, нүүр танигчтай, цаг бүртгэл, цалин бодолтын цогс
                                    систем.
                                </p>
                                <a href="{{ URL('/solution', ['solution' => '4']) }}" class="btn btn-link">Дэлгэрэнгүй</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="subscribe-line subscribe-line-black">
    <div class="container">
        <form method="POST" id="subscribe_form" action="{{ url('/subscribe') }}">
            <div class="row">
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="col-md-9 col-sm-8">
                    <div class="form-group">
                        <input type="email" autocomplete="off" value="" required name="email" class="form-control" placeholder="Таны цахим шуудан...">
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <button type="submit" class="btn btn-neutral btn-block btn-lg">Мэдээлэл авах</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('script')
<script>
    // $("#subscribe_form").validate({
    //     errorClass: 'form-control-feedback',
    //     rules: {
    //         email: "required",
    //     },
    //     messages: {
    //         email: {
    //             required: "* И-мэйл хаягаа оруулна уу.",
    //             email: "* И-мэйл хаяг биш байна.",
    //         }
    //     }
    // });

    @if (session('status'))
        $.notify({
            message: " {{ session('status') }}"
        },{
            type: 'success',
            timer: 2000
        });
    @endif
</script>
@endpush
