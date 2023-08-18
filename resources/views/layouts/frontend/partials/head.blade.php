<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') | Ecommerce</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Laravel toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

	{{-- <link rel="stylesheet" href="{{ asset('frontend/css/common.css') }}"> --}}
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">
    <style>
        #toast-container > div {
            width: 400px;
            opacity: 1 !important;
        }

        .fa-whatsapp {
            color: #4FCE5D;
        }

        .fa-facebook {
            color: #3B5998;
        }

        .sec-product-list .list-group-item {
            border: none;
        }

        /* Styling Pagination */
        .pagination{
            border-radius: 0;
        }

        .pagination .page-link {
            font-size: 0.813rem !important;
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            color: #FFF;
            background-color: #1C1E1F !important;
            border-color: #1C1E1F !important;
        }

        .pagination > li > a,
        .pagination > li > span {
           color: #1C1E1F !important;
        }

        .page-item:first-child .page-link,
        .page-item:last-child .page-link{
            border-radius: 0;
        }

        .page-item.active .page-link {
            color: #FFF !important;
            background-color: #1C1E1F !important;
            border-color: #1C1E1F !important;
        }

        .sec-product-list .btn-outline-danger {
            border-left: 0 !important;
        }
    </style>
    @yield('css')
</head>
