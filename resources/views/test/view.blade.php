@extends('layouts.app')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<style type="text/css" media="screen">
	.stick{
		position:fixed;
		top:5px;
		float: right;
		margin-left: 50%;
	}
	#sticker{
		overflow-y: auto;
		height: 100%;
	}
	#tb_cmt tr{
		height: 60px; 
	}
	#tb_cmt .author{
		width: 125px; 
	}
	.color_pick{
		color: yellow;
	}
	.pre-scrollable{
		max-height: 50%;
	}

</style>
<div class="container-fluid ">
	<div class="row">
		<!-- Content of Testplan header and Testcases list -->
		<div class="col-sm-6"> 
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>
						{{ $testplan->name }}
					</h4>
				</div>
				<div class="panel-body">
					<div class="description">
						{{ $testplan->descriptions }}
					</div>
				</div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Test cases ({!! $testcases->count() !!})</h4>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Status</th>
							</tr>
						</thead>
						<?php $stt = 1; ?>
						@foreach ($testcases as $testcase)
						<tr>	
							<td><a href="{!! url('testcase/show/'.$testcase->id) !!}"  name="caseID"> {!! $stt++ !!}</a></td>
							<td>
								<a href="javascript:void(0);" val="{!! $testcase->id !!}" type="button" id="caseID">{!! $testcase->title !!}</a>
							</td>
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
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Content of each testcase-->
	<div class="col-sm-6 pre-scrollable" id="sticker">
		@include('test.testcase_detail', ['testcase' => $testcases[0]])
	</div>
</div>
</div>
@stop