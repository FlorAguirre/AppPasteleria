
async function getStock(){
    document.querySelector("#tblBodyStock").innerHTML = "";
    try{
        let resp = await fetch(base_url+"controllers/Stock.php?op=liststock");
        json = await resp.json();
        if(json.status){
            let data = json.data;
            data.forEach((item)=>{
                let newtr = document.createElement("tr");
                newtr.id = "row_" +item.id_mp;
                newtr.innerHTML = `<tr>
                                    <th scope="row">${item.id_mp}</th>
                                    <td>${item.nombre}</td>
                                    <td>${item.cantidad_mp}</td>
                                    <td>${item.medida}</td>
                                    <td>${item.options}</td>`;
                document.querySelector("#tblBodyStock").appendChild(newtr);
            });
            
        }
  
    }catch(err){
        console.log("Ocurrio un error: "+err);
    }
}

if(document.querySelector("#tblBodyStock")){
    getStock();
}


if(document.querySelector("#frmRestroStock")){
    let frmRegistroStock = document.querySelector("#frmRestroStock");
    frmRegistroStock.onsubmit = function(e){
        e.preventDefault();
        fntGuardarStock();
    }

    async function fntGuardarStock(){
        let strNombreStock = document.querySelector("#txtNombreStock").value;
        let intCantidad = document.querySelector("#txtCantidad").value;
        let strMedida = document.querySelector("#txtMedida").value;
        if(strNombreStock == "" || intCantidad == "" || strMedida == ""){
            alert("Todos los campos deben ser completados");
            return;
        }
        try{
            const data = new FormData(frmRegistroStock);
            let resp = await fetch(base_url+"controllers/Stock.php?op=registroStock",{
                method:'POST',
                mode:'cors',
                cache:'no-cache',
                body: data

            });
            json = await resp.json();
            if(json.status){
                swal('Guardar', json.msg, "success");
                frmRegistroProducto.reset();
            }else{
                swal('Guardar', json.msg, "error");
            }


        }catch(err){
            console.log("Ocurrio un error: "+err);
        }
    }
}

/*
async function fntMostrar(id){
    const frmData = new FormData();
    frmData.append('id_cliente',id);
    try{
        let resp = await fetch(base_url+"controllers/Persona.php?op=verregistro",{
            method:'POST',
            mode:'cors',
            cache:'no-cache',
            body: frmData
        });
        json = await resp.json();
        if(json.status){
            document.querySelector('#txtId').value = json.data.id_cliente;
            document.querySelector('#txtNombre').value = json.data.nombre;
            document.querySelector('#txtApellido').value = json.data.apellido;
            document.querySelector('#txtEmail').value = json.data.email;
            document.querySelector('#txtDNI').value = json.data.dni;
            document.querySelector('#txtTelefono').value = json.data.telefono;
            document.querySelector('#txtCalle').value = json.data.calle;
            document.querySelector('#txtCiudad').value = json.data.ciudad;
            document.querySelector('#txtCP').value = json.data.cp;
        }else{
            window.location = base_url+'views/persona/index.php';
        }

    }catch(err){
        console.log("Ocurrio un error: "+err);
    }
}

if(document.querySelector("#frmEditar")){
    let frmEditar = document.querySelector("#frmEditar");
    frmEditar.onsubmit = function(e){
        e.preventDefault();
        fntEditar();
    }

    async function fntEditar(){
        let intId = document.querySelector("#txtId").value;
        let strNombre = document.querySelector("#txtNombre").value;
        let strApellido = document.querySelector("#txtApellido").value;
        let strEmail = document.querySelector("#txtEmail").value;
        let strDNI = document.querySelector("#txtDNI").value;
        let intTelefono = document.querySelector("#txtTelefono").value;
        let strCalle = document.querySelector("#txtCalle").value;
        let strCiudad = document.querySelector("#txtCiudad").value;
        let strCP = document.querySelector("#txtCP").value;
        if(intId == "" || strNombre == "" || strApellido == "" || strEmail == "" || strDNI == "" || intTelefono == "" || strCalle == "" || strCiudad == "" || strCP == ""){
            alert("Todos los campos deben ser completados");
            return;
        }
        try{
            const data = new FormData(frmEditar);
            let resp = await fetch(base_url+"controllers/Persona.php?op=actualizar",{
                method:'POST',
                mode:'cors',
                cache:'no-cache',
                body: data

            });
            json = await resp.json();
            if(json.status){
                swal('Actualizar', json.msg, "success");
                frmEditar.reset();
            }else{
                swal('Actualizar', json.msg, "error");
            }


        }catch(err){
            console.log("Ocurrio un error: "+err);
        }
    }
}

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
        fntDelete(id);
    } else {
      swal("Se ha cancelado la acción");
    }
  });
}

async function fntDelete(id){

    try{
        let formData = new FormData();
        formData.append('id_cliente', id);
        let resp = await fetch(base_url+"controllers/Persona.php?op=eliminar",{
            method:'POST',
            mode:'cors',
            cache:'no-cache',
            body: formData

        });
     
        json = await resp.json();
        if(json.status){
            swal('Eliminar', json.msg, "success");
            document.querySelector('#row_'+id).remove();
        }else{
            swal('Eliminar', json.msg, "error");
        }
            

    }catch(err){
        console.log("Ocurrio un error: "+err);
    }
}

if(document.querySelector("#frmSearch")){
        let frmSearch = document.querySelector("#frmSearch");
        frmSearch.onsubmit = function(e){
            e.preventDefault();
           
            let busqueda = document.querySelector("#txtBuscar").value;
            if(busqueda == ""){
                    getPersona();
            }else{
                fntBuscarRegistros();
            }
        }
            let inputSearch = document.querySelector("#txtBuscar");
            inputSearch.addEventListener("keyup",fntInputSearch, true);

        async function fntBuscarRegistros(){
            document.querySelector("#tblBodyPersonas").innerHTML = "";
            try{
                let formData = new FormData(frmSearch);
                
                let resp = await fetch(base_url+"controllers/Persona.php?op=buscar",{
                    method:'POST',
                    mode:'cors',
                    cache:'no-cache',
                    body: formData
        
                });
                console.log(resp);
                json = await resp.json();
                if(json.status){
                    let data = json.data;
                    data.forEach((item)=>{
                        let newtr = document.createElement("tr");
                        newtr.id = "row_" +item.id_cliente;
                        newtr.innerHTML = `<tr>
                                            <th scope="row">${item.id_cliente}</th>
                                            <td>${item.nombre}</td>
                                            <td>${item.apellido}</td>
                                            <td>${item.email}</td>
                                            <td>${item.dni}</td>
                                            <td>${item.telefono}</td>
                                            <td>${item.calle}</td>
                                            <td>${item.ciudad}</td>
                                            <td>${item.cp}</td>
                                            <td>
                                            ' <a href="${base_url}views/persona/editar-persona.php?p=${item.id_cliente}" class="btn btn-outline-primary btn-sm" title="Editar Registro"><i
                                            class="fa-solid fa-user-pen"></i></a>
                                            <button class="btn btn-outline-danger btn-sm" title="Eliminar Registro" onclick="fntDelPersona(${item.id_cliente})" ><i
                                            class="fa-solid fa-trash-can"></i></button>'
                                            </td>`;
                        document.querySelector("#tblBodyPersonas").appendChild(newtr);
                    });
                }
                    
        
            }catch(err){
                console.log("Ocurrio un error: "+err);
            }
        }

function fntInputSearch(){
    let inputBusqueda = document.querySelector("#txtBuscar").value;
        if(inputBusqueda == ""){
            getPersona();
        }else{
            fntBuscarRegistros();
        }
}
}

*/