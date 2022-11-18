@extends("layouts.master")
@push("title")
    Books list
@endpush
@section("styles")
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/custom_dt_html5.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/dt-global_style.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/sweetalerts/sweetalert2.min.css") }}">
    <style>
        .table-icon {
            font-size: 20px;
            cursor: pointer;
        }
    </style>
@endsection
@push("sub-title")
    Books list
@endpush
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <x-elements.breadcrumb>
                    <x-elements.bread-item text="books list" :href="route('books.index')" :active="true"/>
                </x-elements.breadcrumb>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @can("create", \App\Models\Book::class)
                            <div class="w-100 text-right">
                                <a href="{{ route("books.create") }}" class="btn btn-primary">create book</a>
                            </div>
                            <hr>
                        @endcan
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="success" value="{{ session("success")??null }}">
    <input type="hidden" id="delete-success" value="{{ __("message.deleted", ["resource" => "book"]) }}">
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
    @if(session()->has("success"))
        <script src="{{ asset("assets/js/success-message.js") }}"></script>
    @endif
    <script src="{{ asset("assets/js/delete-book.js") }}"></script>
@endsection
