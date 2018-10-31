<?php
    $id             = isset($datas["cont_id"]) ? $datas["cont_id"] : "";
    $hp             = isset($datas["cont_hp"]) ? $datas["cont_hp"] : "";
    $telp           = isset($datas["cont_telp"]) ? $datas["cont_telp"] : "";
    $email          = isset($datas["cont_email"]) ? $datas["cont_email"] : "";
    $link           = isset($datas["cont_maps"]) ? $datas["cont_maps"] : "";
    $desc           = isset($datas["cont_address"]) ? $datas["cont_address"] : "";

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
                        <h2>Form About</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <form id="form" class="smart-form" method="POST" action="<?= site_url('manager/setting/process_form_contact') ?>">
                            <?php if($id != 0): ?>
                                <input type="hidden" name="id" value="<?= $id ?>" />
                            <?php endif; ?>
                            <fieldset>
                                
                                <section>
                                    <label class="label">Hp</label>
                                    <label class="input">
                                        <input type="text" name="hp" value="<?= $hp; ?>" placeholder="Hp">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Telp</label>
                                    <label class="input">
                                        <input type="text" name="telp" value="<?= $telp; ?>" placeholder="No Telephone">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Email</label>
                                    <label class="input">
                                        <input type="text" name="email" value="<?= $email; ?>" placeholder="Email">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Link maps</label>
                                    <label class="input">
                                        <input type="text" name="link" value="<?= $link; ?>" placeholder="Link Maps">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Address</label>
                                    <label class="textarea">
                                        <textarea name="desc" class="tinymce"><?= $desc; ?></textarea>
                                    </label>
                                </section>

                                <footer>
									<button type="submit" class="btn btn-submit btn-primary"> <i class="fa fa-save"></i>
										<?= $btn_msg; ?>
									</button>
									<a href="<?= site_url() ?>manager/setting/tautan-list" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
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