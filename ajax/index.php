<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ajax Project</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 m-auto body px-0">
				<div class="heading">
					<h1 class="text-center">Ajax Project</h1>
				</div>
				<div class="add px-2 mt-4 ml-2">
					<form id="addform">
						<input type="text" name="fname" id="fname" placeholder="First Name" required>
						<input type="text" name="lname" id="lname" placeholder="Last Name" required>
						<input type="submit" name="add" id="add" class="btn btn-primary" value="Add Here">
					</form>
				</div>
				<div id="load-table" class="px-2 pb-2">
				</div>

				<div class="edit-form" id="edit-form">
					<div class='position'>
						<table class='m-auto' id="edit">
						</table>
						<div id='exit'>X</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// data table load function.
			function loadtable() {
				$.ajax({
					url: "loadtable.php",
					type: "POST",
					success: function(data) {
						$("#load-table").html(data);
					}
				});
			}
			loadtable();
			// insert data.
			$("#add").on("click", function(e) {
				e.preventDefault();
				var fname = $("#fname").val();
				var lname = $("#lname").val();

				if (fname == "" || lname == "") {

				} else {
					$.ajax({
						url: "insert.php",
						type: "POST",
						data: {
							firstname: fname,
							lastname: lname
						},
						success: function(data) {
							if (data == 1) {
								alert("yes");
								$("#addform").trigger("reset");
								loadtable();
							} else {
								alert("Con't Save Record.");
							}
						}
					})
				}

			});
			// delete data.
			$(document).on("click", ".delete", function() {
				if (confirm("Do you want to delete this")) {
					var tableid = $(this).data("id");
					var element = this;
					$.ajax({
						url: "delete.php",
						type: "POST",
						data: {
							id: tableid
						},
						success: function(data) {
							if (data == 1) {
								$(element).closest("tr").fadeOut();
							}
						}
					});
				}

			});
			// show edit form.
			$(document).on("click", ".edit", function() {
				$("#edit-form").show();
				var t_id = $(this).data("eid");
				$.ajax({
					url: "load_edit.php",
					type: "POST",
					data: {
						eid: t_id
					},
					success: function(data) {
						$("#edit-form .position table").html(data);
					}
				});
			});
			// hide edit form.
			$("#exit").on("click", function() {
				$("#edit-form").hide();
			});
			// update form data.
			$(document).on("click","#edit-submit", function() {
				var id = $("#edit-id").val();
				var firstname = $("#edit-fname").val();
				var lastname = $("#edit-lname").val();
				$.ajax({
					url: "update.php",
					type: "POST",
					data: {
						id: id,
						fname: firstname,
						lname: lastname
					},
					success: function(data) {
						if (data == 1) {
							loadtable();
							$("#edit-form").hide();
						}
					}
				});
			});
		});
	</script>
</body>

</html>