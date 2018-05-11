<form action="{{ route('FormInsert') }}" method="POST">
{{ csrf_field() }}
	<input type="text" name="fname" required="" />
	<input type="text" name="lname" required="" />
	<input type="submit" value="Submit" />
</form>