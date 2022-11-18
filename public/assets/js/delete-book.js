$("body").on("click", ".delete-btn", (el) => {
    swal({
        "title":"Delete?",
        "text":"Are you sure about the delete operation?",
        type:"success",
        showCancelButton:true,
        confirmButtonText:'Yes',
        cancelButtonText:'No'
    }).then((res)=>{
        if (res.dismiss!=="cancel"){
            const delete_route = el.target.parentElement.parentElement.childNodes[1].value;
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
                window.LaravelDataTables["book-table"].ajax.reload();
            });
        }
    });
});
