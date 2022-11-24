<div>
    <div class="modal-header align-items-center">
        <span class="h1">Author profile</span>
    </div>
    <div class="modal-body">
        <div class="row">
            @isset($data)
                <div class="col-sm-12 mb-3">
                    <div class="h3"><i class="fa-solid fa-file-signature"></i> {{ $data->name }} {{ $data->family }}</div>
                </div>
                <div class="col-sm-6">
                    <div class="h6"><i class="fa-solid fa-calendar-days"></i> {{ $data->age }} years</div>
                </div>
                <div class="col-sm-6">
                    <div class="h6"><i class="fa-solid fa-venus-mars"></i> {{ $data->gender=="man"?__("general.gender.man"):__("general.gender.woman") }}</div>
                </div>
                <div class="col-sm-12 text-center mt-3">
                    <i class="fa-solid fa-book"></i> {{ $data->books()->count() }} Books
                </div>
            @endisset
        </div>
    </div>
</div>
@push("js")
    <script>
        window.addEventListener("bam-open", ()=>{
            $("#bookAuthorModal").modal();
        });
    </script>
@endpush
