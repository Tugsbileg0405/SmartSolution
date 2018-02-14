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
                        <form method="POST" enctype="multipart/form-data" id="addslideform" action="{{ url('/admin/slide') }}">
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
                                            <span class="uk-text-middle">Attach binaries by dropping them here or</span>
                                            <div uk-form-custom>
                                                <input type="file" multiple>
                                                <span class="uk-link">selecting one</span>
                                            </div>
                                        </div>
                                        <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
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
            message: " {{ session('status') }}"
        },{
            type: 'success',
            timer: 2000
        });
        @endif
    });

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {
        url: '{{ url("admin/video/upload") }}',
        name: 'file',
        multiple: false,
        beforeSend: function (environment) {
            console.log('beforeSend', arguments);
        },
        beforeAll: function () {
            console.log('beforeAll', arguments);
        },
        load: function () {
            console.log('load', arguments);
        },
        error: function () {
            bar.setAttribute('hidden', 'hidden');
            $.notify({
                message: "Алдаа гарлаа. Түр хүлээгээд дахин оролдоно уу"
            }, {
                type: 'warning',
                timer: 2000
            });
            console.log('error', arguments);
        },
        complete: function () {
            console.log('complete', arguments);
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
            alert('Upload Completed');
        }
    });

    // function isImage(file) {
    //     return file['type'].split('/')[0] == 'image';
    // }

    // function isVideo(file) {
    //     return file['type'].split('/')[0] == 'video';
    // }

    // var input = $('input[name=file]');
    // input.change(function() {
    //     var url = '';
    //     var fileType = '';
    //     if (isImage(input[0].files[0])) {
    //         url = '{{ url("admin/image/upload") }}';
    //         fileType = 'image';
    //     } else if (isVideo(input[0].files[0])) {
    //         fileType = 'video';
    //         url = '{{ url("admin/video/upload") }}';
    //     }
    //     if (url) {
    //         $('#addslideform').append('<input type="hidden" name="fileType" value="' + fileType + '" />');
    //         formData = new FormData();
    //         formData.append('file', input[0].files[0]);
    //         formData.append('_token', '{{ csrf_token() }}');
    //         $.ajax({
    //             type: 'POST',
    //             url: url,    
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //         }).done(function(data) {
    //             if (data.success) {
    //                 $('#addslideform').append('<input type="hidden" name="filePath" value="' + data.path + '" />');
    //             }
    //         }).fail(function(err) {
    //             console.log(err);
    //         });
    //     } else {
    //         $.notify({
    //             message: "Та зурган юмуу видео файл оруулна уу"
    //         }, {
    //             type: 'warning',
    //             timer: 2000
    //         });
    //     }
    // });

    $('.buttonInfo').hide();
    $("input[name=isButton]").on("change", function() {
        if ($("input[name=isButton]").parent().hasClass('checked')) {
            if ($("input[name=isButton]:checked").val() == 0) {
                $('.buttonInfo').hide();
            } else {
                $('.buttonInfo').show();
            }
        }

    });
</script>
@endpush