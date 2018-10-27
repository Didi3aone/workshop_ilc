<script>
	$(document).ready(function() {
		$('.submit-save').click(function(e) {
	        e.preventDefault();
	        var form = $('form');
	 
	        $.ajax({
	            url:"<?php echo site_url('user/process_form'); ?>",
	            type:'post',
	            data: form.serialize(),
	            dataType: 'json',
	            success: function(response) {
	                console.log(response['alert_error']);
	                if (response['alert_error'] == true) {
	                    var message = response['error_msg'];
	                    // console.log(message);
	                    $.notify({
	                        title: "<strong>Error</strong>",
	                        message: message,
	                    }, {
	                        type: 'danger' 
	                    })
	                } else {
	                    //success.
	                    swal("Success !!!", response['error_msg'], "success")
	                    setTimeout(function() { 
	                        location.href = "<?php echo site_url('login'); ?>"; 
	                    }, 3000);
	                   
	                    // swal("Good job!", response['error_msg'], "success")
	                }
	            }, error: function(jqxhr, status, exception) {
	                alert('Exception:', exception);
	            }
	        })
	    })
	});
</script>