function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}

// La siguiente funcion valida el elemento input
function validarNombre() {
  // Variable que usaremos para determinar si el input es valido
  let isValid = false;

  // El input que queremos validar
  const input = document.forms['signup-form']['nombre'];

  //El div con el mensaje de advertencia:
  const message = document.getElementById('message');

  input.willValidate = false;

  // El tamaño maximo para nuestro input
  const maximo = 35;

  // El pattern que vamos a comprobar
  const pattern = new RegExp('^[A-Z]+$', 'i');

  // Primera validacion, si input esta vacio entonces no es valido
  if(!input.value) {
    isValid = false;
  } else {
    // Segunda validacion, si input es mayor que 35
    if(input.value.length > maximo) {
      isValid = false;
    } else {
      // Tercera validacion, si input contiene caracteres diferentes a los permitidos
      if(!pattern.test(input.value)){ 
      // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
      // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
        isValid = false;
      } else {
        // Si pasamos todas la validaciones anteriores, entonces el input es valido
        isValid = true;
      }
    }
  }

  //Ahora coloreamos el borde de nuestro input
  if(!isValid) {
    // rojo: no es valido
    input.style.borderColor = 'red'; 
    // mostramos mensaje
    message.hidden = false;
  } else {
    // verde: si es valido
    input.style.borderColor = 'palegreen'; // 'palegreen' se ve mejor que 'green' en mi opinion
    // ocultamos mensaje;
    message.hidden = true;
  }

  // devolvemos el valor de isValid
  return isValid;
}

// Por último, nuestra función que verifica si el campo es válido antes de realizar cualquier otra acción.
function verificar() {
  const valido = validarNombre();
  if (!valido) {
    alert('El campo no es válido.');
  } else {
    alert('El campo es válido');
  }
}


function validarApellido() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
    
      // El input que queremos validar
      const input = document.forms['signup-form']['apellido'];
    
      //El div con el mensaje de advertencia:
      const message = document.getElementById('message');
    
      input.willValidate = false;
    
      // El tamaño maximo para nuestro input
      const maximo = 35;
    
      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z]+$', 'i');
    
      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
        // Segunda validacion, si input es mayor que 35
        if(input.value.length > maximo) {
          isValid = false;
        } else {
          // Tercera validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){ 
          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }
      }
    
      //Ahora coloreamos el borde de nuestro input
      if(!isValid) {
        // rojo: no es valido
        input.style.borderColor = 'red'; // 
        // mostramos mensaje
        message2.hidden = false;
      } else {
        // verde: si es valido
        input.style.borderColor = 'palegreen'; // 'palegreen' se ve mejor que 'green' en mi opinion
        // ocultamos mensaje;
        message2.hidden = true;
      }
    
      // devolvemos el valor de isValid
      return isValid;
    }
    
    // Por último, nuestra función que verifica si el campo es válido antes de realizar cualquier otra acción.
    function verificarApe() {
      const valido = validarApellido();
      if (!valido) {
        alert('El campo no es válido.');
      } else {
        alert('El campo es válido');
      }
    }
