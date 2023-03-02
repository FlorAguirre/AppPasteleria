
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


async function fntMostrarStock(id){
    const frmData = new FormData();
    frmData.append('id_mp',id);
    try{
        let resp = await fetch(base_url+"controllers/Stock.php?op=verstock",{
            method:'POST',
            mode:'cors',
            cache:'no-cache',
            body: frmData
        });
        json = await resp.json();
        if(json.status){
            document.querySelector('#txtId').value = json.data.id_mp;
            document.querySelector('#txtNombreStock').value = json.data.nombre;
            document.querySelector('#txtCantidad').value = json.data.cantidad_mp;
            document.querySelector('#txtMedida').value = json.data.medida;
        }else{
            window.location = base_url+'views/stock/stock.php';
        }

    }catch(err){
        console.log("Ocurrio un error: "+err);
    }
}


if(document.querySelector("#frmEditarStock")){
    let frmEditarStock = document.querySelector("#frmEditarStock");
    frmEditarStock.onsubmit = function(e){
        e.preventDefault();
        fntEditarStock();
    }

    async function fntEditarStock(){
        let intId = document.querySelector("#txtId").value;
        let strNombreStock = document.querySelector("#txtNombreStock").value;
        let intCantidad = document.querySelector("#txtCantidad").value;
        let strMedida = document.querySelector("#txtMedida").value;

        if(intId == "" || strNombreStock == ""|| intCantidad == "" || strMedida == ""){
            alert("Todos los campos deben ser completados");
            return;
        }
        try{
            const data = new FormData(frmEditarStock);
            let resp = await fetch(base_url+"controllers/Stock.php?op=actualizar",{
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


function fntDelStock(id){
    swal({
    title: "¿Realmente quieres eliminar esta materia prima?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        fntDeleteStock(id);
    } else {
      swal("Se ha cancelado la acción");
    }
  });
}

async function fntDeleteStock(id){

    try{
        let formData = new FormData();
        formData.append('id_mp', id);
        let resp = await fetch(base_url+"controllers/Stock.php?op=eliminar",{
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
                fntBuscarStock();
            }
        }
            let inputSearch = document.querySelector("#txtBuscar");
            inputSearch.addEventListener("keyup",fntInputSearch, true);

        async function fntBuscarStock(){
            document.querySelector("#tblBodyStock").innerHTML = "";
            try{
                let formData = new FormData(frmSearch);
                
                let resp = await fetch(base_url+"controllers/Stock.php?op=buscar",{
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
                        newtr.id = "row_" +item.id_mp;
                        newtr.innerHTML = `<tr>
                                            <th scope="row">${item.id_mp}</th>
                                            <td>${item.nombre}</td>
                                            <td>${item.cantidad_mp}</td>
                                            <td>${item.medida}</td>
                                            <td>
                                            ' <a href="${base_url}views/stock/editar-stock.php?p=${item.id_mp}" class="btn btn-outline-primary btn-sm" title="Editar Registro"><i
                                            class="fa-solid fa-user-pen"></i></a>
                                            `;
                        document.querySelector("#tblBodyStock").appendChild(newtr);
                    });
                }
                    
        
            }catch(err){
                console.log("Ocurrio un error: "+err);
            }
        }

function fntInputSearch(){
    let inputBusqueda = document.querySelector("#txtBuscar").value;
        if(inputBusqueda == ""){
            getStock();
        }else{
            fntBuscarStock();
        }
}
}

