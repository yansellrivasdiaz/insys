$(document).ready(function () {
    $("#formmiscamposafines").on("submit",function (e) {
        e.preventDefault();
        var miscamposafines = '';
        if($("input[type=checkbox]:checked").length > 0){
            $.each($("input[type=checkbox]:checked"),function (index,value) {
                miscamposafines+=$(this).val()+",";
            })
            miscamposafines = JSON.stringify(miscamposafines.slice(0,-1).split(","));

            alertshow(miscamposafines,"success");
        }else{
            alertshow("Debe seleccionar al menos un campo afin!","warning");
        }
    })
})