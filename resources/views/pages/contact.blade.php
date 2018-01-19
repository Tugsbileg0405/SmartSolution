@extends('layouts.app') 

@include('partials.navbar-2')

@section('content')
<div class="contact-us">
    <div class="section section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="card card-contact no-transition" data-radius="none">
                        <h3 class="card-title text-center">Бидэнтэй холбогдох</h3>
                        <div class="row">
                            <div class="col-md-5 offset-md-1">
                                <div class="card-block">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-info">
                                            <i class="nc-icon nc-pin-3" aria-hidden="true"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Хаяг</h4>
                                            <p> 2 тоот, 51б байр, Нархан хотхон,<br> 1-р хороо, Хан-Уул дүүрэг,<br> Улаанбаатар
                                                хот, Монгол улс
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info info-horizontal">
                                        <div class="icon icon-danger">
                                            <i class="nc-icon nc-badge" aria-hidden="true"></i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Холбоо барих</h4>
                                            <p> (+976) 70127788, 99985440<br> Ажлын өдрүүдэд, 8:00-22:00
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <form role="form" id="contact-form" method="POST" action="{{ url('/contact') }}">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Овог</label>
                                                    <input type="text" name="surname" required class="form-control" placeholder="Овог">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Нэр</label>
                                                    <input type="text" name="name" required  class="form-control" placeholder="Нэр">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">И-мэйл хаяг</label>
                                            <input type="email" name="email" required class="form-control" placeholder="И-мэйл хаяг">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Зурвас</label>
                                            <textarea name="message" class="form-control" required id="message" rows="6" placeholder="Зурвас"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary pull-right">
                                                    Зурвас илгээх
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $("#contact-form").validate({
        errorClass: 'form-control-feedback',
        rules: {
            surname: "required",
            name: "required",
            message: 'required',
            email: 'required'
        },
        messages: {
            surname: "* Овогоо оруулна уу.",
            name: "* Нэрээ оруулна уу.",
            message: '* Илгээх зурвасаа оруулна уу.',
            email: {
                required: "* И-мэйл хаягаа оруулна уу.",
                email: "* И-мэйл хаяг биш байна.",
            }
        }
    });
    
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