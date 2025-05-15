var Sistema = (function () {
    return {
        validacionGeneral: function (id, reglas, mensajes) {
            const formulario = $("#" + id);
            formulario.validate({
                rules: reglas,
                messages: mensajes,
                errorElement: "span", //default input error message container
                errorClass: "help-block help-block-error", // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                highlight: function (element, errorClass, validClass) {
                    // hightlight error inputs
                    $(element).closest(".form-group").addClass("has-error"); // set error class to the control group
                },
                unhighlight: function (element) {
                    // revert the change done by hightlight
                    $(element).closest(".form-group").removeClass("has-error"); // set error class to the control group
                },
                success: function (label) {
                    label.closest(".form-group").removeClass("has-error"); // set success class to the control group
                },
                errorPlacement: function (error, element) {
                    if (
                        $(element).is("select") &&
                        element.hasClass("bs-select")
                    ) {
                        //PARA LOS SELECT BOOSTRAP
                        error.insertAfter(element); //element.next().after(error);
                    } else if (
                        $(element).is("select") &&
                        element.hasClass("select2-hidden-accessible")
                    ) {
                        element.next().after(error);
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // default placement for everything else
                    }
                },
                invalidHandler: function (event, validator) {
                    //display error alert on form submit
                },
                submitHandler: function (form) {
                    return true;
                },
            });
        },
        notificaciones: function (mensaje, titulo, tipo) {
            toastr.options = {
                closeButton: true,
                newestOnTop: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                timeOut: "5000",
            };
            if (tipo == "error") {
                toastr.error(mensaje, titulo);
            } else if (tipo == "success") {
                toastr.success(mensaje, titulo);
            } else if (tipo == "info") {
                toastr.info(mensaje, titulo);
            } else if (tipo == "warning") {
                toastr.warning(mensaje, titulo);
            } else if (tipo == "secondary") {
                toastr.secondary(mensaje, titulo);
            }
        },
    };
})();

$(document).ready(function () {
    const myModal = new bootstrap.Modal(
        document.getElementById("staticBackdrop")
    );

    //==========================================================================
    $(".txtOnly").keypress(function (e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });
    //==========================================================================
    $(".input-number").on("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
    //==========================================================================
    $("#departamento_id").on("change", function (event) {
        const url_t = $(this).attr("data_url");
        const id = $(this).val();

        var data = {
            id: id,
        };
        $.ajax({
            url: url_t,
            type: "GET",
            data: data,
            success: function (respuesta) {
                respuesta_html = "";
                if (id != "") {
                    respuesta_html +=
                        '<option value="">---Seleccione---</option>';
                } else {
                    respuesta_html +=
                        '<option value="">Seleccione primero un departamento</option>';
                }
                $.each(respuesta.municipios, function (index, item) {
                    respuesta_html +=
                        '<option value="' +
                        item["id"] +
                        '">' +
                        item["municipio"] +
                        "</option>";
                });
                $("#municipio_id").html(respuesta_html);
            },
            error: function () {},
        });
    });
    //==========================================================================
    $("#form_cliente").on("submit", function (e) {
        e.preventDefault();
        const form = $(this);
        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: form.serialize(),
            success: function (respuesta) {
                console.log(respuesta);
                myModal.hide();
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones("Se registro de manera correcta","Sistema","success");
                } else {
                    Sistema.notificaciones("No se pudo realizar el registro, intentalo nuevamente","Sistema","error");
                }
            },
            error: function () {},
        });
    });
});
