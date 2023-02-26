
async function getPersona(){
    try{
        let resp = await fetch("http://localhost:3000/Pasteleria/controllers/Persona.php?op=listregistros");
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
                                    <td>Options</td>`;
                document.querySelector("#tblBodyPersonas").appendChild(newtr);
            });
            
        }
        console.log(json);
    }catch(err){
        console.log("Ocurrio un error: "+err);
    }
}

getPersona();