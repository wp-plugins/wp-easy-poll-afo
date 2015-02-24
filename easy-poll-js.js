function LoadPollResult(p){
	jQuery('#poll_'+p).hide();
	jQuery('#poll_ans_'+p).show();
}

function LoadPollForm(p){
	jQuery('#poll_ans_'+p).hide();
	jQuery('#poll_'+p).show();
}

function updatePollStatus(){
	jQuery.ajax({
	type: "POST",
	data: { action: "updatePollStatus", p_status: jQuery('#p_status').val(), p_id: jQuery('#p_id').val() }
	})
	.done(function( res ) {
		alert(res);
	});
}