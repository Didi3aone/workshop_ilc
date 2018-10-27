<script>
    $(document).ready( function() {

        // var start_date = $("#start").val();
        // var end_date   = $("#end").val();

        // if( end_date < start_date )
        // {
        //     $.notify({
        //         title: "<strong>Warning !!!</strong>",
        //         message: "Please check interval date",
        //     }, {
        //         type: 'danger' 
        //     })
        // }

        $('#Carousels').carousel({
            interval: 3000
        });

        $('#myCarousel').carousel({
            interval: 5000
        });

        $(".datepicker").datepicker();

        $('.submit-save').click(function(e) {
            e.preventDefault();
            var form = $('#forms');
     
            $.ajax({
                url:"<?php echo site_url('register/process_form'); ?>",
                type:'post',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log(response['error_msg']);
                    if (response['is_error'] == true) {
                        var message = response['error_msg'];
                        // console.log(message);
                        $.notify({
                            title: "<strong>Error</strong>",
                            message: message,
                        }, {
                            type: 'danger' 
                        })
                    } else {
                        var message = response['notif_message'];

                        $.notify({
                            title: "<strong>Success</strong>",
                            message: message,
                        }, {
                            type: 'success' ,
                            allow_dismiss: false
                        })

                        setTimeout(function() {
                            // $.notifyClose();
                            location.reload();
                        }, 8000);
                         $('button').attr("disabled",true);
                        // swal("Good job!", response['error_msg'], "success")
                    }
                }, error: function(xhr) {
                    $.notify({
                        title: "<strong>Warning !!!</strong>",
                        message: "Silahkan Isi form terlebih dahulu",
                    }, {
                        type: 'danger' 
                    })
                }
            })
        })

    });
    $('input:checkbox').change(function(){
        if($(this).is(":checked")) {
            $('button').removeAttr("disabled");
        } else {
            $('button').attr("disabled",true);
        }
    });

    function change() {
        $('input').val('');
    }


    function ref() {
        location.href="<?= site_url('training'); ?>";
    }
</script>