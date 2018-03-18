<head>
	<title>Registro de Usuario</title>
</head>

<div class="register">
	<div class="register_container col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 no-card">
		<div class="register_entry">
			<div class="col-xs-12 col-sm-6">
				<p><b>Nombre *</b></p>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="user icon"></i></span>
					<input type="text" name="txtName" class="txtName form-control" placeholder="Nombre" required="required">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p><b>Apellido *</b></p>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="user icon"></i></span>
					<input type="text" name="txtLastName" class="txtLastName form-control" placeholder="Apellido" required="required">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p><b>Nombre de Usuario *</b></p>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="user icon"></i></span>
					<input type="text" name="txtUserName" class="txtUserName form-control" placeholder="Nombre de Usuario" required="required">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p><b>Correo Electrónico *</b></p>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="user icon"></i></span>
					<input type="text" name="txtEmailReg" class="txtEmailReg form-control" placeholder="E-mail" required="required">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p><b>Contraseña *</b></p>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="lock icon"></i></span>
					<input type="password" name="txtPassReg" class="txtPassReg form-control" id="txtPassReg" placeholder="Contraseña" required="required">
				</div>
			</div>

			<script>
				function passverify(txtPassReg,txtPassRepeat) {
					var pass=document.getElementById('txtPassReg').value,
						repp=document.getElementById('txtPassRepeat').value;
					
					if (pass == repp) {
						document.getElementById("not-match").style.color = "green";
						document.getElementById("not-match").innerHTML = " <i class='icon checkmark'></i> Las contraseñas coinciden";
						document.getElementById("btnReg").disabled = false;
					} else {
						document.getElementById("not-match").style.color = "red";
						document.getElementById("not-match").innerHTML = " <i class='icon remove'></i> Las contraseñas no coinciden";
						document.getElementById("btnReg").disabled = true;
					}
				}
			</script>

			<div class="col-xs-12 col-sm-6">
				<p><b>Repita su Contraseña *</b></p>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="lock icon"></i></span>
					<input type="password" name="txtPassRegRepeat" class="txtPassRepeat form-control" id="txtPassRepeat" placeholder="Repita su Contraseña"  onkeyup="passverify('txtPassReg','txtPassRepeat')" onkeydown="passverify('txtPassReg','txtPassRepeat')" onmouseout="passverify('txtPassReg','txtPassRepeat')" required="required">
				</div>
			</div>
			<p class="not-match" id="not-match">Las contraseñas no coinciden</p>
			<button class="btn btn-danger btnReg" id="btnReg" disabled>Registrarse</button>
		</div>
	</div>
</div>