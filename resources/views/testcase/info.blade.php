@extends('layouts.app')
@section('title')
	-- Edit Test case
@endsection
@section('content')
<style type="text/css" media="screen">
	.button {
		position: relative;
		float: right; 
		margin-top: -11px;
		margin-right: -15px;
	} 
</style>
<div class="container">
<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<b>Test Case Info</b>
			</div>
			<div class="panel-body">
				<!-- Display Validations Errors-->
				@include('common.errors')
				
				<!-- New Test Case Form-->
				<form action="" method="POST" class="form-horizontal" id="testcase-form">
					<div class="form-group">
						<label for="status" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							<input type="text" name="status" id="status" placeholder="" class="form-control" value="{{ $status->status }}" readonly>
						</div>
					</div>
					<!-- Test case Title-->
					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-10">
							<input type="text" name="title" id="title" placeholder="" class="form-control" value="{{ $testcase->title }}" readonly>
						</div>
					</div>
					<!-- Test case descriptions-->
					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<textarea name="description" id="description" placeholder="" class="form-control" readonly>{{ $testcase->descriptions }}</textarea>
						</div>
						
					</div>
					<!-- Test case Precondition-->
					<div class="form-group">
						<label for="precondition" class="col-sm-2 control-label">Precondition</label>
						<div class="col-sm-10">
							<textarea name="precondition" id="precondition" placeholder="" class="form-control" readonly>{{ $testcase->preconditions }}</textarea>
						</div>
					</div>
					<!-- Test case Steps-->
					<div class="form-group">
						<label for="steps" class="col-sm-2 control-label">Steps</label>
						<div class="col-sm-10">
							<textarea name="steps" id="steps" placeholder="" class="form-control" rows="4" readonly>{{ $testcase->steps }}</textarea>
						</div>
					</div>
					<!-- Test case Expect Result-->
					<div class="form-group">
						<label for="expected_result" class="col-sm-2 control-label">Expect Result</label>
						<div class="col-sm-10">
							<textarea name="expected_result" id="expected_result" placeholder="" class="form-control" readonly>{{ $testcase->expected_result }}</textarea>
						</div>
					</div>
					<!--Test case Actualy Result-->
					<div class="form-group">
						<label for="expected_result" class="col-sm-2 control-label">Actualy Result</label>
						<div class="col-sm-10">
							<textarea name="expected_result" id="expected_result" placeholder="" class="form-control" readonly>{{ $testcase->actualy_result }}</textarea>
						</div>
					</div>
					<!--Comment-->
					<div class="form-group">
						<label for="expected_result" class="col-sm-2 control-label">Comments</label>
						<div class="col-sm-10">
							<ul>															
								@foreach ($comments as $comment)									
									<li>{{ $comment ->comment}}</li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- Back Button-->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="{{ URL::previous() }}">
								<button type="button" class="btn btn-danger" formaction="">
									<i class="fa fa-arrow-left"></i>&nbsp</i>  Back
								</button>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<b>People & Dates</b>
			</div>
			<div class="panel-body">
				<div>
					<table class="table">
						<tbody>
							<tr>
								<td><b>Created</b></td>
								<td>
									{{ $user_info->name }} <br>
									{{ $testcase->created_at }}
								</td>
							</tr>
							<tr>
								<td><b>Updated</b></td>

								<td>
									{{ $user_info->name }}  <br>
									{{ $testcase->updated_at }}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection