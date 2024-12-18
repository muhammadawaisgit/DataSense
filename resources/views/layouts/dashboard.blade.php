<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/bootstrap-overrides.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/plus-jakarta-display.min.css">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/color-scheme.css') }}">
</head>

@include('components.dashboard-theme-script')
<body class="dashboard-body">

    <section class="d-flex">
        @include('components.dashboard-sidebar')
    <main class="dashboard-main" style="width: calc(100% - 264px);">
            @include('components.dashboard-header')
            @yield('content')
        </main>
    </section>

    @include('components.scripts')
</body>
</html>