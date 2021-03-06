$(function(){    
    $('.tabitem').on('click', function(){
        $('.activetab').removeClass('activetab');
        $(this).addClass('activetab');
        var item = $('.activetab').index();
        $('.tabbody').hide();
        $('.tabbody').eq(item).show();
    });
    fillUf();
    
    $("#search").on("focus", function(){
        $(this).animate({
            width:300
        },"fast");
    });
    $("#search").on("blur", function(){
        if ($(this).val()==="") {
            $(this).animate({
                width:100
            }, "fast");  
        } 
        setTimeout(function(){
            $(".searchresults").hide();
        }, 500);   
    });
    
    $("#search").on("keyup",function(){
        var datatype = $(this).attr("data-type");
        var q = $(this).val();
        console.log(BASE_URL+"ajax/"+datatype);
        if (datatype !== "") {
            $.ajax({
                url:BASE_URL+"ajax/"+datatype,
                type:"GET",
                data:{q:q},
                dataType:"json",
                success:function(json){
                    if ($(".searchresults").length === 0) {
                        $("#search").after("<div class='searchresults'></div>");
                        $(".searchresults").css("left", $("#search").offset().left);
                        $(".searchresults").css("top", $("#search").offset().top+$("#search").height()+3);
                    }
                    var html = '';
                    for(var i in json){
                        html += "<div class='si'><a href='"+BASE_URL+"clients/edit/"+json[i].id+"'>"+json[i].name+"</a></div>";
                    }
                    $(".searchresults").html(html);
                    $(".searchresults").show();
                }
            });
        }
    });
    
});
//Retorna apenas números
function onlyNumbers(text){
  val = '';
  var regex  = /[0-9]/;
  var digitos = text.split('');
  for(var i in digitos){
    if(regex.test(digitos[i])){
      val += digitos[i];    
    }
  }
  return val;
}
//Máscara para telefone
function maskTel(obj){
    var tel = onlyNumbers(obj.value); 
    var telefone = '';
    switch(tel.length){
        case 1:
          telefone = '('+tel;
        break;
        case 2:case 3:case 4:case 5:
          telefone = '('+tel.substr(0, 2)+')'+tel.substr(2, 5);
        break;
        case 6:
          telefone = '('+tel.substr(0, 2)+')'+tel.substr(2, 4)+'-';
        break;
        case 7:case 8:case 9:case 10:
          telefone = '('+tel.substr(0, 2)+')'+tel.substr(2, 4)+'-'+tel.substr(6, 4);
        break;
        case 11:
          telefone = '('+tel.substr(0, 2)+')'+tel.substr(2, 5)+'-'+tel.substr(7, 4);
        break;
    }
  obj.value = telefone;
}
//Preenche UF dos estados Brasileiros
function fillUf(){
  var uf = ['UF', 'SP', 'RS', 'SC', 'PR', 'MS', 'GO', 'TO', 'MT', 'RO', 'AC', 'RJ', 'ES', 'MG', 'BA', 'SE', 'AL', 'PE', 'PB', 'RN', 'CE', 'PI', 'MA', 'PA', 'AP', 'RR', 'AM']; 
  var html = '';
  for(var i in uf){
    html += '<option>'+uf[i]+'</option>';
  }
  $("#address_uf").html(html);
}
//Máscara para CEP
function maskCep(obj){
  var cep = onlyNumbers(obj.value);
  var codCep = (cep.length > 4)?cep.substr(0,5)+'-'+cep.substr(5,3):cep;
  $(obj).val(codCep);
}
//Preenche o CEP
function getCep(obj){
    var cep = onlyNumbers(obj.value);
    if(cep.length === 8){
        $.ajax({
            url:"https://viacep.com.br/ws/"+cep+"/json/",
            dataType:"json",
            success:function(json){
              $('#address').val(json.logradouro);
              $('#address_neighborhood').val(json.bairro);
              $('#address_city').val(json.localidade);
              $('#address_state').val(json.localidade);
              $('#address_uf').val(json.uf);
              $('#address_country').val("Brasil");
              $('#address_number').focus();
            }
        });
    }
}
//Preenche o nome da cidade
