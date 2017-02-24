$(function(){ 
    $("#total_price").mask('000.000.000.000.000,00', {reverse:true});
    $(".client_add_button").on("click", function(e){
        e.preventDefault();
        var name = $("#searchClients").val();
        if (name !== "") {
            if (confirm("Deseja adicionar um cliente com nome: "+name+"?")) {
                $.ajax({
                    url:BASE_URL+"ajax/add_client",
                    type:"POST",
                    dataType:"json",
                    data:{name:name},
                    success:function(json){
                        $(".searchresults").hide();
                        $("input[name=id_client]").val(json['id']);
                    }
                });
                return false;
            }
        }
    });
    $("#searchClients").on("blur", function(){
        setTimeout(function(){
            $(".searchresults").hide();
        }, 500);
    });
    
    $("#add_prod").on("blur", function(){
        setTimeout(function(){
            $(".searchresults").hide();
        }, 500);
    });
    
    $("#add_prod").on("keyup",function(){
        var datatype = $(this).attr("data-type");
        var q = $(this).val();
        if (datatype !== "") {
            $.ajax({
                url:BASE_URL+"ajax/"+datatype,
                type:"GET",
                data:{q:q},
                dataType:"json",
                success:function(json){
                    if ($(".searchproducts").length === 0) {
                        $("#add_prod").after("<div class='searchproducts'></div>");
                        $(".searchproducts").css("left", $("#add_prod").offset().left);
                        $(".searchproducts").css("top", $("#add_prod").offset().top+$("#add_prod").height()+6);
                    }
                    
                    var html = '';
                    for(var i in json){
                        html += "<div class='si'><a href='javascript:;' data-id='"+json[i].id+"' data-price='"+json[i].price+"' data-quantity='"+json[i].quantity+"' data-name='"+json[i].name+"' onclick='addProd(this)'>"+json[i].name+" - R$ "+json[i].price+"</a></div>";
                    }
                    $(".searchproducts").html(html);
                    $(".searchproducts").show();
                }
            });
        }
    });
    
});
    
    $("#add_prod").on("blur", function(){
        setTimeout(function(){
            $(".searchproducts").hide();
        }, 500);
    });
    
    $("#searchClients").on("keyup",function(){
        var datatype = $(this).attr("data-type");
        var q = $(this).val();
        if (datatype !== "") {
            $.ajax({
                url:BASE_URL+"ajax/"+datatype,
                type:"GET",
                data:{q:q},
                dataType:"json",
                success:function(json){
                    if ($(".searchresults").length === 0) {
                        $("#searchClients").after("<div class='searchresults'></div>");
                        $(".searchresults").css("left", $("#searchClients").offset().left);
                        $(".searchresults").css("top", $("#searchClients").offset().top+$("#searchClients").height()+6);
                    }
                    
                    var html = '';
                    for(var i in json){
                        html += "<div class='si'><a href='javascript:;' data-id='"+json[i].id+"' onclick='selectClient(this)'>"+json[i].name+"</a></div>";
                    }
                    $(".searchresults").html(html);
                    $(".searchresults").show();
                }
            });
        }
    });
function selectClient(obj){
    var id_client = $(obj).attr("data-id");
    var name_client = $(obj).html();
    setTimeout(function(){
        $(".searchresults").hide();
    }, 500);
    $("#searchClients").val(name_client);
    $("input[name=id_client]").val(id_client);
}
function addProd(obj){
    var id = $(obj).attr("data-id");
    var price = $(obj).attr("data-price");
    var quantity = $(obj).attr("data-quantity");
    var name = $(obj).attr("data-name");
    $(".searchproducts").hide();
    $("#add_prod").val("");
    if ($("input[name='quant["+id+"]']").length === 0) {
        var html = "<tr><td>"+name+"</td><td><input type='number' class='p_quant' onchange='updateSubtotal(this)' data-price='"+price+"' name='quant["+id+"]' value='1' min='1' max='"+quantity+"' /></td><td>R$ "+price+"</td><td class='subtotal'>R$ "+price+"</td><td><a href='javascript:;' onclick='delProduc(this)'>Excluir</a></td></tr>";
        $("#products_table").append(html);
        updateTotal();
    }
    
}

function updateTotal(){
    var total = 0;
    if ($(".p_quant").length > 0) {
        for (var i = 0; i < $(".p_quant").length; i++) {
            var quant = $(".p_quant").eq(i).val();
            var price = $(".p_quant").eq(i).attr("data-price");
            quant = (quant === 0)?1:quant;
            var res = parseFloat(price)*parseInt(quant);
            total += res;
        }
        $("#total_price").html(total);  
    }
    else{
        $("#total_price").html("0,00");
    }
    
}

function updateSubtotal(obj){
    var price = $(obj).attr("data-price");
    var quant = $(obj).val();
    if (quant < 0) {
        quant = 1;
    }
    var res = parseFloat(parseFloat(price)*parseInt(quant));
    $(obj).closest('tr').find(".subtotal").html("R$ "+res);
    updateTotal();
}
function delProduc(obj){
    $(obj).closest('tr').remove();
    updateTotal();
}


