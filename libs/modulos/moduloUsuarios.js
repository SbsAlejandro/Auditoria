/* -------------- Modulo Usuario ------------------ */
/*----------------- Listar Usuarios -------------*/
$(document).ready(function () {
  $("#tablaUsuario").DataTable({
    order: [[0, "DESC"]],
    procesing: true,
    serverSide: true,
    ajax: "index.php?page=listarUsuarios",
    pageLength: 4,
    createdRow: function (row, data, dataIndex) {
      if (data[6] == 0) {
        $(row).addClass("table-danger");
      } else {
        //$(row).addClass('table-success');
      }
    },
    columnDefs: [
      {
        orderable: false,
        targets: 5,
        render: function (data, type, row, meta) {
          if (row[6] == 1) {
            let botones =
              `
                    <button type="button" class="btn btn-primary btn-sm" onclick="verUsuario(` +
              row[0] +
              `)"><i class="fas fa-eye"></i></button>&nbsp;
    
                   <button type="button" class="btn btn-warning btn-sm"  onclick="listarActualizacionUsuario(` +
              row[0] +
              `)"><i class="fas fa-edit"></i></button>&nbsp;
    
                   <button type="button" class="btn btn-danger btn-sm" onclick="inactivarUsuario(` +
              row[0] +
              `)"><i class="fas fa-trash"></i></button>  `;
            return botones;
          } else {
            let botones =
              `
                <button type="button" class="btn btn-primary btn-sm" onclick="verUsuario(` +
              row[0] +
              `)"><i class="fas fa-eye"></i></button>&nbsp;

               <button type="button" class="btn btn-warning btn-sm"  onclick="listarActualizacionUsuario(` +
              row[0] +
              `)"><i class="fas fa-edit"></i></button>&nbsp;

               <button type="button" class="btn btn-success btn-sm" onclick="inactivarUsuario(` +
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

/* -------------- Agregar Usuario ------------------ */
$("#formRegistrarUsuario")
  .unbind("submit")
  .bind("submit", function (e) {
    e.preventDefault();

    let usuario = document.getElementById("usuario").value;
    let correo = document.getElementById("correo").value;
    let contrasena = document.getElementById("contrasena").value;
    let confirmar_contrasena = document.getElementById(
      "confirmar_contrasena"
    ).value;
    let rol = document.getElementById("rol").value;
    let estatus = document.getElementById("estatus").value;

    /* comprobar campos vacios */
    if (
      usuario == "" ||
      correo == "" ||
      contrasena == "" ||
      confirmar_contrasena == "" ||
      estatus == ""
    ) {
      Swal.fire({
        icon: "error",
        title: "Atención",
        text: "Todos los campos son obligatorios",
        confirmButtonColor: "#3085d6",
      });
      return;
    }

    if (contrasena != confirmar_contrasena) {
      Swal.fire({
        icon: "error",
        title: "Atención",
        text: "Las contraseñas no coinciden.",
        confirmButtonColor: "#3085d6",
      });
      return;
    }

    $.ajax({
      url: "index.php?page=registrarUsuario",
      type: "POST",
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {
        //btnSaveLoad();
      },
      success: function (response) {
        var respuesta = JSON.parse(response);

        if (respuesta.data.success == true) {
          Swal.fire({
            icon: "success",
            confirmButtonColor: "#3085d6",
            title: respuesta.data.message,
            text: respuesta.data.info,
          });

          // Recargar la tabla de usuarios
          $("#tablaUsuario").DataTable().ajax.reload();

          // Restablecer el formulario y cerrar el modal
          document.getElementById("formRegistrarUsuario").reset();
          $("#agregarUsuarioModal").modal("hide"); // Cierra el modal
        } else {
          Swal.fire({
            icon: "warning",
            confirmButtonColor: "#3085d6",
            title: respuesta.data.message,
            text: respuesta.data.info,
          });
        }
      },
    });
  });

/* -------------- Ver Usuario ------------------ */
function verUsuario(id) {
  $.ajax({
    url: "index.php?page=verUsuario",
    type: "POST",
    dataType: "json",
    data: { id_usuario: id },
  })
    .done(function (response) {
      if (response && response.data && response.data.success) {
        // Rellenar los datos del modal
        $("#usuario_usuario").text("Usuario: " + response.data.usuario);
        $("#correo_usuario").text("Correo: " + response.data.correo);
        $("#fecha_usuario").text("Fecha: " + response.data.fecha);
        if (response.data.estatus == 1) {
          document.getElementById("estatus_usuario").innerHTML =
            "Estado: <button class='btn btn-success'>Activo</button>";
        } else {
          document.getElementById("estatus_usuario").innerHTML =
            "Estado: <button class='btn btn-danger'>inactivo</button>";
        }

        // Cargar la foto del usuario
        const ruta_img = response.data.foto
          ? "foto_usuario/" + response.data.foto
          : "default.jpg";
        $("#foto_usuario").attr("src", ruta_img);

        // Mostrar el modal
        $("#modalVisualizarUsuario").modal("show");
      } else {
        console.error("La respuesta no contiene datos válidos");
        alert(
          "No se pudieron cargar los datos del usuario. Intente nuevamente."
        );
      }
    })
    .fail(function () {
      console.error("Error en la solicitud AJAX");
      alert("Hubo un error al obtener los datos del usuario.");
    });
}

/* --------------listarActualizacionInventarioCon------------------ */
function listarActualizacionUsuario(id) {
  let id_usuario = id;

  let id_usuario_update = document.getElementById("id_usuario_update").value;
  let usuario = document.getElementById("usuario_update").value;
  let correo = document.getElementById("correo_update").value;
  let contrasena = document.getElementById("contrasena_update").value;
  let estatus = document.getElementById("estatus_update").value;
  let input_id_usuario = document.getElementById("id_usuario");

  let listar = "listar";

  $.ajax({
    url: "index.php?page=verUsuario",
    type: "post",
    dataType: "json",
    data: {
      id_usuario: id_usuario,
    },
  })
    .done(function (response) {
      if (response.data.success == true) {
        document.getElementById("id_usuario_update").value = response.data.id;
        document.getElementById("usuario_update").value = response.data.usuario;
        document.getElementById("correo_update").value = response.data.correo;
        document.getElementById("estatus_update").value = response.data.estatus;
        document.getElementById("rol_update").value = response.data.rol;
        document
          .getElementById("img_update_preview")
          .setAttribute("src", "foto_usuario/" + response.data.foto);

        $("#modalActualizarUsuario").modal("show");
      } else {
      }
    })
    .fail(function () {
      console.log("error");
    });
}
$(document).ready(function () {
  $("#check_foto").change(function () {
    if ($(this).is(":checked")) {
      console.log("El checkbox ha sido seleccionado");
      document.getElementById("cont_input_file").removeAttribute("style");
      // Agrega aquí el código que deseas ejecutar cuando el checkbox es seleccionado
    } else {
      //console.log("El checkbox ha sido deseleccionado");
      document
        .getElementById("cont_input_file")
        .setAttribute("style", "display:none;");
      // Agrega aquí el código que deseas ejecutar cuando el checkbox es deseleccionado
    }
  });
});

$("#check_foto").is(":checked");
/* -------------- Modificar Usuario ------------------ */

$(document).ready(function () {
  // Mostrar u ocultar el campo de archivo si el checkbox está marcado
  $("#check_foto").change(function () {
    if ($(this).is(":checked")) {
      $("#cont_input_file").show();
    } else {
      $("#cont_input_file").hide();
    }
  });

  // Manejo del formulario de actualización de usuario
  $("#formActualizarUsuario")
    .unbind("submit")
    .bind("submit", function (e) {
      e.preventDefault();

      const usuario = $("#usuario_update").val().trim();
      const correo = $("#correo_update").val().trim();
      const contrasena = $("#contrasena_update").val().trim();
      const confirmar_contrasena_update = $("#confirmar_contrasena_update")
        .val()
        .trim();
      const rol_update = $("#rol_update").val();
      const estatus = $("#estatus_update").val();

      // Validación de campos vacíos
      if (!usuario || !correo || !contrasena || !rol_update || !estatus) {
        Swal.fire({
          icon: "error",
          title: "Atención",
          text: "Todos los campos son obligatorios",
          confirmButtonColor: "#3085d6",
        });
        return;
      }

      // Validación de formato de correo electrónico
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(correo)) {
        Swal.fire({
          icon: "error",
          title: "Atención",
          text: "Por favor, ingresa un correo electrónico válido.",
          confirmButtonColor: "#3085d6",
        });
        return;
      }

      // Validación de coincidencia de contraseñas
      if (contrasena !== confirmar_contrasena_update) {
        Swal.fire({
          icon: "error",
          title: "Atención",
          text: "Las contraseñas no coinciden.",
          confirmButtonColor: "#3085d6",
        });
        return;
      }

      // Enviar la solicitud AJAX
      $.ajax({
        url: "index.php?page=modificarUsuario",
        type: "POST",
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
          // Muestra una carga si es necesario
        },
        success: function (response) {
          const respuesta = JSON.parse(response);

          if (respuesta.data.success) {
            Swal.fire({
              icon: "success",
              confirmButtonColor: "#3085d6",
              title: respuesta.data.message,
              text: respuesta.data.info,
            });

            // Reiniciar el formulario y cerrar el modal
            $("#formActualizarUsuario")[0].reset();
            $("#modalActualizarUsuario").modal("hide");

            // Recargar la tabla de usuarios
            $("#tablaUsuario").DataTable().ajax.reload();
          } else {
            Swal.fire({
              icon: "error",
              confirmButtonColor: "#3085d6",
              title: respuesta.data.message,
              text: respuesta.data.info,
            });
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrió un error al procesar la solicitud.",
            confirmButtonColor: "#3085d6",
          });
        },
      });
    });
});
/* -------------- Activar e Inactivar Usuario ------------------ */
function inactivarUsuario(id) {
  var id_usuario = id;

  Swal.fire({
    title: "¿Está seguro de moficar el estado del usuario?",
    // text: "El paciente sera dado de alta y el registro quedara guardado en la traza.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "index.php?page=inactivarUsuario",
        type: "post",
        dataType: "json",
        data: {
          id_usuario: id_usuario,
        },
      })
        .done(function (response) {
          if (response.data.success == true) {
            $("#tablaUsuario").DataTable().ajax.reload();
          } else {
            Swal.fire({
              icon: "error",
              title: response.data.message,
              confirmButtonColor: "#0d6efd",
              text: response.data.info,
            });
          }
        })
        .fail(function () {
          console.log("error");
        });
    }
  });
}
