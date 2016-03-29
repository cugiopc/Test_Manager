@extends('layouts.app')
@section('content')
<style type="text/css" media="screen">
	.button {
		position: relative;
		float: right; 
		margin-top: -7px;
	} 
</style>
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				@if (count($testcases) > 0)
					<div class="panel panel-default">
						<div class="panel-heading">
							<span>List Test Case</span>
							<span class="button">
								<form action="{{ url('/testcase/new') }}" method="GET">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-plus-circle fa-1x"></i>
									</button>
								</form>
							</span>
						</div>
						<div class="panel-body">
							<table class="table table-striped testcase-table">

							<!-- Table Heading-->
								<thead>
									<tr>
									    <th>Title</th>
									    <th>Description</th>
									    <th>&nbsp</th>
										<th>&nbsp</th>
									</tr>
								</thead>
							<!-- Table body-->
								<tbody>
								@foreach ($testcases as $testcase)
									<tr>
										<td class="text-table">
											<div>{{ $testcase->title }}</div>
										</td>
										<td class="text-table">
											<div>
												{{ $testcase->descriptions }}
											</div>
										</td>
										<!--Edit Button-->
										<td>
											<form action="{{ url('/testcase/edit/'.$testcase->id) }}" method="POST">
												{!! csrf_field() !!}
												{!! method_field('POST') !!}
												<button type="submit" class="btn btn-info">
													<i class="fa fa-pencil-square-o"></i>Edit
												</button>
											</form>

										</td>
										<!--Delete Button-->
										<td>
											<form action="{{ url('testcase/'.$testcase->id) }}" method="POST">
												{!! csrf_field() !!}
												{!! method_field('DELETE') !!}
												<button type="submit" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection