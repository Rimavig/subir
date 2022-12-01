

var xhttp = new XMLHttpRequest();
xhttp.responseType = 'json';
xhttp.onreadystatechange = function () {
    console.log(this.readyState);
    if (this.readyState == 4 && this.status == 200) {
        console.log(xhttp.response);
        document.getElementById('email').innerHTML = xhttp.response.correo.toLowerCase();
        document.getElementById('phone').innerHTML = xhttp.response.celular;
        document.getElementById('ciudad').innerHTML = 'Guayaquil';
        document.getElementById('pic-employee').src = xhttp.response.imagen;
        document.getElementById('names').innerHTML = xhttp.response.nombre;
        document.getElementById('lastNames').innerHTML = xhttp.response.apellido;
    }
};

xhttp.open('GET', 'http://104.154.225.61/apiRest1/corp/v1/totem', true);
xhttp.setRequestHeader('Authorization', 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImNvcnBOYW1lIjoiQ09MRUdJTyJ9fQ.RW8qceXDKeJceYg-rL0pmyroF0k3ku2ot3sK4N-XyXk');
xhttp.send();