function LoadPollResult(p){
	jQuery('#poll_'+p).hide();
	jQuery('#poll_ans_'+p).show();
}

function LoadPollForm(p){
	jQuery('#poll_ans_'+p).hide();
	jQuery('#poll_'+p).show();
}