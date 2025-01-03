/*-----------------Listar Roles-------------*/
$(document).ready(function () {
  $("#tablaRoles").DataTable({
    order: [[0, "DESC"]],
    procesing: true,
    serverSide: true,
    ajax: "index.php?page=listarRoles",
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
                        <button type="button" class="btn btn-primary btn-sm" onclick="verRoles(` +
              row[0] +
              `)"><i class="fas fa-eye"></i></button>&nbsp;
       
                       <button type="button" class="btn btn-warning btn-sm"  onclick="listarActualizacionRoles(` +
              row[0] +
              `)"><i class="fas fa-edit"></i></button>&nbsp;
       
                       <button type="button" class="btn btn-danger btn-sm" onclick="inactivarRoles(` +
              row[0] +
              `)"><i class="fas fa-trash"></i></button>  `;
            return botones;
          } else {
            let botones =
              `
                    <button type="button" class="btn btn-primary btn-sm" onclick="VerRoles(` +
              row[0] +
              `)"><i class="fas fa-eye"></i></button>&nbsp;
   
                   <button type="button" class="btn btn-warning btn-sm"  onclick="listarActualizacionRoles(` +
              row[0] +
              `)"><i class="fas fa-edit"></i></button>&nbsp;
   
                   <button type="button" class="btn btn-success btn-sm" onclick="inactivarRoles(` +
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

/* -------------- Agregar Roles------------------ */
// var agregar_roles;
var agregar_roles;
if ((agregar_roles = document.getElementById("agregar_roles"))) {
  agregar_roles.addEventListener("click", agregarRoles, false);
  function agregarRoles(e) {
    e.preventDefault();
    let rol = document.getElementById("rol").value;

    let estatus = document.getElementById("estatus").value;
    /* comprobar campos vacios */
    if (rol == "" || estatus == "") {
      Swal.fire({
        icon: "error",
        title: "Campos vacíos",
        text: "Todos los campos son obligatorios",
        confirmButtonColor: "#3085d6",
      });
      return;
    }

    $.ajax({
      url: "index.php?page=registrarRoles",
      type: "post",
      dataType: "json",
      data: {
        rol: rol,

        estatus: estatus,
      },
    })
      .done(function (response) {
        if (response.data.success == true) {
          document.getElementById("formRegistrarRoles").reset();

          $("#modalAgregarRoles").modal("hide");

          Swal.fire({
            icon: "success",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });

          $("#tablaRoles").DataTable().ajax.reload();
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

/* -------------- Ver roles ------------------ */
function verRoles(id) {
  let id_roles = id;

  $.ajax({
    url: "index.php?page=verRoles",
    type: "post",
    dataType: "json",
    data: {
      id_roles: id_roles,
    },
  })
    .done(function (response) {
      if (response.data.success == true) {
        document.getElementById("rol_roles").innerHTML =
          "Nombre: " + response.data.rol;

        document.getElementById("fecha_roles").innerHTML =
          "Fecha: " + response.data.fecha;

        if (response.data.estatus == 1) {
          document.getElementById("estatus_roles").innerHTML =
            "Estado: <button class='btn btn-success'>Activo</button>";
        } else {
          document.getElementById("estatus_roles").innerHTML =
            "Estado: <button class='btn btn-danger'>inactivo</button>";
        }

        $("#modalVisualizarRoles").modal("show");
      } else {
      }
    })
    .fail(function () {
      console.log("error");
    });
}

/* -------------- Modificar Roles ------------------ */
var modificar_roles;
if ((modificar_roles = document.getElementById("modificar_roles"))) {
  modificar_roles.addEventListener("click", modificarRoles, false);

  function modificarRoles(e) {
    e.preventDefault();

    let id_roles = document.getElementById("id_roles_update").value;

    let rol = document.getElementById("rol_update").value;

    let estatus = document.getElementById("estatus_update").value;

    /* comprobar campos vacios */
    if (rol == "" || estatus == "") {
      Swal.fire({
        icon: "error",
        title: "Campos vacíos",
        text: "Todos los campos son obligatorios",
        confirmButtonColor: "#3085d6",
      });
      return;
    }
    $.ajax({
      url: "index.php?page=modificarRoles",
      type: "post",
      dataType: "json",
      data: {
        id_roles: id_roles,
        rol: rol,
        estatus: estatus,
      },
    })
      .done(function (response) {
        if (response.data.success == true) {
          document.getElementById("formActualizarRoles").reset();

          $("#modalActualizarRoles").modal("hide");

          Swal.fire({
            icon: "success",
            confirmButtonColor: "#3085d6",
            title: response.data.message,
            text: response.data.info,
          });

          $("#tablaRoles").DataTable().ajax.reload();
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

/* --------------listarActualizacionRoles ------------------ */
function listarActualizacionRoles(id) {
  let id_roles = id;
  let id_roles_update = document.getElementById("id_roles_update").value;
  let rol = document.getElementById("rol_update").value;
  let estatus = document.getElementById("estatus_update").value;

  let listar = "listar";

  $.ajax({
    url: "index.php?page=verRoles",
    type: "post",
    dataType: "json",
    data: {
      id_roles: id_roles,
    },
  })
    .done(function (response) {
      if (response.data.success == true) {
        document.getElementById("id_roles_update").value = response.data.id;
        document.getElementById("rol_update").value = response.data.rol;
        document.getElementById("estatus_update").value = response.data.estatus;

        $("#modalActualizarRoles").modal("show");
      } else {
      }
    })
    .fail(function () {
      console.log("error");
    });
}

/* -------------- Activar e Inactivar Roles ------------------ */
function inactivarRoles(id) {
  var id_roles = id;

  Swal.fire({
    title: "¿Está seguro de moficar el estado del rol?",
    //  text: "El paciente sera dado de alta y el registro quedara guardado en la traza.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "index.php?page=inactivarRoles",
        type: "post",
        dataType: "json",
        data: {
          id_roles: id_roles,
        },
      })
        .done(function (response) {
          if (response.data.success == true) {
            $("#tablaRoles").DataTable().ajax.reload();
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
