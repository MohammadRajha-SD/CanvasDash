<div class="grid-stack">
    @foreach ($widgets as $widget)
    <div class="grid-stack-item " style="background-color: {{$widget->color}} !important;"
        data-gs-id="{{ $widget['id'] }}" data-gs-width="{{ $widget->width }}" data-gs-height="{{ $widget->height }}"
        data-gs-x="{{ $widget->x }}" data-gs-y="{{ $widget->y }}" wire:key="widget-{{ $widget->id }}">
        @livewire($widget->name, ['widget' => $widget], key($widget->name . '_' . $widget->id))
    </div>
    @endforeach
</div>

@push('styles')
<link href="{{ asset('gridstack/gridstack.min.css') }}" rel="stylesheet" />

@endpush

@push('scripts')
<script src="{{ asset('gridstack/gridstack-all.js') }}"></script>

<script type="text/javascript">
    let grid = GridStack.init({
        float: true,
        cellHeight: 70,
        acceptWidgets: true,
    });


    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.grid-stack-item').forEach(item => {
        const width = parseInt(item.getAttribute('data-gs-width')) || 1;
        const height = parseInt(item.getAttribute('data-gs-height')) || 1;
        const x = parseInt(item.getAttribute('data-gs-x')) || 0;
        const y = parseInt(item.getAttribute('data-gs-y')) || 0;

        grid.makeWidget(item);
        grid.update(item, { w: Math.max(1, width), h: Math.max(1, height), x, y });
    });

    grid.on('change', function (event, items) {
        items.forEach(item => {
            const id = item.el.getAttribute('data-gs-id');
            const newWidth = Math.max(1, item.w); 
            const newHeight = Math.max(1, item.h); 
            const newX = item.x;
            const newY = item.y;

            Livewire.dispatch('updateWidget', {
                id,
                width: newWidth,
                height: newHeight,
                x: newX,
                y: newY
            });

            grid.update(item.el, { w: newWidth, h: newHeight, x: newX, y: newY });
        });
    });
});

</script>
@endpush