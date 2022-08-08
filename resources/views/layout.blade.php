<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMK Wikrama Bogor</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/template/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/template/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
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
                                <li class="nav-item"><a class="nav-link" href="/prestasi">Prestasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="/other-item">Item Lain</a></li>
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
                                <li class="nav-item"><a class="nav-link" href="/prestasi">Prestasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="/other-item">Item Lain</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="mdi mdi-emoticon menu-icon"></i>
                            <span class="menu-title">Slider</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="docs/documentation.html" class="nav-link">
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
	<script src="{{ asset('assets/admin/template/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/admin/template/js/template.js') }}"></script>
  </body>
</html>