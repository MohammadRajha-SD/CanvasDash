<div class="grid-stack">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridstack@7.2.0/dist/gridstack.min.css">
    <script src="https://cdn.jsdelivr.net/npm/gridstack@7.2.0/dist/gridstack-h5.js"></script>

    @foreach ($widgets as $widget)
    <div class="grid-stack-item" data-gs-id="{{ $loop->index }}" data-gs-width="4" data-gs-height="2">
        <div class="grid-stack-item-content">
            @livewire($widget['name'], ['settings' => $widget['settings']])
        </div>
    </div>
    @endforeach

    <button wire:click="saveWidgets">Save Layout</button>
   
    <script>
        window.addEventListener('widgets-saved', event => {
            alert(event.detail.message);
        });
    </script>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ Vite::asset('css/gridstack.min.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('css/gridstack-extra.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ Vite::asset('js/gridstack-all.js') }}"></script>
    <script>
        GridStack.init({column: 6});
    </script>
@endpush
