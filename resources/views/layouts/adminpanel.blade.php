<!DOCTYPE html>
<html lang="en">

    <head>
        @include('adminpanel.components.includes.meta')
        <title>@yield('title')</title>

        @include('adminpanel.components.includes.style')
        @stack('mystyle')
    </head>

    <body>
        @include('sweetalert::alert')
        <div id="app">
            <div id="main" class="layout-horizontal">
                <header class="mb-5">

                    @include('adminpanel.components.partials.header')
                    @include('adminpanel.components.partials.menu')
                </header>

                <div class="content-wrapper container">
                    <div class="page-heading">
                        <h3>@yield('page-heading')</h3>
                    </div>
                    <div class="page-content">
                        @yield('content')
                    </div>
                </div>

                @include('adminpanel.components.partials.footer')
            </div>
        </div>
        @include('adminpanel.components.includes.script')

        @stack('myjs')
    </body>

</html>
