<div {{ $attributes }}>
    <button id="export-button" class="bg-blue-600 text-white rounded px-4 py-3 mr-4" type="button">
        {{ $slot }}
    </button>
    <span id="export-status" class="font-bold"></span>
</div>
