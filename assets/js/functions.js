function fntDelPersona(id){
    swal({
    title: "¿Realmente quieres eliminar este cliente?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Cliente eliminado", {
        icon: "success",
      });
    } else {
      swal("Se ha cancelado la acción");
    }
  });
}




