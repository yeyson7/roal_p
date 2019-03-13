<?php
//borramos cualquier cookie anterior que se haya quedado grabada en el servidor
unset($_COOKIE["fechaAcceso"]);
unset($_COOKIE["idUsuario"]);
unset($_COOKIE["sucursal"]);
unset($_COOKIE["perfil"]);

setcookie("fechaAcceso", null, -1, "/");
setcookie("idUsuario", null, -1, "/");
setcookie("sucursal", null, -1, "/");
setcookie("perfil", null, -1, "/");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="Vista/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="Vista/css/estilos_login.css" rel="stylesheet" media="screen">
<title>..::LOGIN SISTEMA POLICLINICO ROAL::..</title>
<script type="text/javascript" src="Vista/js/jquery.min.js"></script>
<script type="text/javascript" src="Vista/js/jquery.numeric.js"></script>
<script Language="JavaScript">
	$(document).ready(function() {
		$("#formulario-login").submit(function(event){
			var dataString = $("#formulario-login").serialize();
			$.ajax({
				type: "POST",
				url: "Controlador/C_Login.php",
				data: dataString,
				success: function(data){
					//console.log(data);
                    //alert(data);
                    if(data === "true"){
                        window.location = "Vista/main.php";
                        //$(".alert").html(data);
                        //alert(data);
                        <?php //header("Location: Vista/main2.php");?>
                    }else{
                        $(".alert").html(data);
                    }

                    /*if(isNaN(data)){
						$(".alert").html(data);
					}else{
						//window.location = "Vista/main.php";
					}*/
				}
			})
			event.preventDefault()
		});
		
		$(".alert").hide();	
		$("#usuario").focus();
	});
</script>

</head>
<body>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 form-group" style="padding-top:0px;">
                <img src="Vista/images/logo_index2.jpg" class="img-rounded img-responsive center-block" width="420">
            </div>
            <div class="col-md-4" style="line-height:50px;">
                <form role="form" id="formulario-login" method="post" autocomplete="off">
                    <div class="input-group" style="padding-bottom:20px;">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="input-group" style="padding-bottom:20px;">
                    	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Clave" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
                    </div>
                </form>
                <div class="alert"></div>
            </div>
        </div>
    </div>
</div>
<script src="Vista/js/bootstrap.min.js"></script>
</body>
</html>