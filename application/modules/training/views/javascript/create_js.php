<script>
	function validate() {
        var form = $("#form");  
        var submit = $("#form .btn-submit");

        $(form).validate({
            errorClass      : 'invalid',
            errorElement    : 'em',

            highlight: function(element) {
                $(element).parent().removeClass('state-success').addClass("state-error");
                $(element).removeClass('valid');
            },

            unhighlight: function(element) {
                $(element).parent().removeClass("state-error").addClass('state-success');
                $(element).addClass('valid');
            },
            //rules form validation
            rules:
            {
                title:
                {
                    required: true,
                },
            },
            //messages
            messages:
            { },
            //ajax form submition
            submitHandler: function(form)
            {
                tinyMCE.triggerSave();
                $(form).ajaxSubmit({
                    dataType: 'json',
                    beforeSend: function()
                    {
                        $(submit).attr('disabled', true);
                        $('.loading').css("display", "block");
                    },
                    success: function(data)
                    {
                        //validate if error
                        $('.loading').css("display","none");
                        if(data['is_error'] == true) {
                            swal("Oops!", data['error_msg'], "error");
                            $(submit).attr('disabled', false);
                        } 
                        else {
                            //succes
                            $.smallBox({
                                    title: '<strong>' + data['notif_title'] + '</strong>',
                                    content: data['notif_message'],
                                    color: "#659265",
                                    iconSmall: "fa fa-check fa-2x fadeInRight animated",
                                    timeout: 1000
                                }, function() {
                                if(data['redirect_to'] == "") {
                                    $(form)[0].reset();
                                    $(submit).attr('disabled', false);
                                } else {
                                    
                                   location.href = data['redirect_to'];
                                }
                            });
                        }                   
                    },
                    error: function() {
                        $('.loading').css("display","none");
                        $(submit).attr('disabled', false);
                    }
                });
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent());
                swal("Oops", "Something went wrong.", "error");
            },
        });
    }

    function tinymceinit() {
        var url = "<?= site_url(); ?>";
        tinymce.init({
            selector: '.tinymce',
            menubar: false,
            allow_script_urls: true,
            directionality : 'ltr',
            plugins: [
              "code fullscreen preview table visualblocks contextmenu responsivefilemanager link image media",
              "table hr textcolor lists "
            ],
            height: 400,
            toolbar1: "bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | styleselect formatselect fontsizeselect arabic",
            toolbar2: "link unlink image responsivefilemanager media code | bullist numlist outdent indent | removeformat table hr",
            image_advtab: true ,
            extended_valid_elements: "a[href|onclick]",
            external_filemanager_path: url +"/assets/js/plugins/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : url +"/assets/js/plugins/filemanager/plugin.min.js"},
            media_url_resolver: function (data, resolve/*, reject*/) {
                if (data.url.indexOf('youtube') !== -1) {
                    var id_youtube = getIdYoutube(data.url);
                    var embedHtml = "<div class='embed-responsive embed-responsive-16by9'>" +
                                        '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' + id_youtube + '" allowfullscreen></iframe>'+
                                    "</div>";
                    resolve({html: embedHtml});
                } else {
                    resolve({html: ''});
                }
            }
        });
    }

    function readUrl(input) {
        if(input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#imgprev").attr('src',e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img").change(function() {
        readUrl(this);
    });
    
    $(document).ready(function() {
        tinymceinit();
        var url = "<?= site_url() ?>";

        $("#addimage").click(function () {
            var image_size = $(this).data("maxsize");
            var words_max_upload = $(this).data("maxwords");
            imageCropper ({
                target_form_selector : "#form",
                file_input_name : "image_file",
                data_crop_name : "data_image",
                image_ratio : 1680/900,
                button_trigger_selector : "#addimage",
                image_preview_selector : ".add-image-preview",
                placeholder_path : url+ "assets/img/placeholder/1024x600.png",
                max_file_size : image_size,
                words_max_file_size : words_max_upload,
            });
        });

        $(".datepickers").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            }
        );

        $(".klik").click(function(){
            // e.preventDefault();
            $("#img").show();
        });


        validate();
        $(function () {
            $('.datetimepicker1').datetimepicker();
        });
    });

</script>