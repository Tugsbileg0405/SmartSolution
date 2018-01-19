@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row admin-header">
                    <div class="col-xs-12">
                        <div class="header">
                            <h4 class="title">Брендүүд</h4>
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
                                            <table id="brandtable" class="table table-hover table-striped dataTable" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Нэр</th>
                                                        <th>Ангилал</th>
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

    <div id="brandModal" class="modal fade" role="dialog">
        <form id="brandform">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Бренд засварлах</h4>
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
                                    <label>Тайлбар:</label>
                                    <textarea name="content" id="my-editor" class="form-control my-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ангилал сонгох:</label>
                                    <select class="selectcategory" name="category" required>
                                        <option value="">Ангилал сонгоно уу</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
    $('#brandtable').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: 5,
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "full_numbers",
        ajax: '{!! route('datatables.getbrands') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'category.name', name: 'category_id' },
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

    $('.selectcategory').selectpicker();

    function openEdit(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('admin/brand') }}" + "/" + data,
            type: 'GET',
            success: function(result) {
                $('input[name="id"]').val(result.id);
                $('input[name="name"]').val(result.name);
                if(result.description == null){
                    result.description = "";
                }
                tinyMCE.get('my-editor').setContent(result.description);
                $('.selectcategory').selectpicker('val', result.category_id);
                $("#brandModal").modal("show");
            }
        });
      
    } 

    $(document).ready(function(){
        $('#brandform').on('submit', function (e) { 
            e.preventDefault();
            tinyMCE.get("my-editor").save();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/brand') }}" + "/" + $('input[name="id"]').val(),
                data: $('#brandform').serialize(),
                type: 'PUT',
                success: function(result) {
                    $.notify({
                        message: result
                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $('#brandtable').DataTable().draw(false);
                    $('#brandModal').modal('hide');
                }
            });
        });
    });

    function deleteBrand(id){
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
                url: "{{ url('admin/brand') }}" + "/" + id,
                type: 'DELETE',
                success: function(result) {
                    $('#brandtable').DataTable().draw(false);
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