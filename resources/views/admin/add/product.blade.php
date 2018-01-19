@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Бүтээгдэхүүн нэмэх</h4>
                    </div>
                    <div class="content">
                        <form method="POST" id="myform" action="{{ url('/admin/product') }}">
                            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Нэр:</label>
                                        <input type="text" required class="form-control" placeholder="Нэр" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Товч танилцуулга:</label>
                                        <textarea name="short_description" required placeholder="Товч танилцуулга" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Техникийн үзүүлэлт:</label>
                                        <textarea name="content" class="form-control my-editor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Бүтээгдэхүүний үнэ:</label>
                                        <input type="number" required class="form-control" required placeholder="Бүтээгдэхүүний үнэ" name="price" value="{{ old('price') }}">
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
                                            @if (old('photos'))
                                                @foreach (old('photos') as $photo)
                                                    <div class="photo">
                                                        <img src="{{ asset($photo) }}">
                                                        <input type="hidden" name="photos[]" value="{{ $photo }}">
                                                        <i class="fa fa-close fa-4x" aria-hidden="true"></i>
                                                        <div class="wait">
                                                            <div class="loader"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
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
        $('.selectbrand').selectpicker();
        @if (session('status'))
        $.notify({
            message: " {{ session('status') }}"
        },{
            type: 'success',
            timer: 2000
        });
        @endif
    });

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
        var path = photo.find('input').val();
        photo.find('.fa').hide();
        photo.find('.wait').show();
        $.ajax({
            type: 'POST',
            url: '{{ url("admin/photo/destroy") }}',    
            data: {'path': path, '_token': '{{ csrf_token() }}'},
        }).done(function(data) {
            photo.remove();
        }).fail(function() {
            photo.find('.fa').show();
            photo.find('.wait').hide();
        });
    });
</script>
@endpush