function openPopUp(obj)
{
    var data = $(obj).serialize();

    var url = BASE_URL+"reports/inventory_pdf?"+data;

    window.open(url, "report", "width=700,height=500,left=" + (screen.width - 700) / 2 + ", top=" + (screen.height - 500) / 2 );

    return false;
}