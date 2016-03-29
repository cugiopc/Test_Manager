@extends('layouts.app')
@section('content')
<style type="text/css" media="screen">
	.add_button {
		position: relative;
		float: right; 
		margin-top:  -55px;
		margin-right: -10px;
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
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="label label-primary">List Test Plans</span></h3>
					<span class="add_button">
						<form action="{{ url('/testplans/create') }}" method="GET">
							{{ csrf_field() }}
							<button class="btn btn-primary" type="submit">
								<i class="fa fa-plus-circle fa-3x"></i>
							</button>
						</form>
					</span>
				</div>
				@if (count($testplans) > 0)
				<div class="panel-body">
					<table class="table table-striped table-hover testplans-table">
						<!-- Table Heading-->
						<thead>
							<tr>
								<th>Name</th>
								<th>Descriptions</th>
								<th>Author</th>
								<th>&nbsp</th>
								<th>&nbsp</th>
							</tr>
						</thead>
						<!-- Table body-->
						<tbody>
							@foreach ($testplans as $testplan)
							<tr>
								{{-- Name --}}
								<td class="text-table">
									<a href="{{ url('/testplans/info/'.$testplan->id) }}">
										<div>{{ substr($testplan->name, 0, 30)  }}</div>
									</a>
								</td>
								{{-- Info --}}
								<td class="text-table"> 
									<div>
										<div>{{ substr($testplan->descriptions, 0, 30)  }}</div>
									</div>
								</td>

								{{-- Author --}}
								<td class="text-table">
									<div>
										By {{ $testplan->user->name }} on {{ date("d/m/Y",strtotime($testplan->created_at)) }}
									</div>
								</td>

								<!--Edit Button-->
								<td class="text-table text-center">
									<form action="{{ url('testplans/edit/'.$testplan->id) }}" method="GET">
										{!! csrf_field() !!}
										<button type="submit" class="btn btn-info">
											<i class="fa fa-pencil-square-o"></i>&nbspEdit
										</button>
									</form>
								</td>

								<!--Delete Button-->
								<td class="text-table text-center">						
									<form action="{{ url('/testplans/delete/'.$testplan->id) }}" method="POST">
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
@stop