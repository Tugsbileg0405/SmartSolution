@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row admin-header">
                    <div class="col-xs-12">
                        <div class="header">
                            <h4 class="title">Ирсэн зурвасууд</h4>
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
                                            <table id="contacttable" class="table table-hover table-striped dataTable" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Овог</th>
                                                        <th>Нэр</th>
                                                        <th>И-мэйл</th>
                                                        <th>Мессеж</th>
                                                        <th>Үүсгэсэн огноо</th>
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
@endsection
@push('script')
<script type="text/javascript">
    $('#contacttable').DataTable({
        processing: true,
        serverSide: true,
        iDisplayLength: 5,
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        pagingType: "full_numbers",
        ajax: '{!! route('datatables.getcontacts') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'surname', name: 'surname' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'message', name: 'message' },
            { data: 'created_at', name: 'created_at' },
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
</script>
@endpush