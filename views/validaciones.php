<script type="text/javascript">

    const emailRegex = RegExp(
	/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Z]{2,4}$/i
    );

    const numberRegex = RegExp(
        /^[0-9]+$/
    );

    const dateRegex = RegExp(
        /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/
    );

    const timeRegex = RegExp(
        /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/
    );
     
    const stringRegex = RegExp(
        /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/
    );

    const addresRegex = RegExp(
        /^[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)* (((#|[nN][oO]\.?) ?)?\d{1,4}(( ?[a-zA-Z0-9\-]+)+)?)$/
    );
   
    
    
    $n1 = "<?php echo isset($campos['n1']) ? $campos['n1'] :''?>";
    $n3 = "<?php echo isset($campos['n3']) ? $campos['n3'] :''?>";
    $s1 = "<?php echo isset($campos['s1']) ? $campos['s1'] :''?>";
    $s2 = "<?php echo isset($campos['s2']) ? $campos['s2'] :''?>";
    $s3 = "<?php echo isset($campos['s3']) ? $campos['s3'] :''?>";
    $s4 = "<?php echo isset($campos['s4']) ? $campos['s4'] :''?>";
    $f  = "<?php echo isset($campos['f'])  ? $campos['f']  :''?>";
    $d  = "<?php echo isset($campos['d'])  ? $campos['d']  :''?>";
    $e  = "<?php echo isset($campos['e'])  ? $campos['e']  :''?>";
    $p  = "<?php echo isset($campos['p'])  ? $campos['p']  :''?>";

    console.log($s1);
    
    setInterval(function(){ 
    var documento          = document.getElementById('txtDocumento');
    var documento2         = document.getElementById('txtDocumento2');
    var nombre             = document.getElementById('txtNombre');
    var apellido           = document.getElementById('txtApellido');
    var fecha              = document.getElementById('txtFechaNacimiento');
    var direccion          = document.getElementById('txtDireccion');
    var telefono           = document.getElementById('txtTelefono');
    var genero             = document.getElementById('txtGenero');
    var estado             = document.getElementById('txtEstado');
    var eps                = document.getElementById('txtEps');
    var email              = document.getElementById('txtEmail');
    var password           = document.getElementById('txtPassword');
    var descripcion        = document.getElementById('txtDescripcion');
    var codEspecialidad    = document.getElementById('txtCodEspecialidad');
    var codEspecialidad2   = document.getElementById('txtCodEspecialidad2');
    var perfilProfesional  = document.getElementById('txtPerfilProfesional');
    var codMedico          = document.getElementById('txtCodMedico');
    var codMedico2         = document.getElementById('txtCodMedico2');
    var fechaIngreso       = document.getElementById('txtFechaIngreso');
    var aniosExperiencia   = document.getElementById('txtAniosExperiencia');
    var codPostal          = document.getElementById('txtCodPostal');
    var municipio          = document.getElementById('txtMunicipio');
    var departamento       = document.getElementById('txtDepartamento');


    if (documento && documento.value != "" || $n1 != ""){
        documento.setAttribute('Required','');
        var valueDoc = documento.value;

        if(numberRegex.test(valueDoc) && valueDoc > 99999999){
            documento.classList.remove('is-invalid');
            documento.classList.add('is-valid');
        }else{ 
            documento.classList.remove('is-valid');
            documento.classList.add('is-invalid');
            document.getElementById('documentoError').innerHTML = "Ingrese un documento valido";
        } 
    }

    if(nombre && nombre.value != "" || $s1 != ""){
        nombre.setAttribute('Required','');
        var value = nombre.value;

        if(stringRegex.test(value) && value.length > 3){
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
        }else{ 
            nombre.classList.remove('is-valid');
            nombre.classList.add('is-invalid');
            document.getElementById('nombreError').innerHTML = "El campo nombre no debe estar vacio o contener numeros";
        } 
    }

    if(apellido && apellido.value != ""){
        apellido.setAttribute('Required','');
        var value = apellido.value;

        if(stringRegex.test(value) && value.length > 3){
            apellido.classList.remove('is-invalid');
            apellido.classList.add('is-valid');
        }else{ 
            apellido.classList.remove('is-valid');
            apellido.classList.add('is-invalid');
            document.getElementById('apellidoError').innerHTML = "Ingrese un apellido valido";
        } 
    }

    if(fecha && fecha.value !== ""){
        fecha.setAttribute('Required','');
        var value = fecha.value;

        console.log(value.length);

        if(dateRegex.test(value) && value.length > 3 ){
            fecha.classList.remove('is-invalid');
            fecha.classList.add('is-valid');
        }else{
            fecha.classList.remove('is-valid');
            fecha.classList.add('is-invalid');
            document.getElementById('fechaError').innerHTML = "Ingrese una fecha valida";
        }
    }

    if(fechaIngreso && fechaIngreso.value != ""){
        fechaIngreso.setAttribute('Required','');
        var value = fechaIngreso.value;

        if(dateRegex.test(value) && value.length > 3){
            fechaIngreso.classList.remove('is-invalid');
            fechaIngreso.classList.add('is-valid');
        }else{ 
            fechaIngreso.classList.remove('is-valid');
            fechaIngreso.classList.add('is-invalid');
            document.getElementById('fechaIngresoError').innerHTML = "Ingrese una fechaIngreso valido";
        }
    }

    if(direccion && direccion.value != ""){
        direccion.setAttribute('Required','');
        var dereccionPrueba = document.getElementById("txtDireccion").value; 

        var value = direccion.value;

        valor = value == undefined ? "" : value;

        if(!value){
            console.log('no existe');
        }

        if(addresRegex.test(value) && value.length > 3){
            direccion.classList.remove('is-invalid');
            direccion.classList.add('is-valid');
        }else{ 
            direccion.classList.remove('is-valid');
            direccion.classList.add('is-invalid');
            document.getElementById('direccionError').innerHTML = "Ingrese una direccion valida";
        } 
    }

    if(telefono && telefono.value != "" || $n3 != ""){
        telefono.setAttribute('Required','');
        var valueDoc = telefono.value;

        if(numberRegex.test(valueDoc) && valueDoc > 999999){
            telefono.classList.remove('is-invalid');
            telefono.classList.add('is-valid');
        }else{ 
            telefono.classList.remove('is-valid');
            telefono.classList.add('is-invalid');
            document.getElementById('telefonoError').innerHTML = "El telefono debe tener min 7 digitos";
        } 
    }

    if (aniosExperiencia){
        $n2  = "<?php echo isset($campos['n2'])  ? $campos['n2']  :''?>";
        if($n2 != ""){
            aniosExperiencia.setAttribute('Required','');
            aniosExperiencia.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            aniosExperiencia.classList.remove('is-invalid');
            aniosExperiencia.classList.add('is-valid');
        }
    }

    if(genero){
        if($s3 != ""){
            genero.setAttribute('Required','');
            genero.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            genero.classList.remove('is-invalid');
            genero.classList.add('is-valid');
        }
    }

    if(estado){
        if($s2 != ""){
            estado.setAttribute('Required','');
            estado.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            estado.classList.remove('is-invalid');
            estado.classList.add('is-valid');
        }
    }

    if(eps){
        if($s4 != ""){
            eps.setAttribute('Required','');
            eps.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            eps.classList.remove('is-invalid');
            eps.classList.add('is-valid');
        }
    }

    if(email){
        if($e != ""){
            email.setAttribute('Required','');
            email.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            email.classList.remove('is-invalid');
            email.classList.add('is-valid');
        }
    }

    if(password){
        if($p != ""){
            password.setAttribute('Required','');
            password.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            password.classList.remove('is-invalid');
            password.classList.add('is-valid');
        }
    }

    if(documento2){
        $n4 = "<?php echo isset($campos['n4']) ? $campos['n4'] :''?>";
        if($n4 != ""){
            documento2.setAttribute('Required','');
            documento2.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            documento2.classList.remove('is-invalid');
            documento2.classList.add('is-valid');
        }
    }

    if(codEspecialidad){
        $n4 = "<?php echo isset($campos['n4']) ? $campos['n4'] :''?>";
        if($n4 != ""){
            codEspecialidad.setAttribute('Required','');
            codEspecialidad.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            codEspecialidad.classList.remove('is-invalid');
            codEspecialidad.classList.add('is-valid');
        }
    }

    if(codEspecialidad2){
        if($n3 != ""){
            codEspecialidad2.setAttribute('Required','');
            codEspecialidad2.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            codEspecialidad2.classList.remove('is-invalid');
            codEspecialidad2.classList.add('is-valid');
        }
    }

    if(codMedico){
        $n ="<?php echo isset($campos['n']) ? $campos['n'] :''?>";
        if($n != ""){
            codMedico.setAttribute('Required','');
            codMedico.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            codMedico.classList.remove('is-invalid');
            codMedico.classList.add('is-valid');
        }
    }

    if(codMedico2){
        $n ="<?php echo isset($campos['n']) ? $campos['n'] :''?>";
        if($n != ""){
            codMedico2.setAttribute('Required','');
            codMedico2.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            codMedico2.classList.remove('is-invalid');
            codMedico2.classList.add('is-valid');
        }
    }

    if(codPostal){
        $n5 = "<?php echo isset($campos['n5']) ? $campos['n5'] :''?>";
        if($n5 != ""){
            codPostal.setAttribute('Required','');
            codPostal.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            codPostal.classList.remove('is-invalid');
            codPostal.classList.add('is-valid');
        }
    }

    if(descripcion){
        if($s2 != ""){
            descripcion.setAttribute('Required','');
            descripcion.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            descripcion.classList.remove('is-invalid');
            descripcion.classList.add('is-valid');
        }
    }

    if(perfilProfesional){
        $s ="<?php echo isset($campos['s']) ? $campos['s'] :''?>";
        if($s != ""){
            perfilProfesional.setAttribute('Required','');
            perfilProfesional.classList.add('is-invalid');
        } else if("<?php echo isset($campos)?>" != ""){
            perfilProfesional.classList.remove('is-invalid');
            perfilProfesional.classList.add('is-valid');
        }
    }

    if(municipio){
        if($s4 != ""){
            municipio.setAttribute('Required','');
            municipio.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            municipio.classList.remove('is-invalid');
            municipio.classList.add('is-valid');
        }
    }

    if(departamento){
        $s5 = "<?php echo isset($campos['s5'])  ? $campos['s5']  :''?>";
        if($s5 != ""){
            departamento.setAttribute('Required','');
            departamento.classList.add('is-invalid');
        }else if("<?php echo isset($campos)?>" != ""){
            departamento.classList.remove('is-invalid');
            departamento.classList.add('is-valid');
        }
    }

}, 1000);
   


  
</script>