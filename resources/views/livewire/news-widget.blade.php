<div class="weather-widget text-white overflow-y-auto h-full">
    <h3 class="font-semibold">{{ $widget->title }}</h3>
    <p class="font-serif">{{ $widget->description }}</p>
    <hr />
    <h2 class="text-xl font-semibold">Latest News</h2>
    <div class="overflow-y-auto h-full">
        @if (!empty($widget->details))
            @foreach ($widget->details as $article)
                <div class="news-article">
                    <h4 class="font-bold">{{ $article['title'] }}</h4>
                    <p class="text-sm">{{ Str::limit($article['description'], 50) }}</p>
                    <a href="{{ $article['url'] }}" class="text-blue-400" target="_blank">Read more</a>
                </div>
            @endforeach
        @else
            <p>No news available at the moment.</p>
        @endif
    </div>
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

    .news-article {
        margin-bottom: 5px; /* Space between articles */
    }

    .news-article h4 {
        margin: 0; /* No margin for the article title */
        font-size: 1rem; /* Adjust the font size for the title */
    }

    .news-article p {
        margin: 3px 0; /* Space for the article description */
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
