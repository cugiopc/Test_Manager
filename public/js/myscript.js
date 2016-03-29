$(document).ready(function() {
	$('a#caseID').on('click', function(){
		var url = "http://localhost/TestcaseManager/public/runs/ajax/demo";
		var _token = $('meta[name="csrf-token"]').attr('content');
		var id = $(this).attr('val');
		$.ajaxSetup({
        	headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});

		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {id: id},
			success: function(data) {
				$('div#sticker').empty();
				$(data).appendTo('div#sticker');
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	})
});

/*
$(document).ready(function() {
	var s = $("#sticker");
	var pos = s.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		//s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
		if (windowpos >= pos.top) {
			s.addClass("stick");
		} else {
			s.removeClass("stick");	
		}
		});
	});
*/
jQuery(document).ready(function($) {
   	$(".clickable-row").on('click', function() {
       window.document.location = $(this).data("href");
    });
});

jQuery(document).ready(function($) {
	$('#addCommentFrm').on('submit', function(e) {
		e.preventDefault();
		/* Act on the event */
		var host = 'http://localhost/TestcaseManager/public/runs';
		var comment = $(this).find('textarea[name="comment"]').val();
		var user_id = $(this).find('input[name="user_id"]').val();
		var case_id = $(this).find('input[name="case_id"]').attr('value');
		var _token = $(this).find('input[name="_token"]').attr('value');
		$.ajaxSetup({
        	headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});

		$.ajax({
			url: host+'/add/comment',
			type: 'GET',
			data: {'_token' : _token,'case_id': case_id, 'comment': comment, 'user_id' : user_id},
			success: function(data){
        		$("table#tb_cmt").append(data);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	
});

jQuery(document).ready(function($) {
	$('#frm_add_result').on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		var host = 'http://localhost/TestcaseManager/public/runs';
		var case_id = $(this).find('input[name="case_id"]').attr('value');
		var user_id = $(this).find('input[name="user_id"]').val();
		var _token = $(this).find('input[name="_token"]').attr('value');
		var status_id = $('#status option:selected').attr('value');
		var actualy_result = $(this).find('textarea[id="actualy"]').val();

		$.ajaxSetup({
        	headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
		});

		$.ajax({
			url: host+ '/add/result',
			type: 'GET',
			data: {case_id: case_id, _token : _token, status_id: status_id, actualy_result: actualy_result, user_id :user_id },
			success: function(data) {
				$('#modalAddResult').modal('hide');
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});