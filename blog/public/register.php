<!DOCTYPE html>
<html>
<head>
	<title>Register form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<h2>Register Form</h2>
				<hr>
				<form>
				<div class="form-group">
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Full Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="txtname" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="txtemail" autofocus="true" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="txtpass" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label"> Confirm password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="txtpass2" value="">
							</div>
						</div>
					</div>
				
					<button type="button" id="btnreg" class="btn btn-primary mb-2">Register</button> 
					<a role="button" href="index.php"  class="btn btn-primary mb-2 float-right active">Login</a>
				</form>
				<div class="alert hidden informasi" role="alert"  ></div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script src="sha256.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btnreg").click(function(){
			var ajax = {
				//user_id : $("#txtuser").val(),
			//	user_password : sha256($("#txtpass").val()),
			//	user_name : $("#txtname").val()
name: $("#txtname").val(),
password: $("#txtpass").val(),
email: $("#txtemail").val()

//password_confirmation: $("#txtpass2").val()

			}
			$.ajax({
				url: "/api/register",
				type: "POST",
				data: ajax,
				success: function(data, textStatus, jqXHR)
				{
					console.log(data.url,data.email,data.password);
					/*$("#txtuser").val("");
					$("#txtpass").val("");
					$("#txtname").val("");
					$("#txtuser").focus();*/
					 $("#txtname").val("");
                     $("#txtemail").val("");
 $("#txtpass").val("");
 $("#txtpass2").val("");
 $("#txtname").focus();


	$(".informasi").removeClass("hidden").addClass('alert-success').html(textStatus);

				},
				error: function (request, textStatus, errorThrown) {
					//console.log(request);
					console.log(errorThrown);
					$(".informasi").removeClass("hidden").addClass('alert-danger').html(errorThrown);
				}
			});
		});
	});
</script>
</html>