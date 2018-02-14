<div class="sidebar" data-color="orange" data-image="{{ asset('assets/img/sidebar-4.jpg') }}">
    <div class="logo">
        <a href="{{ URL ('/admin') }}" class="logo-text">
            Smart Soluction LLC
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('admin/addcategory*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/addcategory') }}">
                    <i class="fa fa-plus-circle"></i>
                    <p>Ангилал нэмэх</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/category') }}">
                    <i class="fa fa-list"></i>
                    <p>Ангилалууд</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/addbrand*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/addbrand') }}">
                    <i class="fa fa-plus-circle"></i>
                    <p>Бренд нэмэх</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/brand*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/brand') }}">
                    <i class="fa fa-bold"></i>
                    <p>Брендүүд</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/addproduct*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/addproduct') }}">
                    <i class="fa fa-plus-circle"></i>
                    <p>Бүтээгдэхүүн нэмэх</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/product*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/product') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <p>Бүтээгдэхүүн</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/addfaq*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/addfaq') }}">
                    <i class="fa fa-plus-circle"></i>
                    <p>FAQ нэмэх</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/faq') }}">
                    <i class="fa fa-question-circle"></i>
                    <p>FAQ</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/contact') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Ирсэн зурвасууд</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/mail*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/mail') }}">
                    <i class="fa fa-envelope-o"></i>
                    <p>И-мэйл илгээх</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/addslide*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/addslide') }}">
                    <i class="fa fa-plus-circle"></i>
                    <p>Слайд нэмэх</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/slide*') ? 'active' : '' }}">
                <a href="{{ URL ('admin/slide') }}">
                    <i class="fa fa-sliders"></i>
                    <p>Слайд</p>
                </a>
            </li>
        </ul>
    </div>
</div>
