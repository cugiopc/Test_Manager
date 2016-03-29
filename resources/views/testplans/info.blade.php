@extends('layouts.app')
@section('content')
<style type="text/css" media="screen">
	#sp{
		margin-top: 10px;
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
					<div class="row">
						<div class="col-sm-2">
							<h4><span class="label label-info">Name</span></h4>	
						</div>
						<div class="col-sm-10 text-left">
							<h4>{{ $testplan->name }}</h4>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-2">
							<h4><span class="label label-info">Descriptions</span></h4>	
						</div>
						<div class="col-sm-10 text-left">
							<h4>{{ $testplan->descriptions }}</h4>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-2">
							<h4><span class="label label-info">Progress</span></h4>	
						</div>
						<div class="col-sm-10">
							<div id="sp"></div>
							
								<div class="progress">
								  	<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:{!! $progress[0] or '0'  !!}%">
								    	{!! isset($progress[0]) ? round($progress[0]) : '0'  !!}% Pass
								  	</div>
								  	<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width:{!! $progress[1] or '0' !!}%">
								    	{!! isset($progress[1]) ? round($progress[1]) : '0'  !!}% Failed
								  	</div>
								  	<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" style="width:{!! $progress[2] or '0' !!}%">
								    	{!! isset($progress[2]) ? round($progress[2]) : '0'  !!}% Retest
								  	</div>
								  	<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:{!! $progress[3] or '0' !!}%">
								    	{!! isset($progress[3]) ? round($progress[3]) : '0'  !!} % Untest
								  	</div>
								</div>
  							
						</div>
					</div>
					
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
								<td><a href="{{ url('/testplans/edit/'.$testplan->id) }}">Edit this Testplan</td>
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
				</div>
				<div class="panel-body">
					@if (count($testcases) > 0)
						<table class="table table-striped table-hover testcases-table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							<?php $stt = 1; ?>
								@foreach ($testcases as $testcase)
									<tr>
										<td class="text-table">
											<a href="{{ url('/testcase/show/'.$testcase->id) }}">
											<div>{{ $stt}}</div>
										</a>
										</td>
										<td class="text-table">{{ $testcase->title}}</td>
										<td>
											@if ($testcase->status->status == 'Pass')
												<h4><span class="label label-success"><b>Pass</b></span></h4>
											@elseif($testcase->status->status == 'Fail')
												<h4><span class="label label-danger"><b>Failed&nbsp&nbsp&nbsp</b></span></h4>
											@elseif($testcase->status->status == 'Retest')
												<h4><span class="label label-warning"><b>Retest&nbsp</b></span></h4>
											@else
												<h4><span class="label label-default"><b>Untest&nbsp</b></span></h4>
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
	</div>
	
</div>
@endsection