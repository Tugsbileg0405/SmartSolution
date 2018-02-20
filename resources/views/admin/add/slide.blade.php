@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Слайд нэмэх</h4>
                    </div>
                    <div class="content">
                        <form method="POST" autocomplete="off" enctype="multipart/form-data" id="addslideform" action="{{ url('/admin/slide') }}">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Гарчиг:</label>
                                        <input type="text" required class="form-control border-input" name='title' placeholder="Гарчиг">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Тайлбар:</label>
                                        <textarea name="description" class="form-control" required id="description" rows="6" placeholder="Тайлбар..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Файл /Зураг эсвэл видио/</label>
                                        <div class="js-upload uk-placeholder uk-text-center">
                                            <span uk-icon="icon: cloud-upload"></span>
                                            <span class="uk-text-middle">Оруулах зураг эсвэл файлаа</span>
                                            <div uk-form-custom>
                                                <input type="file" multiple>
                                                <span class="uk-link">энд даран</span>
                                            </div>
                                            <span class="uk-text-middle">оруулна уу</span>
                                        </div>
                                        <progress id="js-progressbar" class="uk-progress uk-progress-warning" value="0" max="100" hidden></progress>
                                        <div id="filesPanel">
                                            <video id="video-source" class="hide" controls preload="auto" loop="loop" muted="muted" volume="0">
                                                <source src="" type="video/mp4"> Video not supported
                                            </video>
                                            <div class="hide">
                                                <img id="image-source" class="img-rounded img-responsive" src="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Товч гаргах эсэх:</label>
                                        <label class="radio">
                                            <input type="radio" class="isBtn" data-toggle="radio" name="isButton" value="1">
                                            Тийм
                                        </label>
                                        <label class="radio">
                                            <input type="radio" checked  class="isBtn" data-toggle="radio" name="isButton" value="0">
                                            Үгүй
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="buttonInfo">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Товчны текст:</label>
                                            <input type="text" class="form-control border-input " name='btnText' placeholder="Товчны текст">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Товчны линк:</label>
                                            <input type="text" class="form-control border-input" name='btnLink' placeholder="Товчны линк">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-fill pull-right">Нэмэх</button>
                            <div class="clearfix"></div>
                            <input type="hidden" name="filePath">
                            <input type="hidden" name="fileType">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
     

@push('script')
<script>
    $(document).ready(function(){
        @if (session('status'))
        $.notify({
            message: "{{ session('status') }}"
        },{
            type: 'success',
            timer: 2000
        });
        @endif
    });

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {
        url: '{{ url("admin/file/upload") }}',
        name: 'file',
        multiple: false,
        error: function (e) {
            bar.setAttribute('hidden', 'hidden');
            if (e == 'Bad Request') {
                $.notify({
                    message: "Зураг эсвэл видео оруулна уу"
                }, {
                    type: 'warning',
                    timer: 2000
                });
            } else {
                $.notify({
                    message: "Алдаа гарлаа. Түр хүлээгээд дахин оролдоно уу"
                }, {
                    type: 'warning',
                    timer: 2000
                });
            }
        },
        complete: function (data) {
            var resp = JSON.parse(data.response);
            $( "input[name='fileType']" ).val(resp.type);
            $( "input[name='filePath']" ).val(resp.path);
            $("#filesPanel video").addClass('hide');
            $("#filesPanel div").addClass('hide');
            if (resp.type == 'video') {
                $("#video-source").attr('src', '{{ asset('') }}' + resp.path);
                setTimeout(() => {
                    $("#filesPanel video").removeClass('hide');
                }, 1000);
            } else if (resp.type == 'image') {
                $("#image-source").attr('src', '{{ asset('') }}' + resp.path);
                setTimeout(() => {
                    $("#filesPanel div").removeClass('hide');
                }, 1000);
            }
        },
        loadStart: function (e) {
            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },
        progress: function (e) {
            bar.max = e.total;
            if ((e.loaded / e.total) * 100 < 40) {
                bar.value = e.loaded;
            } else {
                setInterval(function() {
                    bar.value += e.total / 1000;
                }, 5000);
            }
            if (bar.nax == e.total) {
                console.log('prossing haruulna');
            } 
        },
        loadEnd: function (e) {
            bar.max = e.total;
            bar.value = e.loaded;
        },
        completeAll: function () {
            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);
            $.notify({
                message: "Амжилттай хуулагдлаа"
            }, {
                type: 'info',
                timer: 2000
            });
        }
    });

    $('.buttonInfo').hide();
    $("input[name=isButton]").on("change", function() {
        if ($("input[name=isButton]").parent().hasClass('checked')) {
            if ($("input[name=isButton]:checked").val() == 0) {
                $('input[name="btnText"]').val(null);
                $('input[name="btnLink"]').val(null);
                $('.buttonInfo').hide();
            } else {
                $('.buttonInfo').show();
            }
        }

    });
</script>
@endpush