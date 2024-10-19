<!-- layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
    @stack('styles')
    @livewireStyles

</head>

<body>
        @yield('content')
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <div class="min-h-screen rounded-lg w-full px-4 bg-white">

        <script>
            window.addEventListener('notification', event => {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000"
                };
                if (event.detail[0].type == 'success') {
                    toastr.success(event.detail[0].message);
                    setTimeout(() => {
                        window.location.href='/dashboard';
                    }, 1000);
                } else if (event.detail[0].type == 'error') {
                    toastr.error(event.detail[0].message);
                }
            });
        </script>
    </div>
    @livewireScripts

</body>

</html>