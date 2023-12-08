<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('meta_tags')

        <title>@yield('title')</title>


		@include('frontend.includes.link')
		<!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MFCR6XXW');</script>
        <!-- End Google Tag Manager -->

        <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFCR6XXW"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
   </head>


	<body class="">
   <div class="main-wrapper {{ Request::is('login') ? 'logins':'' }} {{ Request::is('register') ? 'logins':'' }}">


		@yield('content')

		@include('frontend.includes.footer')
		@include('frontend.partials.popup')




   </div>

   @include('frontend.includes.script')
</body>






</html>

