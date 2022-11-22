@props([
    "id"
])
<!-- Modal -->
<div class="modal fade" id="{{ $id }}Modal" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
