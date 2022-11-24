<div>
    @isset($book)
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="" style="width: 100%;height: 90px;border-radius: 50%;overflow: hidden">
                        <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="w-100" style="height: 100%">
                    </div>
                </div>
                <div class="col-sm-9 d-flex justify-content-center flex-column">
                    <div>
                        <p class="h5">{{ $book->title }}</p>
                    </div>
                    <div>
                        <span> {{ $book->category->title }}</span>
                        <small class="text-info d-block">{{ $book->code }}</small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mt-3" style="padding: 0 3rem;">
                        <i class="fa-solid fa-file-lines" style="font-size: 15px"></i>
                        <span class="h6">Summary</span>
                        <p class="mt-2">{{ $book->summary }}</p>
                    </div>
                    <div class="mt-3" style="padding: 0 3rem;">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Shelf number: </p><p>{{ $book->shelf_number }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Author: </p><p>{{ $book->author->name }} {{ $book->author->family }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset
</div>
@push("js")
    <script>
        window.addEventListener("sbm-open", ()=>{
            $("#specifyBookModal").modal();
        });
    </script>
@endpush
