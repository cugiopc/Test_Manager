<div class="panel panel-info">
	<div class="panel-heading">
		<h4>{!! $testcase->title !!}</h4>
	</div>
	<div class="panel-body">

		<div class="title"><h5><b>Preconditions</b></h5></div>
		<div class="content">
			<p>{!! $testcase->preconditions  !!}</p>
		</div>
		<hr>
		<div class="title"><h5><b>Steps</b></h5></div>
		<div class="content">
			<p>{!! $testcase->steps !!}</p>
		</div>
		<hr>
		<div class="title"><h5><b>Expected Result</b></h5></div>
		<div class="content">
			<p>{!! $testcase->expected_result !!}</p>
		</div>
		<hr>
		<!-- Add Comments -->
		<div class="title"><h5><b>Results and Comment</b></h5></div>

		<br>
		<!-- Comments List -->
		<table class="table table-condensed table-hover table-boder" id="tb_cmt">
			<tbody>
				@foreach ($testcase->comments as $comment)
				<tr id="comment">
					<td style="background: #f0f5f5;" class="author">
						<h5><span class="label label-info">Comment</span></h5>
						{!! $comment->user->name !!} <br>
						{!! $comment->created_at !!}
					</td>
					<td>{!! $comment->comment !!}</td>
				</tr>
				@endforeach
				@if ($testcase->status->status != 'Untest')
				<tr id="result">
					<td style="background: #f0f5f5;" class="author">
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
					<td>
						<span><h5><b style="color: red;"><ins>Actualy Result :</ins></b></h5></span>{!! $testcase->actualy_result !!}
					</td>
				</tr>
				@endif
			</tbody>
		</table>
		<form action="javascript:void(0);" method="GET" role="form" id="addCommentFrm">
			{!!csrf_field() !!}
			<div class="form-group">
				<input type="hidden" name="case_id" id="case_id" value="{!! $testcase->id !!}">
				<input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}"> 
				<textarea class="form-control" id="comment" name="comment" placeholder="Enter comment here...." rows="4" required></textarea>
			</div>					
			<button type="submit" name="submit" class="btn btn-success btn-xs">Add comment</button>
		</form>
		<hr>
		<div class="result">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddResult"> <i class="fa fa-plus"></i>&nbsp Add Result</button>
			<!-- Modal -->
			<div class="modal fade" id="modalAddResult" role="dialog">
				<div class="modal-dialog modal-md">
					<!-- Modal content-->
					<form action="javascript:void(0);" method="GET" id="frm_add_result" role="form">
						{!!csrf_field() !!}
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Testcase Result</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="hidden" name="case_id" id="case_id" value="{!! $testcase->id !!}">
									<input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}"> 
									<label for="status">Status <span style="color: red;">*</span></label>
									<select id="status" name="status" class="form-control" required>
										<option value="1" @if($testcase->id_status == 1) selected @endif>Pass</option>
										<option value="2" @if($testcase->id_status == 2) selected @endif>Fail</option>
										<option value="3" @if($testcase->id_status == 3) selected @endif>Retest</option>
										<option value="4" @if($testcase->id_status == 4) selected @endif>Untest</option>
									</select>
								</div>
								<div class="form-group">
									<label for="actualy">Actualy result</label>	
									<textarea name="actualy" id="actualy" class="form-control" rows="4" required></textarea>					
								</div>								
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp Add result</button>
								<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp Cancel</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>