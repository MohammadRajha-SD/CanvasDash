<!-- resources/views/layouts/sidebar.blade.php -->
<div class="min-h-screen bg-dark  w-64 flex flex-col bg-white border-r border-gray-700">
    <div class="pt-4 text-center font-bold text-lg border-b ">
        <div class="wow animate__animated animate__fadeInDown flex justify-center mb-6">
            <picture>
                <source srcset="images/logo2.jpg" media="(max-width: 767px)" />
                <img src="images/logo1.jpg" alt="MyDashboard Logo" class="h-16 object-contain">
            </picture>
        </div>
    </div>
    <nav class="flex-grow">
        <ul class="space-y-4 mt-6 mx-2">
            <li>
                <a href="/"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif  ">
                    Home
                </a>
            </li>
            <li>
                @if(! App\Models\Widget::where('user_id', auth()->id())->where('name', 'map-widget')->exists())
                <a href="{{route('add.map.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Add Map Widget
                </a>
                @else
                <a href="{{route('add.map.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Edit Map Widget
                </a>
                @endif
            </li>
            <li>
                @if(! App\Models\Widget::where('user_id', auth()->id())->where('name', 'covid19-widget')->exists())
                <a href="{{route('add.map.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Add Covid-19 Widget
                </a>
                @else
                <a href="{{route('add.covid-19.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Edit Covid-19 Widget
                </a>
                @endif
            </li>
            <li>
                @if(! App\Models\Widget::where('user_id', auth()->id())->where('name', 'weather-widget')->exists())
                <a href="{{route('add.map.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Add Weather Widget
                </a>
                @else
                <a href="{{route('add.weather.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Edit Weather Widget
                </a>
                @endif
            </li>
            <li>
                @if(! App\Models\Widget::where('user_id', auth()->id())->where('name', 'news-widget')->exists())
                <a href="{{route('add.news.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Add News Widget
                </a>
                @else
                <a href="{{route('add.news.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Edit News Widget
                </a>
                @endif
            </li>
            <li>
                @if(! App\Models\Widget::where('user_id', auth()->id())->where('name', 'stockmarket-widget')->exists())
                <a href="{{route('add.stock-market.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Add Stock Market Widget
                </a>
                @else
                <a href="{{route('add.stock-market.widget')}}"
                    class="text-blue-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-blue-500 hover:text-white hover:shadow-lg font-serif ">
                    Edit Stock Market Widget
                </a>
                @endif
            </li>
            <li>
                <a href="/logout"
                    class="text-red-500 block px-4 py-2 rounded-lg transition-all duration-300 hover:bg-red-500 hover:text-white hover:shadow-lg font-serif ">
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</div>
<style>
    /* Optional: Make scrollbar look better */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
    }

    /* Sidebar animation */
    .sidebar-enter {
        opacity: 0;
        transform: translateX(-100%);
    }

    .sidebar-enter-active {
        opacity: 1;
        transform: translateX(0);
        transition: all 0.3s ease-in-out;
    }
</style>