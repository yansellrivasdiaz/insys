$(document).ready(function () {
    $("#formmiscamposafines").on("submit",function (e) {
        e.preventDefault();
        var miscamposafines = '';
        if($("input[type=checkbox]:checked").length > 0){
            $.each($("input[type=checkbox]:checked"),function (index,value) {
                miscamposafines+=$(this).val()+",";
            })
            miscamposafines = JSON.stringify(miscamposafines.slice(0,-1).split(","));
            var Data = {
                camposafines: miscamposafines
            };
            var url = 'http://insys/app_dev.php/home/rest/miscamposafines';
            fetch(url, {
                method: 'POST',
                mode: "same-origin",
                credentials: "same-origin",
                body: JSON.stringify(Data),
                headers:{
                    'Content-Type': 'application/json'
                }
            }).then(function(res){
                if (res.ok) {
                    return res.text();
                }
                throw new Error('Problema al comunicarse con el servidor<br>Comunicarse con el departamento de TI');
            }).then((response) => {
                console.log(response);
            })
            .catch((error) => {
                alertshow('Error: '+error.message,'danger');
            });

        }else{
            alertshow("Debe seleccionar al menos un campo afin!","warning");
        }
    })
})