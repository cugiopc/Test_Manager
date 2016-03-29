@extends('layouts.app')
@section('title')
	-- Create new Test case
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
	<div class="col-sm-offset-1 col-sm-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				Add new Test Case
			</div>
			<div class="panel-body">
				<!-- Display Validations Errors-->
				@include('common.errors')
				
				<!-- New Test Case Form-->
				<form action="{{ url('/testcase/new') }}" method="POST" class="form-horizontal" id="testcase-form">
					{!! csrf_field() !!}
					{!! method_field('POST') !!}
					<!-- Test case Title-->
					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title <span style="color:red;">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="title" id="title" placeholder="Enter title of test case" class="form-control" value="{{ old('title') }}">
						</div>
						
					</div>
					<!-- Test case descriptions-->
					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<textarea name="description" id="description" placeholder="Enter description of test case" class="form-control">{{ old('description') }}</textarea>
						</div>
						
					</div>
					<!-- Test case preconditions-->
					<div class="form-group">
						<label for="precondition" class="col-sm-2 control-label">Precondition</label>
						<div class="col-sm-10">
							<textarea name="precondition" id="precondition" placeholder="Enter Precondition of test case" class="form-control">{{ old('precondition') }}</textarea>
						</div>
					</div>
					<!-- Test case descriptions-->
					<div class="form-group">
						<label for="steps" class="col-sm-2 control-label">Steps<span style="color:red;">*</span></label>
						<div class="col-sm-10">
							<textarea name="steps" id="steps" placeholder="Enter Steps of test case" class="form-control" rows="4">{{ old('steps') }}</textarea>
						</div>
					</div>
					<!-- Test case descriptions-->
					<div class="form-group">
						<label for="expected_result" class="col-sm-2 control-label">Expect Result</label>
						<div class="col-sm-10">
							<textarea name="expected_result" id="expected_result" placeholder="Enter Expected Result of test case" class="form-control">{{ old('expected_result') }}</textarea>
						</div>
					</div>
					<!-- Add new Test case Button-->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-plus"></i>  Add
							</button>
							&nbsp&nbsp&nbsp&nbsp&nbsp
							<a href="{{ url('testcases') }}">
								<button type="button" class="btn btn-danger" formaction="">
									<i class="fa fa-arrow-left"></i>&nbsp</i>  Cancel
								</button>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection