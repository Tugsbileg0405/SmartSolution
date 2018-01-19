<nav class="navbar navbar-toggleable-md fixed-top">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" aria-controls="navbarTogglerDemo02"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL('/') }}">
                SMART SOLUTION LLC
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <p class="hidden-lg-up">&nbsp; Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com" target="_blank">
                        <i class="fa fa-facebook-square"></i>
                        <p class="hidden-lg-up">&nbsp; Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Like us on Google+" data-placement="bottom" href="https://www.facebook.com" target="_blank">
                        <i class="fa fa-google-plus"></i>
                        <p class="hidden-lg-up">&nbsp; Google</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ URL('/') }}">Нүүр хуудас</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-expanded="true">Шийдэл</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                        <li class="dropdown-item"><a href="{{ URL('/solution', ['solution' => '1']) }}">Нэвтрэх хяналтын систем</a></li>
                        <li class="dropdown-item"><a href="{{ URL('/solution', ['solution' => '2']) }}">Хяналтын камерын систем</a></li>
                        <li class="dropdown-item"><a href="{{ URL('/solution', ['solution' => '3']) }}">Зөөврийн терминалын систем</a></li>
                        <li class="dropdown-item"><a href="{{ URL('/solution', ['solution' => '4']) }}">Цахим картын систем</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/products') }}">Бүтээгдэхүүн</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/about') }}">Бидний тухай</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/contact') }}">Холбоо барих</a>
                </li>
            </ul>
        </div>
    </div>
</nav>