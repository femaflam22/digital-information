<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMK Wikrama Kota Bogor</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/template/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/template/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/admin/template/css/style.css') }}">

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
  </head>
  <body>
    <div class="container-scroller">
        <div class="horizontal-menu">
        <nav class="bottom-navbar">
            <div class="container">
                <ul class="nav page-navigation justify-content-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">Form</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{route('create-prestasi')}}">Prestasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('create-item')}}">Item Lain</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-table menu-icon"></i>
                            <span class="menu-title">Table</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="{{route('index-prestasi')}}">Prestasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('index-item')}}">Item Lain</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('slider')}}" class="nav-link">
                            <i class="mdi mdi-emoticon menu-icon"></i>
                            <span class="menu-title">Slider</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
		<div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                @yield('content')

                <footer class="footer">
                    <div class="footer-wrap">
                      <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
                      </div>
                    </div>
                </footer>
            </div>
		</div>
    </div>

    <script>
        ClassicEditor
                .create( document.querySelector( '#desc-form' ) )
                .then( editor => {
                    let data = editor.getData();
                    console.log(data);
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/admin/template/vendors/base/vendor.bundle.base.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/template/js/template.js') }}"></script> --}}
  </body>
</html>