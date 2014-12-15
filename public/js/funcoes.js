$(document).ready(function() {
    $(function() {
        $("#data").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        });
    });
//datepicker finish

//calcula idade



    $('#data').change(function(){

        var today = new Date();
        var dd = Number(today.getDate());
        var mm = Number(today.getMonth()+1);

        var yyyy = Number(today.getFullYear());

        var myBD = $('#data').val();
        var myBDM = Number(myBD.split("/")[0])
        var myBDD = Number(myBD.split("/")[1])
        var myBDY = Number(myBD.split("/")[2])
        var age = yyyy - myBDY;


        if(mm < myBDM)
        {
            age = age - 1;
        }
        else if(mm == myBDM && dd < myBDD)
        {
            age = age - 1
        };

        $('#idade').val(age);
    });





//
//    var appended = $("<span>Quantos?</span><input type='text' id='nfilhos' name='nfilhos' ></input>");
//    var appendedButton = $("<input type='button' id='reset' name='reset' value='Limpar Campos'</input>");
//    $('input:radio[id="filhos"]').change(
//
//    function () {
//        if ($(this).val() == 's') {
//            $(appended).appendTo("#child");
//
//
//        } else {
//            $(appended).remove();
//        }
//
//    });
//
//
//$(appended).change(function () {
//    $("#teste").remove();
//    $("#children").append("<div id='teste'>");
//        for (i = 0; i < $("#nfilhos").val();i++)
//        {
//            $("#teste").append("<span>Nome: </span><input type='text' id='nomefilhos' name='nomefilhos' ></input><br>");
//        }
//         $(appendedButton).appendTo("#button");
//     $("#children").append("</div>");
//    });
//
//
//$(appendedButton).click(function (){
//        $("#teste").remove();
//
//})



});
//$(document).ready(function() {
//
//
//});

//termina calculo idade

//children field


function getEndereco() {

    // Se o campo CEP não estiver vazio
    if($.trim($("#cep").val()) != ""){

        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
            if (resultadoCEP["tipo_logradouro"] != '') {
                if (resultadoCEP["resultado"]) {
                    $("#logradouro").val(unescape(resultadoCEP['tipo_logradouro']));
                    $("#rua").val(unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#estado").val(unescape(resultadoCEP["uf"]));
//dá o foco no numero
                    $("#numero").focus();
                }

            }

        });
    }
}