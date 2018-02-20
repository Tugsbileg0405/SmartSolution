@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row admin-header">
                    <div class="col-xs-12">
                        <div class="header">
                            <h4 class="title">Слайд</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="fresh-datatables">
                            <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="content table-responsive table-full-width">
                                            <table id="slidetable" class="table table-hover table-striped dataTable" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Гарчиг</th>
                                                        <th>Файлын төрөл</th>
                                                        <th>Үүсгэсэн огноо</th>
                                                        <th>Засварласан огноо</th>
                                                        <th>Засварлах/Устгах</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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

    <div id="slideModal" class="modal fade" role="dialog">
        <form id="slideform" autocomplete="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Слайд засварлах</h4>
                    </div>
                    <div class="modal-body">
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
                        <input type="hidden" name="filePath">
                        <input type="hidden" name="fileType">
                        <input type="hidden" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Болих</button>
                        <button type="submit" id="editConfirm" class="btn btn-warning btn-fill btn-wd" >Хадгалах</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
<script type="text/javascript">
    $('#slidetable').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: 5,
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "full_numbers",
        ajax: '{!! route('datatables.getslides') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'fileType', name: 'fileType' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            "paginate": {
                "previous": "Өмнөх",
                "next": "Дараагийн",
                "first": "Эхнийх",
                "last": "Сүүлийнх",
            },
            "search": "Хайх:",
            "processing": "Боловсруулж байна...",
            "zeroRecords":  "Үр дүн олдсонгүй.",
            "loadingRecords": "Уншиж байна...",
            "emptyTable": "Үр дүн хоосон байна.",
            "info":  "Нийт _TOTAL_ үр дүнгээс _END_ үр дүнг харуулав.",
            "infoEmpty": "Үр дүн олдсонгүй",
            "lengthMenu":     "Нийт _MENU_-р харуулах",
            "aria": {
                "sortAscending":  ": өсөхөөр эрэмблэх",
                "sortDescending": ": буурахаар эрэмблэх"
            }
        }
    });

    $(document).ready(function(){
        $('#slideform').on('submit', function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/slide') }}" + "/" + $('input[name="id"]').val(),
                data: $('#slideform').serialize(),
                type: 'PUT',
                success: function(result) {
                    $.notify({
                        message: result
                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $('#slidetable').DataTable().draw(false);
                    $('#slideModal').modal('hide');
                }
            });
        });
    });


    function openEdit(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('admin/slide') }}" + "/" + data,
            type: 'GET',
            success: function(result) {
                $('input[name="id"]').val(result.id);
                $('input[name="title"]').val(result.title);
                $('textarea[name="description"]').val(result.description);
                $('input[name="btnText"]').val(result.btnText);
                $('input[name="btnLink"]').val(result.btnLink);
                $("#filesPanel video").addClass('hide');
                $("#filesPanel div").addClass('hide');
                if (result.fileType == 'video') {
                    $("#video-source").attr('src', '{{ asset('') }}' + result.file);
                    $("#filesPanel video").removeClass('hide');
                } else if (result.fileType == 'image') {
                    $("#image-source").attr('src', '{{ asset('') }}' + result.file);
                    $("#filesPanel div").removeClass('hide');
                }
                $("input[name='fileType']").val(result.fileType);
                $("input[name='filePath']").val(result.file);
                if (result.isButton == 1) {
                    $('.buttonInfo').show();
                    $('input:radio[name="isButton"]').filter('[value="0"]').attr('checked', true).parent().removeClass('checked');
                    $('input:radio[name="isButton"]').filter('[value="1"]').attr('checked', true).parent().addClass('checked');
                } else if (result.isButton == 0) {
                    $('.buttonInfo').hide();
                    $('input:radio[name="isButton"]').filter('[value="0"]').attr('checked', true).parent().addClass('checked');
                    $('input:radio[name="isButton"]').filter('[value="1"]').attr('checked', true).parent().removeClass('checked');
                }
                $("#slideModal").modal("show");
            }
        });
      
    } 

    function deleteSlide(id){
        swal({
            title: 'Утсгахдаа итгэлтэй байна уу?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Устгах',
            cancelButtonText: 'Болих'
        }).then(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/slide') }}" + "/" + id,
                type: 'DELETE',
                success: function(result) {
                    $('#slidetable').DataTable().draw(false);
                    swal(
                        '',
                        'Амжилттай устлаа',
                        'success'
                    )
                }
            });
        })
    }

    $("input[name=isButton]").on("change", function() {
        if ($("input[name=isButton]").parent().hasClass('checked')) {
            if ($("input[name=isButton]:checked").val() == 0) {
                $('.buttonInfo').hide();
            } else {
                $('.buttonInfo').show();
            }
        }
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
</script>
@endpush