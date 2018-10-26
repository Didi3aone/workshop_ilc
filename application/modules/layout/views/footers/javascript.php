<script>
    $(document).ready(function() {

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        pageSetUp();

        /*
         * PAGE RELATED SCRIPTS
         */
        
        $(".js-status-update a").click(function() {
            var selText = $(this).text();
            var $this = $(this);
            $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
            $this.parents('.dropdown-menu').find('li').removeClass('active');
            $this.parent().addClass('active');
        });
    });

    var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);
    
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
	<!-- load a plugin -->
	<?php
	if(isset($script)) {
	    foreach($script as $value) {
	        echo '<script src="'.base_url($value).'"></script>';
	    }
	}
	?>

	<?php
	if(isset($css)) {
	    foreach($css as $value) {
	        echo '<link href="'.base_url($value).'" rel="stylesheet">';
	    }
	}
	if(isset($script_js)) {
	    $this->load->view($script_js);
	}
	?>
	<!-- end load -->