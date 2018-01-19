@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row admin-header">
                    <div class="col-xs-12">
                        <div class="header">
                            <h4 class="title">Мэдээний ангилал</h4>
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
                                        <table id="categorytable" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0"
                                            width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>ID</th>
                                                    <th>Нэр</th>
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

<div id="categoryModal" class="modal fade" role="dialog">
    <form id="categoryform">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ангилал засварлах</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Нэр:</label>
                                    <input type="text" class="form-control" required placeholder="Нэр" name="name">
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
<script>
    $('#categorytable').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: 5,
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "full_numbers",
        ajax: '{!! route('datatables.getcats') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
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
    
    function openEdit(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('admin/category') }}" + "/" + data,
            type: 'GET',
            success: function(result) {
                $('input[name="id"]').val(result.id);
                $('input[name="name"]').val(result.name);
                $("#categoryModal").modal("show");
            }
        });
      
    }   

    $(document).ready(function(){
        $('#categoryform').on('submit', function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/category') }}" + "/" + $('input[name="id"]').val(),
                data: $('#categoryform').serialize(),
                type: 'PUT',
                success: function(result) {
                    $.notify({
                        message: result
                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $('#categorytable').DataTable().draw(false);
                    $('#categoryModal').modal('hide');
                }
            });
        });
    });

    function deleteCat(id){
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
                url: "{{ url('admin/category') }}" + "/" + id,
                type: 'DELETE',
                success: function(result) {
                    $('#categorytable').DataTable().draw(false);
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