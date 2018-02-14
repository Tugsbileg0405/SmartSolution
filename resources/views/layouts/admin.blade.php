<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Smart Solution LLC</title>
    
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        
        <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    </head>
    <body>
        
        @if(Route::current()->getName() !== 'admin.login') 
            <div class="wrapper">
                @include('partials.admin-sidemenu')
                <div class="main-panel ps-container">
                    @include('partials.admin-header')
        @endif
                    @yield('content')
        @if(Route::current()->getName() !== 'admin.login') 
                </div>
            </div>
        @endif

        
        <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    
        <!--  Checkbox, Radio & Switch Plugins -->
        <script src="{{ asset('assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>
    
        <!--  Charts Plugin -->
        <script src="{{ asset('assets/js/chartist.min.js') }}"></script>
    
        <!--  Notifications Plugin    -->
        <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    
        <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->

        <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables.boostrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetAlert.min.js') }}"></script>
        
        <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
        <script src="{{ asset('assets/js/notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>
        <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            var editor_config = {
                path_absolute : "/SmartSol/public/",
                selector: "textarea.my-editor",
                plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
                }
            };

            tinymce.init(editor_config);
        </script>
        @stack('script')
    </body>
</html>
