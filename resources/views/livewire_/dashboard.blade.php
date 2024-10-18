<div class="grid-stack">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridstack@7.2.0/dist/gridstack.min.css">
    <script src="https://cdn.jsdelivr.net/npm/gridstack@7.2.0/dist/gridstack-h5.js"></script>

    @foreach ($widgets as $widget)
    <div class="grid-stack-item" data-gs-id="{{ $loop->index }}" data-gs-width="{{ $widget['width'] ?? 4 }}"
        data-gs-height="{{ $widget['height'] ?? 2 }}" data-gs-x="{{ $widget['x'] ?? 0 }}"
        data-gs-y="{{ $widget['y'] ?? 0 }}">
        <div class="grid-stack-item-content">
            @livewire($widget['name'], ['settings' => $widget['settings']])
        </div>
    </div>
    @endforeach

    <button wire:click="saveWidgets">Save Layout</button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grid = GridStack.init({
                column: 6, 
                resizable: true,
                draggable: true,
                alwaysShowResizeHandle: true,
                float: true,
            });

            // Save layout when user interacts (drag/resize ends)
            grid.on('change', function (event, items) {
                let updatedLayout = items.map(item => ({
                    id: item.id,
                    x: item.x,
                    y: item.y,
                    width: item.w,
                    height: item.h,
                }));

                @this.set('widgetLayout', updatedLayout);
            });

            // Listen to widget-saved event from Livewire
            window.addEventListener('widgets-saved', event => {
                alert(event.detail.message);
            });
        });
    </script>
</div>

@push('styles')
<link rel="stylesheet" href="{{ Vite::asset('css/gridstack.min.css') }}">
<link rel="stylesheet" href="{{ Vite::asset('css/gridstack-extra.min.css') }}">
@endpush

@push('scripts')
<script src="{{ Vite::asset('js/gridstack-all.js') }}"></script>
@endpush