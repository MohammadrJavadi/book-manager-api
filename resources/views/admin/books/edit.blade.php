@extends("layouts.master")
@push("title")
    Edit book
@endpush
@section("styles")
    <link rel="stylesheet" href="{{ asset("plugins/sweetalerts/sweetalert2.min.css") }}">
@endsection
@push("sub-title")
    Edit "{{ $book->title }}"
@endpush
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <x-elements.breadcrumb>
                    <x-elements.bread-item :href="route('books.edit', $book->id)" text="Create book"/>
                </x-elements.breadcrumb>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <x-form.base :action="route('books.store')" method="post" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <x-form.input type="file" id="image" name="image" label="Image:"/>
                                <p class="text-info">Image previous: {{ $book->image }}</p>
                            </div>
                            <div class="col-sm-12">
                                <x-form.input id="title" name="title" label="Title:" :value="$book->title"/>
                            </div>
                            <div class="col-sm-6">
                                <x-form.input id="code" name="code" label="Code:" :value="$book->code"/>
                            </div>
                            <div class="col-sm-6">
                                <x-form.input id="shelf-number" name="shelf_number" label="Shelf Number:" :value="$book->shelf_number"/>
                            </div>
                            <div class="col-sm-12">
                                <x-form.textarea name="summary" id="summary" label="Summary:" :text="$book->summary"/>
                            </div>
                        </x-form.base>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="success" value="{{ session("success")??null }}">
@endsection
