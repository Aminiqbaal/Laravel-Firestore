<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts._meta')

    <title>@yield('title') | Stisla</title>

    @include('layouts._css')
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                @yield('content')
            </div>
        </section>
    </div>

    @include('layouts._js')
</body>
</html>
