@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row admin-header">
                    <div class="col-xs-12">
                        <div class="header">
                            <h4 class="title">Бүтээгдэхүүнүүд</h4>
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
                                            <table id="producttable" class="table table-hover table-striped dataTable" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Нэр</th>
                                                        <th>Үнэ</th>
                                                        <th>Бренд</th>
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

    <div id="productModal" class="modal fade" role="dialog">
        <form id="productform">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Бүтээгдэхүүн засварлах</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Нэр:</label>
                                    <input type="text" required class="form-control" placeholder="Нэр" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Товч танилцуулга:</label>
                                    <textarea name="short_description" required placeholder="Товч танилцуулга" class="form-control short_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Техникийн үзүүлэлт:</label>
                                    <textarea name="content" class="form-control my-editor" id="my-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Бүтээгдэхүүний үнэ:</label>
                                    <input type="number" required class="form-control" required placeholder="Бүтээгдэхүүний үнэ" name="price">
                                </div>
                                <div class="form-group">
                                    <label>Бренд сонгох:</label>
                                    <select class="selectbrand" name="brand" required>
                                        <option value="">Бренд сонгоно уу</option>
                                        @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Зураг оруулах:</label>
                                    <input type="file" name="file" style="display: none">
                                    <div class="photos product">
                                        <div class="browse{{ $errors->has('photos') ? ' has-error' : '' }}">
                                            <i class="fa fa-image fa-3x" aria-hidden="true"></i>
                                            <div class="wait">
                                                <div class="loader"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('photos'))
                                        <div class="form-group has-error">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('photos') }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
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
    $('#producttable').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: 5,
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "full_numbers",
        ajax: '{!! route('datatables.getproducts') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'brand.name', name: 'brand', orderable: false, searchable: false },
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
        $('#productform').on('submit', function (e) { 
            e.preventDefault();
            tinyMCE.get("my-editor").save();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/product') }}" + "/" + $('input[name="id"]').val(),
                data: $('#productform').serialize(),
                type: 'PUT',
                success: function(result) {
                    $.notify({
                        message: result
                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $('#producttable').DataTable().draw(false);
                    $('#productModal').modal('hide');
                }
            });
        });
       
    });

    $('.selectbrand').selectpicker();

    function openEdit(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('admin/product') }}" + "/" + data,
            type: 'GET',
            success: function(result) {
                $('input[name="id"]').val(result.id);
                $('input[name="name"]').val(result.name);
                $('input[name="price"]').val(result.price);
                $('.short_description').val(result.short_description);
                var base_url = '{{ url('/')}}';
                $('.photos').find('.photo').remove();
                result.photos.forEach(function(photo) {
                    var html = '<div class="photo">'+
                                    '<img src="'+ base_url + '/' + photo +'">'+
                                    '<input type="hidden" name="photos[]" value="'+  photo +'">'+
                                    '<i class="fa fa-close fa-4x" aria-hidden="true"></i>'+
                                    '<div class="wait">'+
                                        '<div class="loader"></div>'+
                                    '</div>'+
                                '</div>'
                    $('.photos').append(html);
                });
                if(result.description == null){
                    result.description = "";
                }
                tinyMCE.get('my-editor').setContent(result.description);
                $('.selectbrand').selectpicker('val', result.brand_id);
                $("#productModal").modal("show");
            }
        });
    } 

    var formData;
    var photos = $('.photos');
    var browse = $('.browse');
    var input = $('input[name=file]');
    browse.click(function() {
        input.click();
    });
    input.change(function() {
        browse.find('.fa').hide();
        browse.find('.wait').show();
        formData = new FormData();
        formData.append('file', input[0].files[0]);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            type: 'POST',
            url: '{{ url("admin/photo/create") }}',    
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data) {
            input.val(null);
            browse.find('.fa').show();
            browse.find('.wait').hide();
            photos.append(data);
        }).fail(function() {
            browse.find('.fa').show();
            browse.find('.wait').hide();
        });
    });

    $(document).on('click', '.photo .fa', function() {
        var photo = $(this).closest('.photo');
        photo.find('.fa').hide();
        photo.find('.wait').show();
        photo.remove();
    });

    function deleteProduct(id){
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
                url: "{{ url('admin/product') }}" + "/" + id,
                type: 'DELETE',
                success: function(result) {
                    $('#producttable').DataTable().draw(false);
                    swal(
                        '',
                        'Амжилттай устлаа',
                        'success'
                    )
                }
            });
        })
    }
</script>
@endpush