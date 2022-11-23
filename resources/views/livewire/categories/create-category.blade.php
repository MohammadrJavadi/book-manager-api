<div>
    <div class="modal-header">
        <h1>@lang("modal.category.create")</h1>
    </div>
    <div class="modal-body">
        <form>
            <div class="row">
                <div class="col-sm-12">
                    <label for="title" class="col-form-label">{{ \Illuminate\Support\Str::ucfirst(__("field.category.title")) }}</label>
                    <input type="text" id="title" class="form-control" wire:model="title"/>
                </div>
                <div class="col-sm-12">
                    <label for="summary" class="col-form-label">{{ \Illuminate\Support\Str::ucfirst(__("field.category.summary")) }}</label>
                    <textarea id="summary" class="form-control" wire:model="summary"></textarea>
                </div>
                <div class="col-sm-12 mt-3">
                    @if($errors->any() && !session()->has("saved"))
                        <div class="alert alert-danger">@lang("message.errors.try-resolve", ["error" => $errors->first()])</div>
                    @endif
                </div>
                <div class="col-sm-12 text-right mt-3">
                    <button class="btn btn-danger" type="reset">@lang("form.reset")</button>
                    <button class="btn btn-success" type="submit">@lang("form.submit")</button>
                </div>
            </div>
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
