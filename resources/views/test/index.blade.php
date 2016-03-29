@extends('layouts.app')
@section('content')
<style>
	.author{
		margin-top: 17px;
		font-size: 1.0em;
	}
	.result{
		margin-top: 10px;
		font-size: 1.1em;
	}
</style>
<div class="container">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><span class="label label-primary">Test Runs & Results</span></h3>
			</div>
			<div class="panel-body">
				<hr>
				@foreach ($testplans as $testplan)
				<div class="row">
					<!-- Info of each Testplans-->
					<div class="col-sm-7">
						<div id="run-">
							<div class="title">
								<h4><b> <a href="{{ url('/runs/view/'.$testplan->id) }}" title="">{{ $testplan->name }}</a></b></h4>
							</div>
							<div class="author">
								By {{ $testplan->user->name }} on {{ date("d/m/Y",strtotime($testplan->created_at)) }}
							</div>
							<div class="result">
								<?php
								$success = 0;
								$fail = 0;
								$retest = 0;
								$untest = 0;
								$testcases = $testplan->testcases;
								$all = $testcases->count();
								foreach ($testcases as $tetscase) {
									switch ($tetscase->id_status) {
										case '1':
										$success++;
										break;
										case '2':
										$fail++;
										break;
										case '3':
										$retest++;
										break;
										case '4':
										$untest++;
										break;
									}
								}
								if ($all != 0) {
									$progress = (($success+$fail+$retest) / $all)*100;
								}
								$result = array($success,$fail,$retest,$untest);
								?>
								{!! $result[0] !!} SUCCESS, {!! $result[1] !!} FAIL, {!! $result[2] !!} RETEST, {!! $result[3] !!} UNTEST
							</div>
						</div>
					</div>
					<div class="col-sm-5">
					<br> 
						<div class="progress">
							<div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" style="width:{!! $progress or '0'  !!}%">
								{!! isset($progress) ? round($progress) : '0'  !!} % progress
							</div>
						</div>
					</div>
				</div>
				<hr>
				<hr> 
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection