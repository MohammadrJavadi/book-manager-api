<div>
    <div class="modal-header">
        <h1>@lang("modal.author.create")</h1>
    </div>
    <div class="modal-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name" class="col-form-label">{{ __("field.author.name") }}</label>
                    <input type="text" class="form-control" id="name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm-6">
                    <label for="family" class="col-form-label">{{ __("field.author.family") }}</label>
                    <input type="text" id="family" class="form-control" wire:model="family"/>
                    @error('family') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm-6">
                    <label for="age" class="col-form-label">{{ __("field.author.age") }}</label>
                    <input type="text" id="age" class="form-control" wire:model="age"/>
                    @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm-6">
                    <label for="gender" class="col-form-label">{{ __("field.author.gender") }}</label>
                    <select id="gender" class="form-control" wire:model="gender">
                        <option value="man" selected>@lang("general.gender.man")</option>
                        <option value="woman">@lang("general.gender.woman")</option>
                    </select>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
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
    @if(session()->has("saved") && !$errors->any())
        <div class="modal-footer">
            <div class="text-success">{{ session("saved") }}</div>
        </div>
    @endif
</div>
@push("js")
    <script>
        window.addEventListener("cam-open", ()=>{
            $("#createAuthorModal").modal();
        });
        window.addEventListener("cam-success", ()=>{
            window.LaravelDataTables["author-table"].ajax.reload();
        });
    </script>
@endpush
