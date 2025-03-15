<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laraval Initializer')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            max-width: 600px;
            padding: 30px;
        }

        .mysql-fields {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (session('success') || session('error'))
            @include('larainitializer::partials.alert', [
                'type' => session('success') ? 'success' : 'danger',
                'message' => session('success') ? session('success') : session('error'),
            ])
        @endif


        <div class="card p-0">
            <div class="card-header d-flex align-items-center justify-content-center">
                <img src="https://squartup.com/images/logo-sm.png" style="height: 100px" alt="">
                <p style="margin-top: 20px; font-weight: bold;">
                    <span style="font-size: 20px;color: #e33fa2">Squartup</span>
                    <span style="font-size: 30px; color: #7b48cd;">|</span>
                    <span
                        style="font-size: 20px;color: #7b48cd;">{{ getenv('App_NAME') ?? 'Laravel' }}&nbsp;Setup</span>
                </p>
            </div>
            <div class="card-body">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toast').toast({
                delay: 5000
            });
            $('[data-dismiss="toast"]').click(function() {
                $(this).closest('.toast').toast('hide');
            });
        });
    </script>
    @stack('app-scripts')
</body>

</html>
