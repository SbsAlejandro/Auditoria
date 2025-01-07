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
    calificacionDiv.style.display = "none";
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
    campoDondeTrabaja.style.display = "block";
    contenedorDatos.style.display = "block";
  } else {
    campoDondeTrabaja.style.display = "none";
    contenedorDatos.style.display = "none";
  }
}

// Función para mostrar u ocultar campos según selección
function mostrarOpcionesTrabajo(trabaja) {
  const campoDondeTrabaja = document.getElementById("campoDondeTrabaja");
  const columnaDonde = document.getElementById("columnaDonde");
  const filasTabla = document.querySelectorAll("#multiples_auditoria tbody tr");

  if (trabaja) {
    campoDondeTrabaja.style.display = "block";
    columnaDonde.style.display = "";
    filasTabla.forEach((fila) => (fila.cells[7].style.display = ""));
  } else {
    campoDondeTrabaja.style.display = "none";
    columnaDonde.style.display = "none";
    filasTabla.forEach((fila) => (fila.cells[7].style.display = "none"));
  }
}

/*-----------------Listar Auditoria-------------*/
$(document).ready(function () {
  $("#tablaAuditoria").DataTable({
    order: [[0, "DESC"]],
    processing: false,
    serverSide: true,
    ajax: "index.php?page=listarAuditoria",
    pageLength: 4,
    createdRow: function (row, data, dataIndex) {
      // Puedes agregar lógica adicional aquí si es necesario
    },
    columnDefs: [
      {
        orderable: false,
        targets: 6,
        render: function (data, type, row, meta) {
          let botones = `
            <a class="btn btn-primary btn-sm" title="Ver jornada" href="?page=verAuditoria&id=${row[0]}">
              <i class="fas fa-eye"></i>
            </a>
            &nbsp;
            <button type="button" class="btn btn-warning btn-sm" onclick="listarActualizacionAuditoria(${row[0]})">
              <i class="fas fa-edit"></i>
            </button>
          `;
          return botones;
        },
      },
    ],
    dom: "Bfrtip",
    language: {
      decimal: "",
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      infoEmpty: "Mostrando 0 a 0 de 0 Entradas",
      infoFiltered: "(Filtrado de _MAX_ total entradas)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Entradas",
      loadingRecords: "Cargando...",
      search: "Buscar:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Último",
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

    // Obtener los valores de los campos del formulario
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let cedula = document.getElementById("cedula").value;
    let sexo = document.getElementById("sexo").value;
    let fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    let parentesco = document.getElementById("parentesco").value;
    let nombrefamiliar = document.getElementById("nombrefamiliar").value;
    let apellidofamiliar = document.getElementById("apellidofamiliar").value;
    let cedulafamiliar = document.getElementById("cedulafamiliar").value;
    let trabajafamiliar = document.getElementById("trabajafamiliar").value;
    let dondetrabajafamiliar = document.getElementById(
      "dondetrabajafamiliar"
    ).value;

    // Validar campos obligatorios
    if (
      nombre == "" ||
      apellido == "" ||
      cedula == "" ||
      sexo == "" ||
      fecha_nacimiento == "" ||
      parentesco == ""
    ) {
      /*  Swal.fire({
        icon: "error",
        title: "Campos vacíos",
        text: "Todos los campos obligatorios deben ser completados.",
        confirmButtonColor: "#3085d6",
      }); */
      return;
    }

    // Realizar la solicitud AJAX
    $.ajax({
      url: "index.php?page=registrarAuditoria", // Asegúrate de que esta URL sea correcta
      type: "POST",
      dataType: "json",
      data: {
        nombre: nombre,
        apellido: apellido,
        cedula: cedula,
        sexo: sexo,
        fecha_nacimiento: fecha_nacimiento,
        parentesco: parentesco,
        nombrefamiliar: nombrefamiliar,
        apellidofamiliar: apellidofamiliar,
        cedulafamiliar: cedulafamiliar,
        trabajafamiliar: trabajafamiliar,
        dondetrabajafamiliar: dondetrabajafamiliar,
      },
      success: function (response) {
        if (response.data.success) {
          // Cerrar el modal y mostrar mensaje de éxito
          $("#modalAgregarAuditoria").modal("hide");

          /*        Swal.fire({
            icon: "success",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          }); */

          // Recargar la tabla o realizar cualquier acción necesaria
          $("#tablaAuditoria").DataTable().ajax.reload();
        } else {
          // Mostrar mensaje de error
          Swal.fire({
            icon: "error",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });
        }
      },
      error: function () {
        // Mostrar mensaje de error si falla la solicitud AJAX
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Hubo un problema al enviar la solicitud.",
          confirmButtonColor: "#3085d6",
        });
      },
    });
  }
}

// Variable para el botón "Agregar Auditoría"
var agregarAuditoria;
if ((agregarAuditoria = document.getElementById("agregarAuditoria"))) {
  agregarAuditoria.addEventListener("click", agregarAuditoriaHandler, false);

  function agregarAuditoriaHandler() {
    document.getElementById("cont-loader").removeAttribute("style");

    // Recolectar valores de los campos del formulario
    let nombrefamiliar = document.getElementById("nombrefamiliar").value;
    let apellidofamiliar = document.getElementById("apellidofamiliar").value;
    let cedulafamiliar = document.getElementById("cedulafamiliar").value;
    let parentesco = document.getElementById("parentesco").value;
    let fecha_nacimiento_familiar = document.getElementById(
      "fecha_nacimiento_familiar"
    ).value;
    let sexofamiliar = document.getElementById("sexofamiliar").value;
    let trabajafamiliar = document.getElementById("trabajafamiliar").value;
    let dondetrabajafamiliar = document.getElementById(
      "dondetrabajafamiliar"
    ).value;

    // Verificar si algún campo está vacío
    if (
      nombrefamiliar === "" ||
      apellidofamiliar === "" ||
      cedulafamiliar === "" ||
      parentesco === "" ||
      fecha_nacimiento_familiar === "" ||
      sexofamiliar === "" ||
      trabajafamiliar === ""
    ) {
      document
        .getElementById("cont-loader")
        .setAttribute("style", "display:none;");
      createAlert(
        "danger",
        "Verificar que todos los campos estén llenos a la hora de registrar un familiar.",
        "alertModalCrearAuditoria"
      );
      return;
    }

    $.ajax({
      url: "index.php?page=registrarAuditoriaTemporal",
      type: "post",
      dataType: "json",
      data: {
        nombrefamiliar: nombrefamiliar,
        apellidofamiliar: apellidofamiliar,
        cedulafamiliar: cedulafamiliar,
        parentesco: parentesco,
        fecha_nacimiento_familiar: fecha_nacimiento_familiar,
        sexofamiliar: sexofamiliar,
        trabajafamiliar: trabajafamiliar,
        dondetrabajafamiliar: dondetrabajafamiliar,
      },
    })
      .done(function (response) {
        document
          .getElementById("cont-loader")
          .setAttribute("style", "display:none;");
        if (response.data.success === true) {
          let contador = response.data.contador || 1;
          let id_contenedor = "contenedor_" + contador;

          var cont_elemento = document.createElement("tr");
          cont_elemento.setAttribute("id", id_contenedor);
          cont_elemento.setAttribute(
            "style",
            "border: solid 1px #ccc; padding: 10px;"
          );
          document
            .getElementById("multiples_familiar")
            .appendChild(cont_elemento);

          [
            "nombrefamiliar",
            "apellidofamiliar",
            "cedulafamiliar",
            "parentesco",
            "fecha_nacimiento_familiar",
            "sexofamiliar",
            "trabajafamiliar",
            "dondetrabajafamiliar",
          ].forEach((campo) => {
            var td_campo = document.createElement("td");
            td_campo.setAttribute("class", campo);
            td_campo.setAttribute(
              "style",
              "border: solid 1px #ccc; padding: 10px;"
            );
            td_campo.innerHTML = response.data[campo];
            cont_elemento.appendChild(td_campo);
          });

          // Crear botón de eliminar con icono
          var td_accion_borrar = document.createElement("td");
          td_accion_borrar.setAttribute(
            "style",
            "border: solid 1px #ccc; text-align: center; padding: 10px;"
          );

          var btn_delete = document.createElement("button");
          btn_delete.setAttribute("class", "btn btn-danger btn-sm");
          btn_delete.setAttribute("title", "Remover");
          btn_delete.setAttribute("type", "button");
          btn_delete.setAttribute(
            "onclick",
            "eliminarAuditoriaTemporal(" + response.data.id_auditoria + ")"
          );
          btn_delete.setAttribute("style", "background:#dc3545; color: #FFF;");

          var icono_btn_delete = document.createElement("i");
          icono_btn_delete.setAttribute("class", "fas fa-trash");
          btn_delete.appendChild(icono_btn_delete);

          td_accion_borrar.appendChild(btn_delete);
          cont_elemento.appendChild(td_accion_borrar);
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
        document
          .getElementById("cont-loader")
          .setAttribute("style", "display:none;");
        console.error("Error en la solicitud AJAX");
      });
    function showBootstrapAlert(type, message) {
      // Create alert container
      const alertDiv = document.createElement("div");
      alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
      alertDiv.role = "alert";

      createAlert(
        "danger",
        "El campo tasa bcv esta en blanco",
        "alertModalCrearAuditoria"
      );

      return;
    }

    createAlert(
      "success",
      "El registro fue Guardado exitosamente",
      "alertModalCrearAuditoria"
    );

    document.getElementById("agregarAuditoria").removeAttribute("disabled");
    document.getElementById("agregarAuditoria").value = "";
  }
}

function eliminarAuditoriaTemporal(id) {
  console.log("ID de auditoría: " + id);

  $.ajax({
    url: "index.php?page=eliminarAuditoriaTemporal",
    type: "POST",
    dataType: "json",
    data: {
      id_auditoria: id,
    },
    success: function (response) {
      if (response.data.success === true) {
        // Eliminar la fila de la tabla
        var row = document.getElementById("contenedor_" + id);
        if (row) row.remove();

        // Mostrar un mensaje de éxito
        alert("Auditoría eliminada exitosamente.");
      } else {
        alert(response.data.message);
      }
    },
    error: function () {
      alert("Error al intentar eliminar la auditoría.");
    },
  });
}
