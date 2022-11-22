$(function () {
    $("#create-author-modal-btn").click(()=>{
        Livewire.emit("openModal");
    });
    $(document).on("click", ".btn-update", function (event){
        const item_id = event.target.parentElement.parentElement.childNodes[0].value;
        Livewire.emit("openUpdateModal", item_id);
    });
});
