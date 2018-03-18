$(document).ready(function() {

	var root = "/";


	//Registro de usuarios
	$(".btnReg").on("click", function(){

		//Declaro variables.
		var name 	 = $(".txtName").val().trim(),
			lastname = $(".txtLastName").val().trim(),
			username = $(".txtUserName").val().trim(),
			email	 = $(".txtEmailReg").val().trim(),
			pass 	 = $(".txtPassReg").val().trim()
			self	 = this;

			if (
				name !== "" &&
				lastname !== "" &&
				username !== "" &&
				email !== "" &&
				pass !== ""
				) {
				// Envio de datos

				$.ajax({
					type: "POST",
					url: root + 'res/php/user_actions/register.php',
					data:{
						name: name,
						lastname: lastname,
						username:username,
						email:email,
						pass:pass
					},
					beforeSend: function(){
						$(self).addClass("loading");
					},
					success: function(data){
						$(self).removeClass("loading");
						
						if (data>0) {
							window.location.href = root;
						} else {
							$(self).removeClass("loading");
						alert("Usuario ya existente.");
						}
					},
					error: function(){
						$(self).removeClass("loading");
						alert("Ha ocurrido un error con el registo.");
					}

				});
			} else {
				alert("Por favor, complete todos los campos.");
			}

	});


	//Log In
	$(".btnUserLogIn").on("click" , function(){
		var email = $(".txtUserEmailLogin").val().trim(),
			pass = $(".txtUserPassLogin").val().trim();


		$.ajax({
			type: "POST",
			url: root + 'res/php/user_actions/login.php',
			data: {
				email: email,
				pass: pass
			},
			success: function(data){
				if(data == "true"){
					window.location.href = "/";
				}else if(data == "false"){
					alert("Sus credenciales no son válidas. Por favor intente nuevamente");
				}
			}
		});
	});

});