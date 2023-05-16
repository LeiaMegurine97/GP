let inputContainer = document.getElementById('dinamic');
let btnAgregar = document.getElementById('agregar');

let participante;

function createInputs(min) {
    participante=1;
    for (let i = 1; i <= min; i++) {
        const div2 = document.createElement('div');
        div2.innerHTML = createInputsHTML(participante, minJug);
        participante++;
        inputContainer.appendChild(div2);
        obtener_dependencias();

        const defaultFile = "update_participantes/Credencial_UAEH.png";

        // Obtener todos los inputs con el nombre 'foto_participante[]'
        const files = document.getElementsByName('foto_participante[]');

        // Recorrer todos los inputs y agregar el listener para el evento 'change'
        for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const img = document.getElementById(`img${i}`); // Agregar un identificador único a cada imagen
        
            file.addEventListener('change', e => {
                if (e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
                } else {
                img.src = defaultFile;
                }
            });
        }
    }
    
}

//METODO QUE SE EJECUTA CUANDO SE DA CLICK AL BOTON DE AGREGAR ELEMENTOS
btnAgregar.addEventListener('click', () => {
    if (inputContainer.children.length <= maxJug) {
    const div = document.createElement('div');
    div.innerHTML = createInputsHTML(participante, maxJug);
    participante++;
    inputContainer.appendChild(div);
    if (inputContainer.children.length > maxJug) {
        btnAgregar.style.display = 'none';
    }
    obtener_dependencias();
    }
});

function createInputsHTML(participante, minJug) {
    let titulo = `DATOS DEL PARTICIPANTE #${participante}`;
    let campos_exclusivos = ``;        

    if (participante == 1) {
        if(minJug!=1){
            titulo = `DATOS DEL LIDER DEL EQUIPO`;
        }else{
            titulo = `DATOS DEL PARTICIPANTE`;
        }
        campos_exclusivos = `
        <div class="col-xs-4">
            <div class="form-group">
                <label>Celular</label>
                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" minlength="10" maxlength="10" name="celular_participante" required>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email_participante" required>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="">Nombre del equipo</label>
                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_equipo" required>
            </div>
        </div>`;
    }

    return `<div class="col-xs-12">
        <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp ${titulo} </h5>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_participante[]" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control" style="text-transform: uppercase" name="apPaterno_participante[]" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control" style="text-transform: uppercase" name="apMaterno_participante[]" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label class="control-label">Fecha de Nacimiento</label>
                <input class="form-control" name="fNacimiento_participante[]" data-date-format="mm/dd/yyyy" type="date" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="">Sexo</label>
                <select name="sexo_participante[]" class="form-control" required>
                    <option selected="true" disabled="disabled" value="" >SELECCIONAR...</option>
                    <option value="M" >MASCULINO</option>
                    <option value="F" >FEMENINO</option>
                </select>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="">No. Cuenta</label>
                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" minlength="6" maxlength="6" name="noCuenta_participante[]" required>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group">
                <label>Semestre</label>
                <input class="form-control" type="text" name="semestre_participante[]" onkeypress="return onlyNumberKey(event)" minlength="1" maxlength="2" required>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group">
                <label>Grupo</label>
                <input class="form-control" type="text" name="grupo_participante[]" onkeypress="return onlyNumberKey(event)" minlength="1" maxlength="2" required>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <label for="">Dependencia</label>
                <select name="dependencia_participante[]" class="form-control dependencia-select" required> </select>
            </div>
        </div>
        
        ${campos_exclusivos}
        <div class="col-xs-6">
            <div class="form-group">
                <label for="">Fotografía <i class="fa fa-image"></i></label><br>
                <center><img src="update_participantes/Credencial_UAEH.png" alt="avatar" id=img[] style="width: 100%; height: 100%;"/></center>
                <input type="file" class="form-control" name="foto_participante[]" id="foto_participante" accept="image/*">
                <!--label for="foto_participante">Subir fotografía</label-->
            </div>                                    
        </div>
    </div>`;
}

// SCRIPT PARA LIMITAR CARACTERES
function onlyNumberKey(evt) {        
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
    return true;
}

function obtener_dependencias() {
    // hacer la petición AJAX
    $.ajax({
        url: 'obtener_dependencias.php',
        type: 'POST',
        success: function(respuesta) {
            // actualizar los select de dependencia
            $('.dependencia-select').html(respuesta);
        }
    });
}