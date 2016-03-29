@extends('layouts.app')
@section('title')
-- All Test Case
@endsection
@section('content')
<style type="text/css" media="screen">
	.button {
		position: relative;
		float: right; 
		margin-top: -48px;
		margin-right: -15px;
	} 
	a:hover{
		text-decoration: none;
	};
</style>
<script type="text/javascript">
        function confrim_delete(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
</script>
<div class="container">
	<div class="col-sm-offset-1 col-sm-10">
		<div class="panel panel-default">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<span><h4>List Test Case</h4></span>
					<span class="button">
						<form action="{{ url('/testcase/new') }}" method="GET">
							<button class="btn btn-primary" type="submit">
								<i class="fa fa-plus-circle fa-3x"></i>
							</button>
						</form>
					</span>
				</div>
				@if (count($testcases) > 0)
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
										<a href="{{ url('/testcase/show/'.$testcase->id) }}">
											<div>{{ substr($testcase->title, 0, 20)  }}</div>
										</a>
									</td>
									<td class="text-table">
										<div>
											{{ substr($testcase->descriptions, 0,30)  }}
										</div>
									</td>
									<!--Edit Button-->
									<td class="text-table text-center">
										<form action="{{ url('/testcase/'.$testcase->id) }}" method="GET">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-info">
												<i class="fa fa-pencil-square-o"></i>&nbspEdit
											</button>
										</form>

									</td>
									<!--Delete Button-->
									<td class="text-table text-center">
										<form action="{{ url('testcase/'.$testcase->id) }}" method="POST">
											{!! csrf_field() !!}
											{!! method_field('DELETE') !!}
											<button type="submit" class="btn btn-danger" onclick="return confrim_delete('Are you sure delete this ?')">
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