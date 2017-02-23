$(function(){ 
    $("input[name=total_price]").mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
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


