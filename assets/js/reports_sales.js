/**
 * Created by orlando on 26/03/17.
 */
function openPopUp(obj)
{
    //Formata os dados enviados pelo formulário
    var data = $(obj).serialize();
    //Abre um popup
    var url = BASE_URL+"reports/sales_pdf?"+data;
    window.open(url, "reports", "width=700,height=500,left=" + (screen.width - 700) / 2 + ",top=" + (screen.height - 500) / 2);
    return false;
}
