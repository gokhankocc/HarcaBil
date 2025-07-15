<!doctype html>
<html lang="en" dir="ltr">

@include('site.layouts.head')
@yield('css')
<body class="geex-dashboard">
@include('site.layouts.header')

<main class="geex-main-content">
    @include('site.layouts.sidebar')
    @include('site.layouts.customizer')
    <div class="geex-content">
        @include('site.layouts.content__header')
        @yield('content')
    </div>
</main>

@include('site.layouts.script')
@yield('js')
</body>
</html>
