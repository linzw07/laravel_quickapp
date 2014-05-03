function update_data_ajax(target_div_id, post_data, show_loading){
  $.ajax({
	url: '/update_data_ajax',
	type: 'POST',
	data: post_data,
	beforeSend: function(){
                    if(show_loading=='yes'){
                            $('#'+target_div_id).empty();
                            new Spinner(opts).spin(document.getElementById(target_div_id));
                    }
		  },
	success: function(data){
	  $('#'+target_div_id).empty();
	  $('#'+target_div_id).html(data);
	},
	error: function() {
	  $('#'+target_div_id).html('<div><strong>Error</strong><br />[target_div_id:/'+target_div_id+'/]<br />[post_data:/'+post_data+'/]<br />[show_loading:/'+show_loading+'/]</div>');
	}
  });
}

function submit_form_ajax(form_id, target_div_id, show_loading){
	
  var post_data = $("#"+form_id).serialize();
  $.ajax({
	url: '/_dowebs/ajax/dowebs_ajax.asp',
	type: 'POST',
	data: post_data,
	beforeSend: function(){
				if(show_loading=='yes'){
					$('#'+target_div_id).empty();
					new Spinner(opts).spin(document.getElementById(target_div_id));
				}
		  },
	success: function(data){
	  $('#'+target_div_id).empty();
	  $('#'+target_div_id).html(data);
	},
	error: function() {
	  $('#'+target_div_id).html('<div><strong>Error</strong><br />[form_id:/'+form_id+'/]<br />[target_div_id:/'+target_div_id+'/]<br />[post_data:/'+post_data+'/]<br />[show_loading:/'+show_loading+'/]</div>');
	}
  });
}