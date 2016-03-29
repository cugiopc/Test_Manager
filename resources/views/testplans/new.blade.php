@extends('layouts.app')
@section('content')
<script type="text/javascript">

	var formblock;
	var forminputs;

	function prepare() {
		formblock= document.getElementById('form_add');
		forminputs = formblock.getElementsByTagName('input');
	}

	function select_all(name, value) {
		for (i = 0; i < forminputs.length; i++) {
    // regex here to check name attribute
    var regex = new RegExp(name, "i");
    if (regex.test(forminputs[i].getAttribute('name'))) {
    	if (value == '1') {
    		forminputs[i].checked = true;
    	} else {
    		forminputs[i].checked = false;
    	}
    }
}
}

if (window.addEventListener) {
	window.addEventListener("load", prepare, false);
} else if (window.attachEvent) {
	window.attachEvent("onload", prepare)
} else if (document.getElementById) {
	window.onload = prepare;
}
</script>
<style type="text/css" media="screen">
	#sp{
		margin-top: 10px;
	}
</style>

<div class="container">
	<form action="{{ url('/testplans/create') }}" method="POST" id="form_add" class="form-horizontal" role="form">
		{{ csrf_field() }}
		<div class="col-sm-offset-1 col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="label label-primary"><b>Input Test Plan info</b></span></h3>
				</div>
				<div class="panel-body">
					<!-- Display Validations Errors-->
					@include('common.errors')
					
					<!-- Testplan info-->
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
						</div>
					</div>
					<div class="form-group">
						<label for="descriptions" class="col-sm-2 control-label">Descriptions<span style="color:red;">*</span></label>
						<div class="col-sm-10">
							<textarea name="descriptions" id="descriptions" class="form-control" rows="4">{{ old('descriptions') }}</textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Testplan select testcases-->
		<div class="col-sm-offset-1 col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="label label-primary"><b>Select Testcases</b></span></h3>
				</div>
				<div class="panel-body">
					@if (count($testcases) > 0)
					<table class="table table-striped table-hover testcases-table">
						<thead>
							<tr>
								<th>Check: <a href="#" onClick="select_all('tetscase', '1');"> All |</a><a href="#" onClick="select_all('tetscase', '0');"> None</a></th>
								<th>ID</th>
								<th>Title</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt = 1; ?>
							@foreach ($testcases as $testcase)
							<tr>
								<td><input type="checkbox" name="tetscase[]" value="{{ $testcase->id }}"></td>
								<td class="text-table">
									<a href="{{ url('/testcase/show/'.$testcase->id) }}">
										<div>{{ $stt }}</div>
									</a>
								</td>
								<td class="text-table">{{ $testcase->title}}</td>
								<td>
									@if ($testcase->status->status == 'Success')
									<h4><span class="label label-success"><b>Success</b></span></h4>
									@elseif($testcase->status->status == 'Fail')
									<h4><span class="label label-danger"><b>Failed&nbsp&nbsp&nbsp&nbsp</b></span></h4>
									@elseif($testcase->status->status == 'Retest')
									<h4><span class="label label-warning"><b>Retest&nbsp&nbsp</b></span></h4>
									@else
									<h4><span class="label label-default"><b>Untest&nbsp&nbsp</b></span></h4>
									@endif
								</td>
							</tr>
							<?php $stt++; ?>
							@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
		<div class="col-sm-offset-1 col-sm-10">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp Save</button>
		</div>
	</form>
	<br>
</div>
@endsection