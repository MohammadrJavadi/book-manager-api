$(function () {
    // variables
    const doc = $(document);

    // actions
    $("#create-author-modal-btn").click(()=>{
        Livewire.emit("openModal");
    });
    doc.on("click", ".btn-update", function (event){
        const item_id = event.target.parentElement.parentElement.childNodes[0].value;
        Livewire.emit("openUpdateModal", item_id);
    });
    doc.on("click", ".btn-delete", event=>{
        const item_id = event.target.parentElement.parentElement.childNodes[0].value;
        const delete_route = `${$('#author-base-link').val()}/${item_id}`;
        console.log(delete_route)
        swal({
            "title":"Delete?",
            "text":"Are you sure about the delete operation?",
            type:"success",
            showCancelButton:true,
            confirmButtonText:'Yes',
            cancelButtonText:'No'
        }).then((res)=>{
            if (res.dismiss!=="cancel"){
                $.ajax({
                    url: delete_route,
                    method: "DELETE",
                    data: {
                        "_token": $("#csrf").val()
                    }
                }).then(() => {
                    swal({
                        title: "Success!",
                        text: $("#delete-success").val(),
                        type: "success",
                        confirmButtonText: 'OK',
                    });
                    window.LaravelDataTables["author-table"].ajax.reload();
                });
            }
        });
    });
});
