<!-- layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Dashboard</title>

    <!-- Gridstack CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridstack@7.2.0/dist/gridstack.min.css" />
    <!-- Bootstrap CSS (optional, for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }

        .grid-stack-item-content {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
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
      @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="dashboard-header text-center">
            <h1>Customizable Dashboard</h1>
            <p>Drag, drop, and customize your widgets!</p>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-container">
            <div class="grid-stack">
                @yield('content') 
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
