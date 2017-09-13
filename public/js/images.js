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
             $('#falseinput8').click(function() {
        $("#fileinput8").click();
    });
              $('#falseinput8').click(function() {
        $("#fileinput8").click();
    });
               $('#falseinput8').click(function() {
        $("#fileinput8").click();
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

});