<script src="./js/cityFilter.js"></script>

<h1 class="text-center">PHP Test Application</h1>

<hr />

<form method="get" class="form-inline text-center" style="margin-bottom: 10px" id="cityFilterForm">
	<div class="form-group">
		<label for="cityFilter" class="sr-only">City:</label>
		<input type="text" name="city" name="cityFilter" class="form-control" placeholder="Enter city" value="<?=$_GET['city']?>">
	</div>
	<button type="submit" class="btn btn-primary">Filter</button>
	<!-- Hide in the rare case javascript isn't available -->
	<button class="btn btn-secondary hidden" name="clear">Clear</button>
</form>

<table class="table table-striped table-bordered table-hover" id="usersTable">
	<thead>
		<tr class="info">
			<th class="text-center">Name</th>
			<th class="text-center">E-mail</th>
			<th class="text-center">City</th>
		</tr>
	</thead>
	<tbody>
		<?foreach($users as $user){?>
		<tr>
			<td name="name"><?=$user->getName()?></td>
			<td name="email"><?=$user->getEmail()?></td>
			<td name="city"><?=$user->getCity()?></td>
		</tr>
		<?}?>
	</tbody>
</table>				

<hr />

<?php
if (isset($_GET['errors'])) {
	?><div class="alert alert-danger"><?php
    $errors = $_GET['errors'];
    echo "<h4>Errors:</h4>";
    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }
	?></div><?php
}
?>

<form method="post" action="create.php" class="form-horizontal well">
	<div class="form-group">
		<label for="name" class="control-label col-sm-2">Name:</label>
		<div class="col-sm-10">
			<input name="name" input="text" id="name" class="form-control col-sm-10 col-lg-12"/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="email" class="control-label col-sm-2">E-mail:</label>
		<div class="col-sm-10">
			<input name="email" input="text" id="email" class="form-control col-sm-10 col-lg-12"/>
		</div>
	</div>
	
	<div class="form-group">
		<label for="city" class="control-label col-sm-2">City:</label>
		<div class="col-sm-10">
			<input name="city" input="text" id="city" class="form-control"/>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button class="btn btn-default">Create new row</button>
		</div>
	</div>
</form>