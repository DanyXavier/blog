$(function() {
    $("#name").keyup(function() {
        var cadena = $(this).val();
        string_to_slug(cadena);
    });
    $('#editModal').on("show.bs.modal", function (e) {
        $("#ModalLabel").html($(e.relatedTarget).data('title'));
        $("#name").val($(e.relatedTarget).data('name'));
        $("#slug").val($(e.relatedTarget).data('slug'));
        $("#fomEdit").attr("action",`http://blog.ec/tags/${$(e.relatedTarget).data('id')}`)
   });
});


function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();

    //quita acentos, cambia la ñ por n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaeeeeiiiioooouuuunc------";

    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
        .replace(/\s+/g, '-') // reemplaza los espacios por -
        .replace(/-+/g, '-'); // quita las plecas

    return $("#slug").val(str);
}
/**
 * *en los componentes del botton editar existe el data-title data-id data-slug
 * *con ello los traspasamos al modal si no es un input utilizar .html()
 * *si es un input con value para llenarlo usar .val()
 * *y asi sucesivamente los componentes de la etiqueta que queramos llenar en el modal
 */
/*$(function() {
    $('#editModal').on("show.bs.modal", function (e) {
         $("#ModalLabel").html($(e.relatedTarget).data('title'));
         //$("#fav-title").html($(e.relatedTarget).data('title'));
         $("#name").val($(e.relatedTarget).data('name'));
         $("#slug").val($(e.relatedTarget).data('slug'));
    });
})*/
