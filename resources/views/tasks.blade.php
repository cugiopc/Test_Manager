@extends('layouts.app');
@section('content')

	<div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

				<div class="panel-body">
					<!-- Display Validation Errors-->
					@include('common.errors')
					
					<!-- New Taks Form-->
					<form action="{{ url('task') }}" method="POST" accept-charset="utf-8" class="form-horizontal">
						{!! csrf_field() !!}

						<!-- Task name -->
						<div class="form-group">
							<label for="task" class="col-sm-3 control-label">Task</label>
							<div class="col-sm-6">
								<input type="text" name="name" id="task-name" placeholder="Enter tasks" class="form-control" value="{{ old('name') }}">
							</div>
						</div>

						<!-- Add Task Button-->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i> Add task
								</button>
							</div>
						</div>
					</form>
				</div>

					<!-- TODO: Current Tasks -->
				@if (count($tasks) > 0)
					<div class="panel panel-default">
						<div class="panel-heading">
							Current Tasks
						</div>
						
						<div class="panel-body">
							<table class="table table-striped task-table">
							<!-- Table Heading-->
								<thead>
									<tr>
										<th>Task</th>
										<th>&nbsp</th>
									</tr>
								</thead>

								<!-- Table body-->
								<tbody>
									@foreach ($tasks as $task)
										<tr>
											<!--Task name -->
											<td class="table-text">
												<div>{{ $task->name }}</div>
											</td>
											
											<!-- Delete Button -->
											<td>
												<form action="{{ url('task/'.$task->id) }}" method="POST" >
													{!! csrf_field() !!}
													{!! method_field('DELETE') !!}
													<button type="submit" class="btn btn-danger">
														<i class="fa fa-trash"></i> Delete
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