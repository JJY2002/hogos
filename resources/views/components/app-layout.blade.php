<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Vite Assets --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    {{-- Bootstrap + Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>House of Grill</title>

    {{-- Page-specific scripts section --}}
    @yield('scripts')
</head>
<body>

{{-- Header --}}
@if(session('admin') !== true)
    <x-header />
@else
    <x-admin-header />
@endif

{{-- Page content --}}
<div>
    {{ $slot }}
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
