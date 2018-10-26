<style type="text/css" media="screen">
		/* banner */
		.banner-w3ls-1,
		.banner-w3ls-2,
		.banner-w3ls-3,
		.banner-w3ls-4,
		.banner-w3ls-5,
		.banner-agile {
		    min-height: 700px;
		}
		<?php
			$image = $this->Dynamic_model->set_model("tbl_background_slider")->get_all_data(array(
				"conditions" => array("status")
			))['datas']; 
			$url = base_url('assets/frontend/images/banner1.jpg');

		?>
		.banner-w3ls-1 {
		    background: url(<?= $url; ?>) no-repeat center;
		    background-size: cover;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -ms-background-size: cover;
		    background-attachment: fixed;
		}

		.banner-w3ls-2 {
		    background: url(../../frontend/images/banner2.jpg) no-repeat center;
		    background-size: cover;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -ms-background-size: cover;
		    background-attachment: fixed;
		}

		.banner-w3ls-3 {
		    background: url(../../frontend/images/banner3.jpg) no-repeat center;
		    background-size: cover;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -ms-background-size: cover;
		    background-attachment: fixed;
		}

		.banner-w3ls-4 {
		    background: url(../../frontend/images/banner4.jpg) no-repeat center;
		    background-size: cover;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -ms-background-size: cover;
		    background-attachment: fixed;
		}

		.banner-w3ls-5 {
		    background: url(../../frontend/images/banner5.jpg) no-repeat center;
		    background-size: cover;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -ms-background-size: cover;
		    background-attachment: fixed;
		}
	</style>