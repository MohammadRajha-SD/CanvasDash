<div class="weather-widget">
    <h3>{{ $widget->title }}</h3>
    <h2 class="text-xl font-semibold">Weather on {{ $widget->details['datetime'] }}</h2>
    <p class="text-gray-600">{{ $widget->details['description'] ?? 'No description available' }}</p>
    <p>Temp: {{ $widget->details['temp'] }}°C</p>
    <p>Conditions: {{ $widget->details['conditions'] }}</p>
</div>

@push('styles')
<style>
    .weather-widget {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
        border-radius: 8px;
    }

    .widget-header h3 {
        margin: 0;
        font-size: 1.25rem;
        text-align: center;
        color: white;
    }

    .widget-body p {
        margin: 5px 0;
        font-size: 1rem;
        text-align: center;
        color: white;
    }
</style>
@endpush