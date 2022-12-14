@extends("layouts.master")
@push("title")
    Authors
@endpush
@section("styles")
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/custom_dt_html5.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/dt-global_style.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/sweetalerts/sweetalert2.min.css") }}">
    <style>
        .table-icon{
            font-size: 20px;
            cursor: pointer;
        }
    </style>
@endsection
@push("sub-title")
    Authors
@endpush
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <x-elements.breadcrumb>
                    <x-elements.bread-item :href="route('authors.index')" text="Authors" :active="true"/>
                </x-elements.breadcrumb>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @can("create", \App\Models\Author::class)
                            <div class="w-100 text-right">
                                <x-elements.modal-btn target="createAuthor" content="Create" class="btn btn-primary" id="create-author-modal-btn"/>

                                <x-elements.modal id="createAuthor">
                                    @livewire("authors.create-author")
                                </x-elements.modal>
                            </div>
                            <hr class="mb-2">
                        @endcan
                        {{ $dataTable->table() }}
                            <x-elements.modal id="updateAuthor">
                                @livewire("authors.update-author")
                            </x-elements.modal>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="author-base-link" value="{{ route("authors.index") }}">
    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
@endsection
@section("scripts")
    <script src="{{ asset("plugins/table/datatable/datatables.js") }}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset("plugins/table/datatable/button-ext/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("plugins/table/datatable/button-ext/jszip.min.js") }}"></script>
    <script src="{{ asset("plugins/table/datatable/button-ext/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("plugins/table/datatable/button-ext/buttons.print.min.js") }}"></script>
    <script src="{{ asset("plugins/sweetalerts/sweetalert2.min.js") }}"></script>
    {{ $dataTable->scripts() }}
    <script src="{{ asset("assets/js/authors.js") }}"></script>
@endsection
