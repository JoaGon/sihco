$(document).ready(function() {
    $('#falseinput').click(function() {
        $("#fileinput").click();
    });
    $('#falseinput2').click(function() {
        $("#fileinput2").click();
    });

    $('#falseinput3').click(function() {
        $("#fileinput3").click();
    });
    $('#falseinput4').click(function() {
        $("#fileinput4").click();
    });
    $('#falseinput5').click(function() {
        $("#fileinput5").click();
    });
    $('#falseinput6').click(function() {
        $("#fileinput6").click();
    });
    $('#falseinput7').click(function() {
        $("#fileinput7").click();
    });
    $('#falseinput8').click(function() {
        $("#fileinput8").click();
    });
     $('#falseinput9').click(function() {
        $("#fileinput9").click();
    });
      $('#falseinput10').click(function() {
        $("#fileinput10").click();
    });
       $('#falseinput11').click(function() {
        $("#fileinput11").click();
    });
        $('#falseinput12').click(function() {
        $("#fileinput12").click();
    });
    $('#falseinput13').click(function() {
        $("#fileinput13").click();
    });
    $('#falseinput14').click(function() {
        $("#fileinput14").click();
    });
    $('#falseinput15').click(function() {
        $("#fileinput15").click();
    });
    $('#falseinput16').click(function() {
        $("#fileinput16").click();
    });
      
    $('#falseinput17').click(function() {
        $("#fileinput17").click();
    });
     $('#falseinput18').click(function() {
        $("#fileinput18").click();
    });
      $('#falseinput19').click(function() {
        $("#fileinput19").click();
    });
       $('#falseinput20').click(function() {
        $("#fileinput20").click();
    });
        $('#falseinput21').click(function() {
        $("#fileinput21").click();
    });
         $('#falseinput22').click(function() {
        $("#fileinput22").click();
    });
          $('#falseinput23').click(function() {
        $("#fileinput23").click();
    });
           $('#falseinput24').click(function() {
        $("#fileinput24").click();
    });
            $('#falseinput25').click(function() {
        $("#fileinput25").click();
    });
             $('#falseinput26').click(function() {
        $("#fileinput26").click();
    });
              $('#falseinput27').click(function() {
        $("#fileinput27").click();
    });
               $('#falseinput28').click(function() {
        $("#fileinput28").click();
    });
                  $('#falseinput29').click(function() {
        $("#fileinput29").click();
    });
      




    $('#fileinput').change(function() {
        readURL($('#fileinput')[0]);
    });

    $('#fileinput2').change(function() {
        readURL2($('#fileinput2')[0]);
    });

    $('#fileinput3').change(function() {
        var input = $('#fileinput3')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              document.getElementById("primera3").style.backgroundImage = "url('" + e.target.result + "')";
               
            };

            reader.readAsDataURL(input.files[0]);
        }

    });
    $('#fileinput4').change(function() {
        var input = $('#fileinput4')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera4").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });

    $('#fileinput5').change(function() {
        var input = $('#fileinput5')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera5").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
    $('#fileinput6').change(function() {
        var input = $('#fileinput6')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera6").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
    $('#fileinput7').change(function() {
        var input = $('#fileinput7')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera7").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
    $('#fileinput8').change(function() {
        var input = $('#fileinput8')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera8").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });

$('#fileinput9').change(function() {
        var input = $('#fileinput9')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera9").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput10').change(function() {
        var input = $('#fileinput10')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera10").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput11').change(function() {
        var input = $('#fileinput11')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera11").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput12').change(function() {
        var input = $('#fileinput12')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera12").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput13').change(function() {
        var input = $('#fileinput13')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera13").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput14').change(function() {
        var input = $('#fileinput14')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera14").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput15').change(function() {
        var input = $('#fileinput15')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera15").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput16').change(function() {
        var input = $('#fileinput16')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera16").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput17').change(function() {
        var input = $('#fileinput17')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera17").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput18').change(function() {
        var input = $('#fileinput18')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera18").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput19').change(function() {
        var input = $('#fileinput19')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera19").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput20').change(function() {
        var input = $('#fileinput20')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera20").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput21').change(function() {
        var input = $('#fileinput21')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera21").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput22').change(function() {
        var input = $('#fileinput22')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera22").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput23').change(function() {
        var input = $('#fileinput23')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera23").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput24').change(function() {
        var input = $('#fileinput24')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera24").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput25').change(function() {
        var input = $('#fileinput25')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera25").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput26').change(function() {
        var input = $('#fileinput26')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera26").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput27').change(function() {
        var input = $('#fileinput27')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera27").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput28').change(function() {
        var input = $('#fileinput28')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera28").style.backgroundImage = "url('" + e.target.result + "')";
                //$( "#primera28" ).append( "<img class='ejemplo3' src=\"" + e.target.result + "\" name='primera28'>" );
                $("#test").val(e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }

    });
$('#fileinput29').change(function() {
        var input = $('#fileinput29')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera29").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }

    });


    function readURL(input, number) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById("primera1").style.backgroundImage = "url('" + e.target.result + "')";


            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input, number) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {

                document.getElementById("primera2").style.backgroundImage = "url('" + e.target.result + "')";

            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#primera1").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera2").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera3").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera4").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera5").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera6").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera7").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera8").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera9").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera10").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera11").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera12").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera13").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera14").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera15").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera16").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera17").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera18").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera19").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera20").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera21").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera22").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
    $("#primera23").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
     $("#primera24").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
      $("#primera25").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
       $("#primera26").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
        $("#primera27").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
         $("#primera28").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });
          $("#primera29").click(function() {
        var bg = $(this).css('background-image').trim();
        var res = bg.substring(5, bg.length - 2);
        console.log(res);
        if (res != 'ne') {
            $('#img_imagenologico').remove();
            $("#imagenologico").append("<img id='img_imagenologico' src='" + res + "' style=\"display:block;margin:0 auto 0 auto; width: auto; higth: auto; max-height: 720px; max-width: 480px; \"/>");
            $('#big-image').modal('show');
        }



    });


});