/*function alert(){
    Swal.fire({
        title: 'BIENVENIDO',
        text: 'ESTA ES LA INTERFAZ DE RAMAS',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
        window.location.href = '".$URL."/templete/pages/ramas/index.php';
        }
    })
}
//alert();*/

function Deplicacion(){
    Swal.fire({
        title: 'DUPLICACIÓN DE DATOS',
        text: 'La rama ya se encuentra registrada',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
        window.location.href = '".$URL."/templete/pages/ramas/index.php';
        }
    })
}