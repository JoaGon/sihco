/*jslint unparam: true, regexp: true */
/*global window, $ */

jQuery(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : jQuery("#fuente").val(),
        uploadButton = jQuery('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = jQuery(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
//    url: url+'index.php?u='+jQuery("#url").val()+'&p='+jQuery("#pathDestino").val()+'&nom='+jQuery("#tablaTipoDoc").val(),
//    url: url+'index.php?u='+jQuery("#url").val()+'&p='+jQuery("#pathDestino").val(),
    jQuery('#fileupload').fileupload({
        url: url+'index.php?u='+jQuery("#url").val()+'&p='+jQuery("#pathDestino").val()+'&nom='+jQuery("#tablaTipoDoc").val(),
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize:  jQuery("#tamMax").val(),
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 50,
        previewMaxHeight: 50,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = jQuery('<div/>').appendTo('#files');
        jQuery.each(data.files, function (index, file) {
            var node = jQuery('<p/>')
                    .append(jQuery('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = jQuery(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append(jQuery('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Subir')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
    	var progress = parseInt(data.loaded / data.total * 100, 10);
    	jQuery('#progress .progress-bar').css(
    			'width',
    			progress + '%'
    	);
    }).on('fileuploadsubmit', function (e, data) {
    	/* Acciones que desee realizar al hacer submit*/
    }).on('fileuploaddone', function (e, data) {
        jQuery.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = jQuery('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                jQuery(data.context.children()[index])
                    .wrap(link);
                var funcion = jQuery("#nomFuncion").val();
                var cedula = jQuery("#cedula").val();
//                alert(funcion+'('+cedula+','+file+')');
                eval(funcion+'("'+cedula+'","'+file.name+'","'+file.url+'")');
            } else if (file.error) {
                var error = jQuery('<span class="text-danger"/>').text(file.error);
                jQuery(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        jQuery.each(data.files, function (index) {
            var error = jQuery('<span class="text-danger"/>').text('Error, el archivo no se pudo subir al servidor.');
            jQuery(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !jQuery.support.fileInput)
        .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');
});


//**************************************************
