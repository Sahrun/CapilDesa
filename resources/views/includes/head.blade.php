<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Capil Desa</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="{{asset('app-assets/js/core/jquery.3.2.1.min.js')}}"></script>
  <script src="{{asset('app-assets/js/plugin/webfont.min.js')}}"></script>
  <script src="{{asset('app-assets/js/custome.js')}}"></script>
  <script>
    WebFont.load({
      google: { "families": ["Open+Sans:300,400,600,700"] },
      custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset("app-assets/css/fonts.css")}}'] },
      active: function () {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{asset('app-assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/css/azzara.min.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/css/style.css')}}">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link rel="stylesheet" href="assets/css/demo.css"> -->