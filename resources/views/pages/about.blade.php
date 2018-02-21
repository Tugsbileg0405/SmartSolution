@extends('layouts.app') 

@section('content')
<div class="about-us">
    <div class="header-wrapper">
        @include('partials.navbar')
        <div class="page-header page-header-small" style="background-image: url('{{ asset('img/about.jpg') }} ')">
            <div class="filter"></div>
            <div class="content-center">
                <div class="container">
                    <h1>Манай компани</h1>
                    <h3>Ажлын мэргэжлийн хэмжээнд хийх хүсэлтэй залуус!</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="wrapper">
        <div class="main">
            <div class="section">
                <div class="container">
                    <h3 class="title-uppercase">Эрхэм зорилго</h3>
                    <p>Эцэг эхээс нэр заяадаг хорвоод нэр төрөөс илүү эрхэмлэдэг зүйл бидэнд үгүй</p>

                    <h3 class="title-uppercase">Хэзээ байгуулагдсан бэ?</h3>
                    <p>Манай компани 2005 оны 9 сард байгуулагдаж програм хангамж, системийн шинжилгээ, цахим картны
                        хэвлэл, үйлдвэрлэл, програмчлал, хяналтын камерын систем, мэдээлэл технологийн чиглэлээр
                        үйл ажиллагаа өнөөг хүртэл явуулж байна.</p>

                    <h3 class="title-uppercase">Бид юу хийдэг вэ?</h3>
                    <p>Хэрэгтэй бол тахир голыг конденсатортой нь орооцолдуулж, дугуйгаар нь зураг авч , хүрдээр нь замаа гэрэлтүүлж, хаалгаар нь далавч хийнэ. Дэгсдүүлж буй боловч, бид элдэв техникийг хооронд нь уялдуулж, цогц болгох эрмэлзэлтэй систем интеграци хийдэг хамт олон</p>

                    <h3 class="title-uppercase">Хэрхэн ажилладаг вэ?</h3>
                    <p>Танд асуудал байвал бидэнд ханд, асуудлыг судлах, шийдэх ухаалаг шийдлүүдийг Танд санал болгоё</p>




                    <div class="row">
                        <div class="col-md-9">
                            <div class="panel-group timeline" id="experience">
                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2014 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Замын цагдаагийн бэлнээр төлдөггүй тасалбарын системийг ашиглалтанд
                                                    оруулсан
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2013 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Нийслэлийн Энхтайвны өргөн чөлөөнд тусгай зориулалтын автомашины
                                                    дугаар таних хяналтын 68 цэгт 117 гаруй камерыг суурилуулсан</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2012 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Монгол Улсын жолоочийн эрхийн үнэмлэхийг цахим хэлбэрт оруулж чипэнд
                                                    тухайн хүний зураг болон үндсэн мэдээлэл, торгууль, онооны систем</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2011 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Замын Цагдаагийн Газар Мэдээлэл Шуурхай Удирдлагын Төвийг байгуулсан</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2010 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Монгол Улсын хавдрын нэгдсэн бүртгэл, эргэн дуудах тогтолцоо төсөл</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2009 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Нийслэлийн хөдөлмөрийн газарт хөдөлмөрийн биржийн цахим онлайн систем</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2008 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Монголд анх удаа цахим картанд хэрэглэгчийн зураг хурууны хээ болон
                                                    бусад мэдээллийг оруулж офлайн горимд шалгах систем</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2007 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Смарт акцесс систем</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-year">
                                        <h2 class="timeline-year">2006 он</h2>
                                    </div>

                                    <div class="timeline-btn">
                                    </div>

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h4>Эмнэлгийн цахим картны үйлчилгээний систем</h4>
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
    </div>
@endsection
