@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Ангилал нэмэх</h4>
                    </div>
                    <div class="content">
                        <form method="POST" id="myform" action="{{ url('/admin/category') }}">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Нэр:</label>
                                        <input type="text" class="form-control" required placeholder="Нэр" name="name">
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
</script>
@endpush