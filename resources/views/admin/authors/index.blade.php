@extends("layouts.master")
@push("title")
    Authors
@endpush
@section("styles")
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/custom_dt_html5.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/dt-global_style.css") }}">
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
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script src="{{ asset("plugins/table/datatable/datatables.js") }}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset("plugins/table/datatable/button-ext/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("plugins/table/datatable/button-ext/jszip.min.js") }}"></script>
    <script src="{{ asset("plugins/table/datatable/button-ext/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("plugins/table/datatable/button-ext/buttons.print.min.js") }}"></script>
    {{ $dataTable->scripts() }}
@endsection
