

$(document).ready(function() {
  /*
   * Enseñamos únicamente el número de imágenes que se va a subir.
   */
    $( "#button2" ).click(function() {
      $("#imagen3").css('visibility', 'hidden');
      $("#imagen4").css('visibility', 'hidden');
    });
    $( "#button3" ).click(function() {
      $("#imagen3").css('visibility', 'visible');
      $("#imagen4").css('visibility', 'hidden');
    });
    $( "#button4" ).click(function() {
      $("#imagen3").css('visibility', 'visible');
      $("#imagen4").css('visibility', 'visible');
    });

    /*
     * Función jquery que coge la imagen.
     */
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    });
});
