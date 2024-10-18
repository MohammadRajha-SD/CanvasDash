<div>
    <h3>{{ $settings['title'] ?? 'Weather Widget' }}</h3>
    <p>Location: {{ $settings['location'] ?? 'London' }}</p>
    <ul>
        {{-- @foreach ($weatherData['daily']['temperature_2m_max'] ?? [] as $day => $temp)
            <li>Day {{ $day }}: {{ $temp }}°C</li>
        @endforeach --}}
    </ul>
</div>
