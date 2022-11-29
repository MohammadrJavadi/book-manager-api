swal({
    title:"Success!",
    text:$("#success").val(),
    type:"success",
    showCancelButton:true,
    confirmButtonText:'Redirect to list',
    cancelButtonText:'Cancel'
}).then(()=>{
    location.replace($("#resource-list-page").val());
});
