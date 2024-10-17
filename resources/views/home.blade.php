<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Dashboard - Landing Page</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Header Section -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">MyDashboard</h1>
            <div>

                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">Register</a>
                    @endif
                    @endauth
                </nav>
                @endif
                <a href="#" class="ml-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                    Get Started
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-extrabold text-blue-700 mb-4">
                Create Your Custom Dashboard in Seconds
            </h2>
            <p class="text-lg text-gray-700 mb-6">
                Drag-and-drop widgets, real-time data from multiple sources, and complete customization—designed for
                you.
            </p>
            <a href="#" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700">
                Get Started Now
            </a>
        </div>
    </section>

    <!-- Interactive Demo Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-8 text-center">
                Explore Live Widgets
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Weather Widget -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">Live Weather</h4>
                    <div class="text-gray-700">
                        22°C | Beirut
                    </div>
                </div>
                <!-- Stock Ticker Widget -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">Stock Market</h4>
                    <div class="text-gray-700">
                        AAPL: $174.50 ▲ 0.82%
                    </div>
                </div>
                <!-- News Widget -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">Latest News</h4>
                    <div class="text-gray-700">
                        “Global markets rally amid economic optimism...”
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Widget Cards Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-2xl font-semibold text-gray-800 mb-8">Choose from a Variety of Widgets</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">Weather</h4>
                    <p class="text-gray-600 mb-4">Monitor weather trends in your favorite locations.</p>
                    <a href="#" class="text-blue-600 hover:underline">Add to Your Dashboard</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">Stocks</h4>
                    <p class="text-gray-600 mb-4">Track real-time stock prices and trends.</p>
                    <a href="#" class="text-blue-600 hover:underline">Add to Your Dashboard</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">GitHub</h4>
                    <p class="text-gray-600 mb-4">Track your project’s progress from GitHub.</p>
                    <a href="#" class="text-blue-600 hover:underline">Add to Your Dashboard</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold mb-4">News</h4>
                    <p class="text-gray-600 mb-4">Get the latest headlines relevant to you.</p>
                    <a href="#" class="text-blue-600 hover:underline">Add to Your Dashboard</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-8 text-center">What Our Users Say</h3>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <p class="text-gray-700 mb-4">
                        “I use MyDashboard to track my GitHub projects and stocks daily—it’s amazing!”
                    </p>
                    <h4 class="font-bold">Sarah, Software Developer</h4>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <p class="text-gray-700 mb-4">
                        “With all my data in one place, I save so much time every day.”
                    </p>
                    <h4 class="font-bold">John, Financial Analyst</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 py-6 text-white">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <p>&copy; 2024 MyDashboard. All rights reserved.</p>
            <div class="space-x-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Contact</a>
            </div>
        </div>
    </footer>

</body>

</html>