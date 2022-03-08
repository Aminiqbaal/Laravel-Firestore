<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts._meta')
    <title>@yield('title') | Stisla</title>

    @include('layouts._css')
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            @include('layouts._navbar')

            <!-- Main Content -->
            <div class="main-content" style="padding-top: 100px">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('layouts._footer')
        </div>
    </div>

    @include('layouts._js')
</body>
</html>
