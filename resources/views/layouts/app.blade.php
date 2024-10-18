<!-- layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .dashboard-header {
            padding: 20px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .dashboard-container {
            padding: 20px;
        }
        </style>
        @livewireStyles
    @stack('styles')
</head>

<body>
    <div class="container-fluid">
        <div class="dashboard-container">
            @yield('content')
        </div>
    </div>
    @livewireScripts
    @stack('scripts')
</body>

</html>