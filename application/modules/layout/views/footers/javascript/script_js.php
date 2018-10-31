<script>
    $(document).ready( function() {

        $('.button-submited').click(function(e) {
            e.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var content = $("#content").val();

            if( name == "") {
                $.notify({
                    title: "<strong>Warning !!!</strong>",
                    message: "Nama tidak boleh kosong",
                }, {
                    type: 'danger' 
                })
            } else if( email == "") {
                $.notify({
                    title: "<strong>Warning !!!</strong>",
                    message: "Email tidak boleh kosong",
                }, {
                    type: 'danger' 
                })
            } else if( subject == "" ) {
                $.notify({
                    title: "<strong>Warning !!!</strong>",
                    message: "Subject tidak boleh kosong",
                }, {
                    type: 'danger' 
                })
            } else if( content == "") {
                $.notify({
                    title: "<strong>Warning !!!</strong>",
                    message: "Pesan tidak boleh kosong",
                }, {
                    type: 'danger' 
                })
            }  else {

                var data = $("#forms").serialize();
                var url = "<?= site_url('setting/save_form_contact'); ?>";
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType :'json',
                    success:function( response ) {
                        console.log(response);
                        if( response['is_error'] == true ) {
                            $.notify({
                                title: "<strong>Warning !!!</strong>",
                                message: "Silahkan Isi form terlebih dahulu",
                            }, {
                                type: 'danger' 
                            })
                        } else {
                            var message = response['notif_msg'];
                            var title = response['notif'];
                            $.notify({
                                title: "<strong>"+ title +" !!!</strong>",
                                message: message,
                            }, {
                                type: 'success' ,
                                allow_dismiss: false
                            })

                            $("#forms")[0].reset();
                        }
                    },error:function(xhr) {
                        console.log(xhr);
                    }
                })
            }
        })

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

    $(".btn-subcribe").click(function(e) {
        e.preventDefault();
        var url = "<?= site_url('contact/form_subscribe'); ?>";

        var email = $("#email").val();

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                email : email 
            },
            dataType:'json',
            success: function (response) {
                if( response['is_error'] == true) {
                    $.notify({
                        title: "<strong>Warning !!!</strong>",
                        message: response['error_msg'],
                    }, {
                        type: 'danger' 
                    })
                } else {
                    $.notify({
                        title: "<strong>"+ response['notif'] +" !!!</strong>",
                        message: response['notif_msg'],
                    }, {
                        type: 'success' ,
                        allow_dismiss: false
                    })
                    $("#email").val('');
                }
            },error: function (xhr) {
                console.log(xhr)
            }
        })
    })

    $('input:checkbox').change(function(){
        if($(this).is(":checked")) {
            $('#sbutton').removeAttr("disabled");
        } else {
            $('#sbutton').attr("disabled",true);
        }
    });

    function change() {
        $('input').val('');
    }


    function ref() {
        location.href="<?= site_url('training'); ?>";
    }

</script>