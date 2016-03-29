@extends('layouts.app')
@section('content')
<script type="text/javascript">

	var formblock;
	var forminputs;

	function prepare() {
		formblock= document.getElementById('form_testcases');
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
	.icon{
		position: relative;
		float: right;
		color: #1983AD;
		margin-top: -55px;
		margin-right: 20px;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="label label-primary"><b>Test Plan Info</b></span></h3>
				</div>
				<div class="panel-body">
					<!-- Display Validations Errors-->
					@include('common.errors')

					<form action="{{ url('/testplans/edit/'.$testplan->id) }}" method="POST" accept-charset="utf-8" class="form-horizontal" role="form">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name <span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="name" id="name" class="form-control" value="{{ $testplan->name }}">
							</div>
						</div>
						<div class="form-group">
							<label for="descriptions" class="col-sm-2 control-label">Descriptions <span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<textarea name="descriptions" id="descriptions" class="form-control" rows="4">{{ $testplan->descriptions }}</textarea>
							</div>
						</div>
						<div class="form-group">        
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><span class="label label-primary"><b>People & Dates</b></span></h4>
				</div>
				<div class="panel-body">
					<table class="table">
						<tbody>
							<tr>
								<td class="text-table"><h5><span class="label label-info"><b>Created</b></span></h5></td>
								<td class="text-table">
									{{ $user_info->name }} <br>
									{{ $testplan->created_at }}
								</td>
							</tr>
							<tr>
								<td class="text-table"><h5><span class="label label-info"><b>Updated</b></span></h5></td>

								<td class="text-table">
									{{ $user_info->name }} <br>
									{{ $testplan->updated_at }}
								</td>
							</tr>
							<tr>
								<td>&nbsp</td>
								<td class="text-table">
									<a href="{{ url('/testplans') }}" title="">Back to Dashboard</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="label label-primary"><b>List Test case of Plan</b></span></h3>
					<div class="icon">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myAddModal">
							<i class="fa fa-plus fa-3x"></i>
						</button>
					</div>
				</div>
				<div class="panel-body">
					@if (count($testcases) > 0)
					<table class="table table-striped table-hover testcases-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Status</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt = 1; ?>
							@foreach ($testcases as $testcase)
							<tr>
								<td class="text-table">
									<a href="{{ url('/testcase/show/'.$testcase->id) }}">
										<div>{{ $stt }}</div>
									</a>
								</td>
								<td class="text-table">{{ $testcase->title}}</td>
								<td>
									@if ($testcase->status->status == 'Pass')
									<h4><span class="label label-success"><b>Pass</b></span></h4>
									@elseif($testcase->status->status == 'Fail')
									<h4><span class="label label-danger"><b>Failed&nbsp&nbsp&nbsp&nbsp</b></span></h4>
									@elseif($testcase->status->status == 'Retest')
									<h4><span class="label label-warning"><b>Retest&nbsp&nbsp</b></span></h4>
									@else
									<h4><span class="label label-default"><b>Untest&nbsp&nbsp</b></span></h4>
									@endif
								</td>
								<td>
									<form action="{{ url('/testplans/'.$testplan->id.'/delete/'.$testcase->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-link">
											<i class="fa fa-times fa-2x" style="color: rgba(191, 14, 14, 0.71);"></i>
										</button>
									</form>
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
	</div>
	<!-- Modal Add Testcase-->
	<div class="modal fade" id="myAddModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Select Test Case </h4>
				</div>
				<div class="modal-body">
					<form action="{{ url("/testplans/".$testplan->id."/add/testcases") }}" method="POST" id="form_testcases">
						{{ csrf_field() }}
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Check: <a href="#" onClick="select_all('tetscase', '1');"> All |</a><a href="#" onClick="select_all('tetscase', '0');"> None</a></th>
									<th>ID</th>
									<th>Title</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($testcase_notIns as $testcase_not)
								<tr class="table-text">
									<td><input type="checkbox" name="tetscase[]" value="{{ $testcase_not->id }}"></td>
									<td>{{ $testcase_not->id }}</td>
									<td>{{ $testcase_not->title }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection