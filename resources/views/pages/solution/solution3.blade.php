@extends('layouts.app') 

@section('header')
@include('partials.navbar-2')
@stop

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 offset-md-3 text-center title">
                        <h2>Зөөврийн терминалын шийдэл</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <div class="card card-raised page-carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="{{ asset('img/lilin1.png') }}">
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
                                        <td><strong>Цаг бүртгэлийн төхөөрөмж</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">NITGEN BioAccess</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>USB хурууны хээ уншигч</strong></td>
                                        <td class="text-right"><a href="javascript:void(0)">NITGEN Fingkey Hamster DX</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-6">
                        <p>
                            &emsp; &emsp; Бизнесийн байгууллагын ашигт ажиллагаа, бүтээмж, өрсөлдөх чадвар өндөр байх нэг нөхцөл нь ажлын цаг ашиглалт
                            байдаг. Орчин үед цаг бүртгэлийн систем нь ирц бүртгэлийн үйл ажиллагааг автоматжуулж,
                            байгууллагын үргүй зардлыг багасгах, цаг ашиглалтыг дээшлүүлэх хэрэгсэл болж байна. Цаг
                            бүртгэлийн систем ашигласнаар ажилтны ажилласан, хоцорсон, тасалсан, өвчтэй, чөлөөтэй
                            цагийн нэгтгэлийг тооцоолох,хүний нөөцийн болон цалингийн системүүдийг цагийн мэдээллээр
                            хангах боломжийг бүрдүүлдэг.
                        </p>
                        <hr>
                        <h5>
                            <strong>Цаг бүртгэлийн систем хэрхэн ажилладаг вэ?</strong>
                        </h5>
                        <p>
                            Цагийн машинаар ажилчдын ажилдаа ирсэн болон ажилаас явсан цагийн мэдээллийг цуглуулах бөгөөд үүн дээр тулгуурлан ажилчдын
                            ажилласан, хоцорсон, тасалсан, өвчтэй, чөлөөтэй цагийн тооцоог гаргадаг. Мөн ажилчдын
                            ажилд ирсэн ажилаас явсан цагаас гадна цайны цаг болон ажилаар түр гарсан, уулзалтын
                            гэх мэт нэмэлт цагуудыг бүртгэх боломжтой
                        </p>
                        <hr>
                        <h5>
                            <strong>Цаг бүртгэлийн системийн хэрэглээ, ач холбогдол</strong>
                        </h5>
                        <p>
                            Цаг бүртгэлийн систем ашигласанаар цагийн тооцоо хийх, цалин бодох үйл ажиллагаа нилээд хэмжээгээр хөнгөвчлөгдөх бөгөөд ажилтнуудаа
                            бодитоор үнэлэх боломж бүрдэнэ.
                        </p>
                        <hr>
                        <h5>
                            <strong>Хурууны хээ танигчтай цагийн бүртгэлийн систем</strong>
                        </h5>
                        <p>
                            Хүний хурууны хээ хэзээ ч давтагддаггүй учир энэ нь тухайн хүн өөрөө бүртгүүлсэн байх хөдлөшгүй баталгаа болж чаддаг. Гэвч
                            зарим байгууллагын үйл ажиллагааны онцлогоос шалтгаалан хурууны хээ уншуулах төхөөрөмж
                            ашиглах нь тохиромжгүй байдаг. Тухайлбал: Гар хуруугаа гэмтээх эрсдэл өндөртэй ажил,
                            үйлчилгээ эрхлэгчид. Үүнд: Засварчид, Хүнд хөдөлмөр эрхлэгчид, Тогооч, гэх мэт ажлын
                            байрууд орно. Химийн бодистой харьцдаг ажилтнууд болон бусад нарийн мэргэжлийн онцлогоос
                            шалтгаалан мөн халдварт өвчин гарсан тохиолдолд хурууны хээгээр бүртгэх нь тохиромжгүй
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
