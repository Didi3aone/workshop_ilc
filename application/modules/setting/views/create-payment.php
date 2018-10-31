<?php
    $id             = isset($datas["payment_id"]) ? $datas["payment_id"] : "";
    $name           = isset($datas["payment_bank"]) ? $datas["payment_bank"] : "";
    $desc           = isset($datas["payment_desc"]) ? $datas["payment_desc"] : "";
    $img            = isset($datas["payment_image"]) ? $datas["payment_image"] : "";
    // pr($type_id);
    $btn_msg = ($id == 0) ? "Create" : " Update";
    $title_msg = ($id == 0) ? "Create" : " Update";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
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
                        <h2>Form Tutorial</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <form id="form" class="smart-form" method="POST" action="<?= site_url('manager/setting/process_form_payment') ?>">
                            <?php if($id != 0): ?>
                                <input type="hidden" name="id" value="<?= $id ?>" />
                            <?php endif; ?>
                            <fieldset>
                                
                                <section>
                                    <label class="label">Payment Bank <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="name" value="<?= $name; ?>" placeholder="Tutorial Name">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Payment Image <sup class="color-red">*</sup></label>
                                    <label class="input">
                                    	<?php 
                                    		if( !empty($img) ) : ?>
                                    			<img src="<?= base_url($img); ?>" alt="">
                                    			<button type="button" class="btn btn-primary klik">Change</button>
                                    			<input type="file" id="img" style="display: none;" name="real_image">
                                    			<?php else : ?>
	                                        <input type="file" name="real_image">
		                                    <?php endif;
                                    	?>
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Deskripsi</label>
                                    <label class="textarea">
                                        <textarea name="desc" class="tinymce"><?= $desc; ?></textarea>
                                    </label>
                                </section>

                                <footer>
									<button type="submit" class="btn btn-submit btn-primary"> <i class="fa fa-save"></i>
										<?= $btn_msg; ?>
									</button>
									<a href="<?= site_url() ?>manager/training" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
								</footer>

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