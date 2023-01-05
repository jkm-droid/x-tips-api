<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!---base css style---->
    <link rel="stylesheet" href="{{ asset('css/main-style.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.min.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset( 'assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset( 'assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!--- toast section---->
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('toast/css/eggy.css') }}" />
    <!-- Progressbar Styles -->
    <link rel="stylesheet" href="{{ asset('toast/css/progressbar.css') }}" />
    <!-- Themes -->
    <link rel="stylesheet" href="{{ asset('toast/css/theme.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Custom styles for this template-->
{{--    <link href="{{ asset('admin-assets/css/sb-admin-2.min.css') }}" rel="stylesheet">--}}
    <title>Tips Portal</title>
</head>
<body>
<div class="container-fluid" style="padding-top: 70px;">
    <!---- forum navbar---->
    @include('includes.navbar')

    @yield('content')
</div>

@include('includes.footer')

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Summernote -->
<script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function(){
        var currentscrollPos = window.pageYOffset;
        if (prevScrollpos > currentscrollPos) {
            document.getElementById("navbar").style.top = "0";
        }else{
            document.getElementById("navbar").style.top = "-60px";
        }
        prevScrollpos = currentscrollPos;
    }
</script>
</body>
</html>
