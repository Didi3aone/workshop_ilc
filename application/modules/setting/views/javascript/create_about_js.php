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
        external_filemanager_path: url +"assets/js/plugins/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : url +"assets/js/plugins/filemanager/plugin.min.js"},
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
$(document).ready(function() {
    tinymceinit();
    validate();
});

</script>