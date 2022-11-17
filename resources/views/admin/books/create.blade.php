@extends("layouts.master")
@push("title")
    Create book
@endpush
@push("sub-title")
    Create book
@endpush
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <x-elements.breadcrumb>
                    <x-elements.bread-item :href="route('books.create')" text="Create book"/>
                </x-elements.breadcrumb>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <x-form.base :action="route('books.store')" method="post" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <x-form.input type="file" id="image" name="image" label="Image:"/>
                            </div>
                            <div class="col-sm-12">
                                <x-form.input id="title" name="title" label="Title:"/>
                            </div>
                            <div class="col-sm-6">
                                <x-form.input id="code" name="code" label="Code:"/>
                            </div>
                            <div class="col-sm-6">
                                <x-form.input id="shelf-number" name="shelf_number" label="Shelf Number:"/>
                            </div>
                            <div class="col-sm-12">
                                <x-form.textarea name="summary" id="summary" label="Summary:"/>
                            </div>
                        </x-form.base>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
