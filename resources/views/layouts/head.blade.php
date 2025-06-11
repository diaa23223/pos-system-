<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name') }} | {{ $page_title ?? null }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{ config('app.name') }} | {{ $page_title ?? null }}">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="{{ config('app.name') }} | {{ $page_title ?? null }}">
    <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="{{ config('app.name') }} | {{ $page_title ?? null }}">
    <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/admin/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    @stack('vendor-style')
    <!-- Charts -->
    <script src="{{ asset('vendor/admin/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('vendor-script')
    <!-- Datepicker -->
    <script src="{{ asset('vendor/admin/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('vendor/admin/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="{{ asset('vendor/admin/notyf/notyf.min.css') }}" rel="stylesheet">
    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets/admin/css/volt.css') }}" rel="stylesheet">
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        /* ظبط الـ Font حسب اللغة */
        body {
            font-family: {{ app()->getLocale() == 'ar' ? 'Cairo, sans-serif' : 'Arial, sans-serif' }};
        }

        .btn-light-blue {
    background-color: #e7f1ff;
    color: #212d3f;
    border: 1px solid #b6d4fe;
}

.btn-light-blue:hover {
    background-color: #d0e3ff;
    color: #06357a;
}

.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
}



        /* عكس الـ Sidebar */
        html[dir="rtl"] .sidebar {
            right: 0;
            left: auto;
            transform: translateX(0);
        }

        html[dir="ltr"] .sidebar {
            left: 0;
            right: auto;
            transform: translateX(0);
        }

        /* ظبط الـ Content */
        html[dir="rtl"] .content {
            margin-right: 280px;
            margin-left: 0;
        }

        html[dir="ltr"] .content {
            margin-left: 280px;
            margin-right: 0;
        }

        /* ظبط الـ Sidebar لما تكون collapsed */
        html[dir="rtl"] .sidebar.collapsed {
            transform: translateX(280px);
        }

        html[dir="ltr"] .sidebar.collapsed {
            transform: translateX(-280px);
        }

        /* ظبط النصوص والـ Alignment */
        html[dir="rtl"] .sidebar-text,
        html[dir="rtl"] .nav-link {
            text-align: right;
        }

        html[dir="ltr"] .sidebar-text,
        html[dir="ltr"] .nav-link {
            text-align: left;
        }

        /* ظبط ترتيب الأيقونات والنصوص في الـ Sidebar */
        html[dir="rtl"] .nav-link .sidebar-icon {
            margin-left: 10px;
            margin-right: 0;
        }

        html[dir="ltr"] .nav-link .sidebar-icon {
            margin-right: 10px;
            margin-left: 0;
        }

        /* ظبط الـ Cards في الـ Dashboard */
        .card {
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }

        /* ظبط الـ Navbar */
        html[dir="rtl"] .navbar-nav {
            flex-direction: row-reverse;
        }

        /* تحسين مظهر الأيقونات في الـ navbar */
        .nav-item .btn i {
            margin-right: {{ app()->getLocale() == 'ar' ? '0' : '5px' }};
            margin-left: {{ app()->getLocale() == 'ar' ? '5px' : '0' }};
            font-size: 1.2rem;
        }

        /* تنسيق الـ select */
        .language-select {
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            background-color: #fff;
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};
        }
    </style>

    @stack('page-style')
</head>