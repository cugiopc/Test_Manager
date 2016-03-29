@extends('layouts.app')
@section('content')
	<form action="{{ url('/form') }}" method="POST" accept-charset="utf-8">
		<select name="role">
			<option value="2" >Leader</option>
            <option value="3" selected>Tester</option>
		</select>
		<input type="submit" name="submit" value="submit">
	</form>
@endsection