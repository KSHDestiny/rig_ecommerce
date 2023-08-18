<!DOCTYPE HTML>
<html lang="en">
@include('layouts.backend.partials.head')
<body style="background: #dddd;">
    
    @include('layouts.backend.partials.nav')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.backend.partials.sidebar')    
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    
    @include('layouts.backend.partials.scripts')
</body>
</html>