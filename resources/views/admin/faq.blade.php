@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row admin-header">
                    <div class="col-xs-12">
                        <div class="header">
                            <h4 class="title">Түгээмэл асуулт хариултууд</h4>
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
                                            <table id="faqtable" class="table table-hover table-striped dataTable" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Асуулт</th>
                                                        <th>Хариулт</th>
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

    <div id="faqModal" class="modal fade" role="dialog">
        <form id="faqform">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">FAQ засварлах</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Асуулт:</label>
                                    <input type="text" required class="form-control" placeholder="Асуулт" name="question">
                                </div>
                                <div class="form-group">
                                    <label>Хариулт:</label>
                                    <textarea name="answer" id="my-editor" class="form-control my-editor"></textarea>
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
    $('#faqtable').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: 5,
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "full_numbers",
        ajax: '{!! route('datatables.getFaqs') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'question', name: 'question' },
            { data: 'answer', name: 'answer' },
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
            url: "{{ url('admin/faq') }}" + "/" + data,
            type: 'GET',
            success: function(result) {
                $('input[name="id"]').val(result.id);
                $('input[name="question"]').val(result.question);
                if(result.description == null){
                    result.description = "";
                }
                tinyMCE.get('my-editor').setContent(result.answer);
                $("#faqModal").modal("show");
            }
        });
      
    } 

    $(document).ready(function(){
        $('#faqform').on('submit', function (e) { 
            e.preventDefault();
            tinyMCE.get("my-editor").save();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('admin/faq') }}" + "/" + $('input[name="id"]').val(),
                data: $('#faqform').serialize(),
                type: 'PUT',
                success: function(result) {
                    $.notify({
                        message: result
                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $('#faqtable').DataTable().draw(false);
                    $('#faqModal').modal('hide');
                }
            });
        });
    });

    function deleteFaq(id){
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
                url: "{{ url('admin/faq') }}" + "/" + id,
                type: 'DELETE',
                success: function(result) {
                    $('#faqtable').DataTable().draw(false);
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