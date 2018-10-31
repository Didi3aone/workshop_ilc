<?php
    $name    = ($contact['name']) ? $contact['name'] : "";
    $email   = ($contact['email']) ? $contact['email'] : "";
    $subject = ($contact['subject']) ? $contact['subject'] : "";
    $desc    = ($contact['content']) ? $contact['content'] : "";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row"> 
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
			<h1>
                <a class="btn btn-warning back-button" href="<?= site_url('manager/contact'); ?>" title="Back" rel="tooltip" data-placement="left" data-original-title="Batal">
					<i class="fa fa-arrow-circle-left fa-lg"></i>
				</a>
			</h1>
		</div>
	</div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <article class="col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0"
                data-widget-editbutton="false"
                data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2>Detail</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <form class="smart-form" id="form" action="<?= site_url(); ?>manager/user/process_form" method="post">
                            <fieldset>
                                <div class="row">
	                                <section class="col col-6">
	                                    <label class="label">Nama <sup class="color-red">*</sup></label>
	                                    <label class="input">
	                                        <input type="text" name="name" value="<?= $name ?>" placeholder="Admin Name">
	                                    </label>
	                                </section>

                                    <section class="col col-6">
                                        <label class="label">Email <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="text" name="email" value="<?= $email ?>" placeholder="Email">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Subject <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="text" name="username" value="<?= $subject ?>" placeholder="Username">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-8">
                                        <label class="label">Isi Pesan <sup class="color-red">*</sup></label>
                                        <label class="textarea">
                                            <textarea name="" rows="40"><?= $desc; ?></textarea>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </article>
        </div>
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT -->
