<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
	<div class="row">
	<h3 align="center">Subscription Form</h3>
	<br />
		<form action="" method="get">
		<label class="col-md-6">Name</label>
			<div class="col-md-6 form-group">
				<input class="form-control" type="text" name="name" required="" />
			</div>
			<label class="col-md-6">Package Name</label>
			<div class="col-md-6 form-group">
				<input class="form-control" type="text" name="package_name" required="" />
			</div>
			<label class="col-md-6">Subscription</label>
			<div class="col-md-6 form-group">
				<select class="form-control" name="package_sub" required="">
					<?php //var_dump($package);exit();
					foreach ($package as $key) 
							{
								echo '<option value='.$key->id.'>'.$key->name.'</option>';
							}
					?>
				</select>
			</div>
			<label class="col-md-6"></label>
			<div class="col-md-6 form-group">
				<input class="btn btn-info" type="submit" name="submit" value="Submit" />
			</div>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>