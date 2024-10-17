<div>
    <h3>Edit {{ $widget['name'] }} Settings</h3>
    <label>Title:</label>
    <input type="text" wire:model="settings.title" />

    <label>Color:</label>
    <input type="color" wire:model="settings.color" />

    <button wire:click="saveSettings">Save</button>
</div>
