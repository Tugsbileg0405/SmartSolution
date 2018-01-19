@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Бренд нэмэх</h4>
                    </div>
                    <div class="content">
                        <form method="POST" id="myform" action="{{ url('/admin/brand') }}">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Нэр:</label>
                                        <input type="text" required class="form-control" placeholder="Нэр" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Тайлбар:</label>
                                        <textarea name="content" class="form-control my-editor"></textarea>
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
        $('.selectcategory').selectpicker();
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