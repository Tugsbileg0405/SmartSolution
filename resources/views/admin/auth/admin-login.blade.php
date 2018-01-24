@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="orange">   
        <div class="content">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="header text-center">Нэвтрэх</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>И-мэйл хаяг:</label>
                                        <input type="email" placeholder="И-мэйл хаяг" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Нууц үг</label>
                                        <input type="password" placeholder="Нууц үг" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                    
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-warning btn-wd">Нэвтрэх</button>
                                </div>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div> 
</div> 
@endsection