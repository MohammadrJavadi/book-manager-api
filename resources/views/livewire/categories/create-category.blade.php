<div>
    <div class="modal-header">
        <h1>@lang("modal.category.create")</h1>
    </div>
    <div class="modal-body">
        <form>

        </form>
    </div>
</div>
@push("js")
    <script>
        window.addEventListener("ccm-open", ()=>{
            $("#createCategoryModal").modal();
        });
        window.addEventListener("ccm-close", ()=>{
            $("#createCategoryModal").modal("hide");
        });
    </script>
@endpush
