<div class="grid-stack">
    @foreach ($widgets as $widget)
    <div class="grid-stack-item "  style="background-color: {{$widget->color}} !important;" data-gs-id="{{ $widget['id'] }}" data-gs-width="{{ $widget->width }}"
        data-gs-height="{{ $widget->height }}" data-gs-x="{{ 0 }}" data-gs-y="{{ 0 }}">
        <div class="grid-stack-item-content-xyz">
            @livewire($widget->name, ['widget' => $widget], key($widget->name . '_' . $widget->id))
        </div>
    </div>
    @endforeach
</div>


@push('styles')
<link href="{{ asset('gridstack/gridstack.min.css') }}" rel="stylesheet" />
<style>
    .grid-stack-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('gridstack/gridstack-all.js') }}"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    const grid = GridStack.init({
        column: 12,
        minRow: 1,
        cellHeight: '100px',
        margin: 5,
    });

    // Load items from the database
    document.querySelectorAll('.grid-stack-item').forEach(item => {
        const width = parseInt(item.getAttribute('data-gs-width')) || 1; 
        const height = parseInt(item.getAttribute('data-gs-height')) || 1; 

        grid.makeWidget(item);
        grid.update(item, { w: width, h: height,  y:100, x:10});
    });
});

</script>
@endpush