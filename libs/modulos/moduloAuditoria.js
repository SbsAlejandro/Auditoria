/* Multi Step Crear Auditoria */
function nextStep(currentStep) {
  document.getElementById(`step${currentStep}`).style.display = "none";
  document
    .getElementById(`progressStep${currentStep}`)
    .classList.remove("active");
  const nextStep = currentStep + 1;
  document.getElementById(`step${nextStep}`).style.display = "block";
  document.getElementById(`progressStep${nextStep}`).classList.add("active");
}

function prevStep(currentStep) {
  document.getElementById(`step${currentStep}`).style.display = "none";
  document
    .getElementById(`progressStep${currentStep}`)
    .classList.remove("active");
  const prevStep = currentStep - 1;
  document.getElementById(`step${prevStep}`).style.display = "block";
  document.getElementById(`progressStep${prevStep}`).classList.add("active");
}
/* Campo Vehiculo */
function mostrarCamposVehiculo(mostrar) {
  const camposVehiculo = document.getElementById("camposVehiculo");
  camposVehiculo.style.display = mostrar ? "block" : "none";
}

// Función para mostrar u ocultar los campos de acuerdo al tipo de propiedad seleccionado
function mostrarCampoTipo() {
  const edificio = document.getElementById("edificio").checked;
  const casa = document.getElementById("casa").checked;
  const quinta = document.getElementById("quinta").checked;

  const campoPiso = document.getElementById("campoPiso");
  const campoDepartamento = document.getElementById("campoDepartamento");

  // Mostrar u ocultar el campo de Piso si es Edificio
  if (edificio) {
    campoPiso.style.display = "block";
    campoDepartamento.style.display = "none";
  }
  // Mostrar u ocultar el campo de N° Departamento si es Casa o Quinta
  else if (casa || quinta) {
    campoDepartamento.style.display = "block";
    campoPiso.style.display = "none";
  }
  // Si no hay selección, ocultar ambos campos
  else {
    campoPiso.style.display = "none";
    campoDepartamento.style.display = "none";
  }
}
/*  mostrarFechaVencimiento */
function mostrarFechaVencimiento(mostrar) {
  const campoVencimiento = document.getElementById("campoVencimiento");
  if (mostrar) {
    campoVencimiento.style.display = "block";
  } else {
    campoVencimiento.style.display = "none";
  }
}

/*Estudia Actualmente  */
function mostrarCamposEstudio(estaEstudiando) {
  const campos = document.getElementById("camposEstudio");
  if (estaEstudiando) {
    campos.style.display = "block"; // Muestra los campos adicionales
  } else {
    campos.style.display = "none"; // Oculta los campos adicionales
    // Limpia los campos adicionales
    document.getElementById("institucion").value = "";
    document.getElementById("carrera").value = "";
    document.getElementById("especialidad").value = "";
    document.getElementById("horario").value = "";
  }
}
/* Posgrado */
function mostrarTipoPosgrado(mostrar) {
  const tipoPosgradoDiv = document.getElementById("tipoposgrado");
  const detallePosgradoDiv = document.getElementById("especificacion");
  tipoPosgradoDiv.style.display = mostrar ? "block" : "none";
  if (!mostrar) {
    detallePosgradoDiv.style.display = "none";
  }
}
/* MOSTRAR ESPECIFICACION */
function mostrarDetallePosgrado(valor) {
  const detallePosgradoDiv = document.getElementById("especificacion");
  detallePosgradoDiv.style.display = valor ? "block" : "none";
}
/* MOSTRAR GUARDIA */
function mostrarOpcionesGuardia(mostrar) {
  const opcionesGuardiaDiv = document.getElementById("opcionesGuardia");
  opcionesGuardiaDiv.style.display = mostrar ? "block" : "none";
}

// Función que muestra u oculta las habilidades e información adicional
function mostrarHabilidades() {
  var idioma = document.getElementById("idioma").value;
  var habilidadesDiv = document.getElementById("habilidadesidioma");
  var calificacionDiv = document.getElementById("calificacionhabilidad");

  // Si se selecciona un idioma, mostrar las opciones de habilidades
  if (idioma) {
    habilidadesDiv.style.display = "block";
  } else {
    habilidadesDiv.style.display = "none";
    calificacionDiv.style.display = "none"; // Ocultar calificación si no se selecciona idioma
  }

  // Agregar evento para mostrar la calificación solo si se selecciona al menos una habilidad
  var habilidadesSeleccionadas = document.querySelectorAll(
    'input[type="checkbox"]:checked'
  );
  if (habilidadesSeleccionadas.length > 0) {
    calificacionDiv.style.display = "block";
  } else {
    calificacionDiv.style.display = "none";
  }

  // Mostrar u ocultar la calificación cuando se seleccionen habilidades
  document.querySelectorAll('input[type="checkbox"]').forEach(function (input) {
    input.addEventListener("change", function () {
      if (
        document.querySelectorAll('input[type="checkbox"]:checked').length > 0
      ) {
        calificacionDiv.style.display = "block";
      } else {
        calificacionDiv.style.display = "none";
      }
    });
  });
}

// Función para mostrar u ocultar el campo de lugar de trabajo
// Función para mostrar u ocultar campos según selección
function mostrarOpcionesTrabajo(trabaja) {
  const campoDondeTrabaja = document.getElementById("campoDondeTrabaja");
  const contenedorDatos = document.getElementById("temporal_familiar");

  if (trabaja) {
    campoDondeTrabaja.style.display = "block"; // Muestra "¿Dónde trabaja?"
    contenedorDatos.style.display = "block"; // Muestra la tabla de datos
  } else {
    campoDondeTrabaja.style.display = "none"; // Oculta "¿Dónde trabaja?"
    contenedorDatos.style.display = "none"; // Oculta la tabla de datos
  }
}

// Función para mostrar u ocultar campos según selección
function mostrarOpcionesTrabajo(trabaja) {
  const campoDondeTrabaja = document.getElementById("campoDondeTrabaja");
  const columnaDonde = document.getElementById("columnaDonde");
  const filasTabla = document.querySelectorAll("#multiples_auditoria tbody tr");

  if (trabaja) {
    campoDondeTrabaja.style.display = "block"; // Muestra "¿Dónde trabaja?"
    columnaDonde.style.display = ""; // Muestra columna "Dónde"
    filasTabla.forEach((fila) => (fila.cells[7].style.display = "")); // Muestra celda "Dónde"
  } else {
    campoDondeTrabaja.style.display = "none"; // Oculta "¿Dónde trabaja?"
    columnaDonde.style.display = "none"; // Oculta columna "Dónde"
    filasTabla.forEach((fila) => (fila.cells[7].style.display = "none")); // Oculta celda "Dónde"
  }
}
/*-----------------Listar Auditoria-------------*/
$(document).ready(function () {
  $("#tablaAuditoria").DataTable({
    order: [[0, "DESC"]],
    procesing: true,
    serverSide: true,
    ajax: "index.php?page=listarAuditoria",
    pageLength: 4,
    createdRow: function (row, data, dataIndex) {
      if (data[4] == 0) {
        $(row).addClass("table-danger");
      } else {
        //$(row).addClass('table-success');
      }
    },
    columnDefs: [
      {
        orderable: false,
        targets: 3,
        render: function (data, type, row, meta) {
          if (row[4] == 1) {
            let botones =
              `
                          <button type="button" class="btn btn-primary btn-sm" onclick="verAuditoria(` +
              row[0] +
              `)"><i class="fas fa-eye"></i></button>&nbsp;
         
                         <button type="button" class="btn btn-warning btn-sm"  onclick="listarActualizacionAuditoria(` +
              row[0] +
              `)"><i class="fas fa-edit"></i></button>&nbsp;
         
                         <button type="button" class="btn btn-danger btn-sm" onclick="inactivarAuditoria(` +
              row[0] +
              `)"><i class="fas fa-trash"></i></button>  `;
            return botones;
          } else {
            let botones =
              `
                      <button type="button" class="btn btn-primary btn-sm" onclick="VerAuditoria(` +
              row[0] +
              `)"><i class="fas fa-eye"></i></button>&nbsp;
     
                     <button type="button" class="btn btn-warning btn-sm"  onclick="listarActualizacionAuditoria(` +
              row[0] +
              `)"><i class="fas fa-edit"></i></button>&nbsp;
     
                     <button type="button" class="btn btn-success btn-sm" onclick="inactivarAuditoria(` +
              row[0] +
              `)"><i class="fas fa-fas fa-retweet"></i></button>  `;
            return botones;
          }
        },
      },
    ],
    dom: "Bfrtip",
    language: {
      decimal: "",
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
      infoFiltered: "(Filtrado de _MAX_ total entradas)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Entradas",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscar:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Ultimo",
        next: "Siguiente",
        previous: "Anterior",
      },
    },
  });
});

/* -------------- Agregar Auditoria ------------------ */
var agregar_auditoria;
if ((agregar_auditoria = document.getElementById("agregar_auditoria"))) {
  agregar_auditoria.addEventListener("click", agregarAuditoria, false);

  function agregarAuditoria(e) {
    e.preventDefault();

    let nombre = document.getElementById("nombre").value;

    let estatus = document.getElementById("estatus").value;
    /* comprobar campos vacios */
    if (nombre == "" || estatus == "") {
      Swal.fire({
        icon: "error",
        title: "Campos vacíos",
        text: "Todos los campos son obligatorios",
        confirmButtonColor: "#3085d6",
      });
      return;
    }

    $.ajax({
      url: "index.php?page=registrarAuditoria",
      type: "post",
      dataType: "json",
      data: {
        nombre: nombre,
        estatus: estatus,
      },
    })
      .done(function (response) {
        if (response.data.success == true) {
          $("#modalAgregarAuditoria").modal("hide");

          Swal.fire({
            icon: "success",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });

          $("#tablaAuditoria").DataTable().ajax.reload();
        } else {
          Swal.fire({
            icon: "error",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });
        }
      })
      .fail(function () {
        console.log("error");
      });
  }
}

// Variable para el botón "Agregar Auditoria"
var agregarauditoria;
if ((agregarauditoria = document.getElementById("agregarAuditoria"))) {
  agregarauditoria.addEventListener("click", agregarAuditoria, false);

  function agregarAuditoria() {
    // Llamamos al loader para que se muestre en pantalla
    document.getElementById("cont-loader").removeAttribute("style");

    // Recolectamos los valores de cada input por su id correspondiente
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let cedula = document.getElementById("cedula").value;
    let parentesco = document.getElementById("parentesco").value;
    let fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    let sexo = document.querySelector('input[name="sexo"]:checked')
      ? document.querySelector('input[name="sexo"]:checked').value
      : "";
    let trabaja = document.querySelector('input[name="trabaja"]:checked')
      ? document.querySelector('input[name="trabaja"]:checked').value
      : "";
    let dondeTrabaja = document.getElementById("dondeTrabaja").value;

    // Comprobamos si los campos están vacíos
    /*     if (
      nombre === "" ||
      apellido === "" ||
      cedula === "" ||
      parentesco === "" ||
      fecha_nacimiento === "" ||
      sexo === ""
    ) {
      document
        .getElementById("cont-loader")
        .setAttribute("style", "display:none;");
      Swal.fire({
        icon: "error",
        title: "Campos vacíos",
        text: "Todos los campos son obligatorios.",
        confirmButtonColor: "#3085d6",
      });
      return;
    } */

    // Realizamos la llamada AJAX para guardar el prestario temporal
    $.ajax({
      url: "index.php?page=registrarAuditoriatemporales",
      type: "post",
      dataType: "json",
      data: {
        nombre: nombre,
        apellido: apellido,
        cedula: cedula,
        parentesco: parentesco,
        fecha_nacimiento: fecha_nacimiento,
        sexo: sexo,
        trabaja: trabaja,
        dondeTrabaja: dondeTrabaja,
      },
    })
      .done(function (response) {
        if (response.data.success == true) {
          document
            .getElementById("cont-loader")
            .setAttribute("style", "display:none;");
          Swal.fire({
            icon: "success",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });

          // Contador para los elementos añadidos
          let contador =
            document.querySelectorAll("#multiples_auditoria tbody tr").length +
            1;

          // Mostramos el contenedor de datos
          document.getElementById("temporal_familiar").removeAttribute("style");

          // Creamos el ID dinámico para los elementos
          let id_contenedor = "contenedor_" + contador;
          let id_accion = "id_accion_" + contador;
          let id_nombre = "id_nombre_" + contador;
          let id_apellido = "id_apellido_" + contador;
          let id_cedula = "id_cedula_" + contador;
          let id_parentesco = "id_parentesco_" + contador;
          let id_fecha = "id_fecha_" + contador;
          let id_sexo = "id_sexo_" + contador;
          let id_trabaja = "id_trabaja_" + contador;
          let id_donde = "id_donde_" + contador;

          // Creamos el contenedor de la fila
          var cont_elemento = document.createElement("tr");
          cont_elemento.setAttribute("id", id_contenedor);
          document
            .getElementById("multiples_auditoria")
            .appendChild(cont_elemento);

          // Creamos y añadimos las celdas para cada dato
          var td_nombre = document.createElement("td");
          td_nombre.setAttribute("id", id_nombre);
          td_nombre.innerHTML = nombre;
          cont_elemento.appendChild(td_nombre);

          var td_apellido = document.createElement("td");
          td_apellido.setAttribute("id", id_apellido);
          td_apellido.innerHTML = apellido;
          cont_elemento.appendChild(td_apellido);

          var td_cedula = document.createElement("td");
          td_cedula.setAttribute("id", id_cedula);
          td_cedula.innerHTML = cedula;
          cont_elemento.appendChild(td_cedula);

          var td_parentesco = document.createElement("td");
          td_parentesco.setAttribute("id", id_parentesco);
          td_parentesco.innerHTML = parentesco;
          cont_elemento.appendChild(td_parentesco);

          var td_fecha = document.createElement("td");
          td_fecha.setAttribute("id", id_fecha);
          td_fecha.innerHTML = fechaNacimiento;
          cont_elemento.appendChild(td_fecha);

          var td_sexo = document.createElement("td");
          td_sexo.setAttribute("id", id_sexo);
          td_sexo.innerHTML = sexo === "M" ? "Masculino" : "Femenino";
          cont_elemento.appendChild(td_sexo);

          var td_trabaja = document.createElement("td");
          td_trabaja.setAttribute("id", id_trabaja);
          td_trabaja.innerHTML = trabaja === "si" ? "Sí" : "No";
          cont_elemento.appendChild(td_trabaja);

          var td_donde = document.createElement("td");
          td_donde.setAttribute("id", id_donde);
          td_donde.innerHTML = trabaja === "si" ? dondeTrabaja : "N/A";
          cont_elemento.appendChild(td_donde);

          // Añadimos la acción de eliminar
          var td_accion_borrar = document.createElement("td");
          td_accion_borrar.setAttribute("id", id_accion);
          cont_elemento.appendChild(td_accion_borrar);

          var btn_delete = document.createElement("button");
          btn_delete.setAttribute("class", "btn btn-danger btn-sm");
          btn_delete.setAttribute("title", "Eliminar");
          btn_delete.setAttribute("type", "button");
          btn_delete.setAttribute(
            "onclick",
            "eliminarPrestarioTemporal('" + id_contenedor + "')"
          );
          btn_delete.innerHTML = "<i class='fas fa-trash'></i>";
          td_accion_borrar.appendChild(btn_delete);
        } else {
          document
            .getElementById("cont-loader")
            .setAttribute("style", "display:none;");
          Swal.fire({
            icon: "error",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });
        }
      })
      .fail(function () {
        document
          .getElementById("cont-loader")
          .setAttribute("style", "display:none;");
        console.log("Error en la solicitud");
      });
  }
}
