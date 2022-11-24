@extends("layouts.master")
@push("title")
    Categories
@endpush
@section("styles")
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/custom_dt_html5.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("plugins/table/datatable/dt-global_style.css") }}">
    <style>
        .table-icon{
            font-size: 20px;
            cursor: pointer;
        }
    </style>
@endsection
@push("sub-title")
    Categories
@endpush
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <x-elements.breadcrumb>
                    <x-elements.bread-item :href="route('categories.index')" text="Categories" :active="true"/>
                </x-elements.breadcrumb>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @can("create", \App\Models\Category::class)
                            <div class="w-100 text-right">
                                <button class="btn btn-primary" id="create-category-btn">Create</button>
                            </div>
                            <hr>
                        @endcan
                        @can("viewAny", \App\Models\Category::class)
                            {{ $dataTable->table() }}
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @can("create", \App\Models\Category::class)
            <x-elements.modal id="createCategory">
                @livewire("categories.create-category")
            </x-elements.modal>
        @endcan
        <x-elements.modal id="updateCategory">
            @livewire("categories.update-category")
        </x-elements.modal>
    </div>
@endsection
@section("scripts")
    @can("viewAny", \App\Models\Category::class)
        <script src="{{ asset("plugins/table/datatable/datatables.js") }}"></script>
        <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
        <script src="{{ asset("plugins/table/datatable/button-ext/dataTables.buttons.min.js") }}"></script>
        <script src="{{ asset("plugins/table/datatable/button-ext/jszip.min.js") }}"></script>
        <script src="{{ asset("plugins/table/datatable/button-ext/buttons.html5.min.js") }}"></script>
        <script src="{{ asset("plugins/table/datatable/button-ext/buttons.print.min.js") }}"></script>
        {{ $dataTable->scripts() }}
    @endcan
    <script>
        $(function () {
            $("#create-category-btn").click(() => {
                Livewire.emit("cc-open");
            });
            $(document).on("click", ".btn-update", (event)=>{
                const item_id = event.target.parentElement.parentElement.childNodes[0].value;
                Livewire.emit("uc-open", item_id);
            });
        })
    </script>
@endsection
