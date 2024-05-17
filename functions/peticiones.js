var obtprovincia = document.getElementById ('id_provincia')
obtprovincia.addEventListener('change', getlocalidad)
var obtlocalidad = document.getElementById ('id_localidad')
obtlocalidad.addEventListener('change', getbarrio)
var obtbarrio = document.getElementById('id_barrio');
obtbarrio.addEventListener('change', getcalles)
var obtcalle = document.getElementById('id_calle');

function fetchAndSetData(url, formData, targetElement){
    return fetch(url, {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        targetElement.innerHTML = ""; // Limpiar opciones existentes
        data.forEach(localidad => {
            const option = document.createElement("option");
            option.value = localidad.id_localidad;
            option.textContent = localidad.nom_loc;
            targetElement.appendChild(option);
        });
    })
    .catch(err => console.log(err));
}
function fetchAndSetBarrios(url, formData, targetElement){
    return fetch(url, {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        targetElement.innerHTML = ""; // Limpiar opciones existentes
        data.forEach(barrio => {
            const option = document.createElement("option");
            option.value = barrio.id_barrio;
            option.textContent = barrio.nom_barrio;
            targetElement.appendChild(option);
        });
    })
    .catch(err => console.log(err));
}
function fetchAndSetCalles(url, formData, targetElement){
    return fetch(url, {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        targetElement.innerHTML = ""; // Limpiar opciones existentes
        data.forEach(calle => {
            const option = document.createElement("option");
            option.value = calle.id_calle;
            option.textContent = calle.nom_calle;
            targetElement.appendChild(option);
        });
    })
    .catch(err => console.log(err));
}

function getlocalidad(){
    let provincia = obtprovincia.value;
    if (provincia) { // Verificar si se ha seleccionado una provincia
        let url = '../config/getlocalidades.php';
        let formData = new FormData();
        formData.append ('id_provincia', provincia);
        fetchAndSetData(url, formData, obtlocalidad);
    } else {
        // Dejar el selector de localidades vacío o hacer cualquier otra acción necesaria
        obtlocalidad.innerHTML = "<option value=''>Seleccionar</option>";
    }
}
function getbarrio(){
    let localidad = obtlocalidad.value;
    if (localidad) { // Verificar si se ha seleccionado una localidad
        let url = '../config/getbarrios.php';
        let formData = new FormData();
        formData.append ('id_localidad', localidad);
        fetchAndSetBarrios(url, formData, obtbarrio);
    } else {
        // Dejar el selector de barrios vacío o hacer cualquier otra acción necesaria
        obtbarrio.innerHTML = "<option value=''>Seleccionar</option>";
    }
}

function getcalles(){
    let barrio = obtbarrio.value;
    if (barrio) { // Verificar si se ha seleccionado un barrio
        let url = '../config/getcalles.php';
        let formData = new FormData();
        formData.append ('id_barrio', barrio);
        fetchAndSetCalles(url, formData, obtcalle);
    } else {
        // Dejar el selector de calles vacío o hacer cualquier otra acción necesaria
        obtcalle.innerHTML = "<option value=''>Seleccionar</option>";
    }
}