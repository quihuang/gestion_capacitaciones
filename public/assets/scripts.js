$(document).ready(function () {

    $("#formTema").on("submit", function (event) {
        
        event.preventDefault();
        const pathReload = "index.php?controller=tema&action=index";
        handleFormSubmit($(this), '../ajax/tema_ajax.php', pathReload);
    });

    $("#formAsistente").on("submit", function (event) {
        event.preventDefault();
        const pathReload = "index.php?controller=asistente&action=index";
        handleFormSubmit($(this), '../ajax/asistente_ajax.php', pathReload);
    });

    $("#formVerificacion").on("submit", function (event) {
        event.preventDefault();
        const pathReload = "index.php?controller=verificacion&action=index";
        handleFormSubmit($(this), '../ajax/verificacion_ajax.php', pathReload);
    });
});


function handleFormSubmit($form, url, pathReload) {

    const formData = $form.serialize();
    

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = pathReload;
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function (e) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un problema al procesar la solicitud.'
            });
        }
    });
}