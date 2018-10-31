<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title; ?></h1>
		</div>
          <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
            <h1>
                <a class="btn btn-warning" href="<?= site_url(); ?>manager/register" rel="tooltip" title="Back" data-placement="left">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </h1>
        </div>
	</div>
<!-- 	<p>
		<img src="<?php// base_url(); ?>assets/frontend/img/ilc.jpeg" alt="" align="left" width="130">
		<h1 class="well" style="background-color: red; color: white; margin-left: 13%">FORMULIR PENDAFTARAN TRAINING / WORKSHOP</h1>
	</p> -->
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
                        <h2>Form Workshop</h2>

                    </header>

                    <form method="post" id="forms">
                    	<table class="table table-bordered" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                    		<tr>
                    			<td style="width: 190px;">Judul Training/Workshop</td>
                    			<td>
                    				<input type="hidden" name="train_id" value="">
                    				<input type="hidden" name="id">
                    				<input type="text" class="form-control" name="" value="<?= $regis['PelatihanTitle']; ?>" readonly placeholder="">
                    			</td>
                    		</tr>

                    		<tr>
                    			<td style="width: 190px;">Tanggal Pelaksana</td>
                    			<td>
                    				<input type="text" class="form-control" name="" value="<?= $regis['PelatihanStartDate']; ?>" readonly placeholder="">
                    			</td>
                    		</tr>

                    		<tr>
                    			<td style="width: 190px;">Perusahaan</td>
                    			<td>
                    				<input type="text" class="form-control" name="company" value="<?= $regis['pendaftaran_company']; ?>" readonly placeholder="">
                    			</td>
                    		</tr>
                    	</table>
                    	<div style="overflow-x:auto; margin-bottom: 50px;">
                    		<table class="table table-bordered table-striped" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                    			<tr>
                    				<th>NO</th>
                    				<th>NAMA</th>
                    				<th>JABATAN</th>
                    				<th>NO HANDPHONE</th>
                    				<th>EMAIL</th>
                    			</tr>
                    			<tr>
                    				<td>1</td>
                    				<td><input type="text" class="form-control" name="name_1" readonly value="<?= $regis['pendaftaran_name_1']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="jabatan_1" readonly value="<?= $regis['pendaftaran_jabatan_1']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="phone_1" readonly value="<?= $regis['pendaftaran_phone_1']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="email_1" readonly value="<?= $regis['pendaftaran_email_1']; ?>" placeholder=""></td>
                    			</tr>
                    			<tr>
                    				<td>2</td>
                    				<td><input type="text" class="form-control" name="name_2" readonly value="<?= $regis['pendaftaran_name_2']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="jabatan_2" readonly value="<?= $regis['pendaftaran_jabatan_2']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="phone_2" readonly value="<?= $regis['pendaftaran_phone_2']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="email_2" readonly value="<?= $regis['pendaftaran_email_2']; ?>" placeholder=""></td>
                    			</tr>
                    			<tr>
                    				<td>3</td>
                    				<td><input type="text" class="form-control" name="name_3" readonly value="<?= $regis['pendaftaran_name_3']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="jabatan_3" readonly value="<?= $regis['pendaftaran_jabatan_3']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="phone_3" readonly value="<?= $regis['pendaftaran_phone_3']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="email_3" readonly value="<?= $regis['pendaftaran_email_3']; ?>" placeholder=""></td>
                    			</tr>
                    			<tr>
                    				<td>4</td>
                    				<td><input type="text" class="form-control" name="name_4" readonly value="<?= $regis['pendaftaran_name_4']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="jabatan_4" readonly value="<?= $regis['pendaftaran_jabatan_4']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="phone_4" readonly value="<?= $regis['pendaftaran_phone_4']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="email_4" readonly value="<?= $regis['pendaftaran_email_4']; ?>" placeholder=""></td>
                    			</tr>
                    			<tr>
                    				<td>5</td>
                    				<td><input type="text" class="form-control" name="name_5" readonly value="<?= $regis['pendaftaran_name_5']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="jabatan_5" readonly value="<?= $regis['pendaftaran_jabatan_5']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="phone_5" readonly value="<?= $regis['pendaftaran_phone_5']; ?>" placeholder=""></td>
                    				<td><input type="text" class="form-control" name="email_5" readonly value="<?= $regis['pendaftaran_email_5']; ?>" placeholder=""></td>
                    			</tr>
                    		</table>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-6">
                    			<table class="table table-bordered table-striped" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                    				<tr>
                    					<th colspan="2">PENANGGUNG JAWAB PENDAFTARAN </th>
                    				</tr>
                    				<tr>
                    					<td>Nama</td>
                    					<td>
                    						<input type="text" class="form-control" name="pen_name" value="<?= $regis['penanggung_name']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>Jabatan</td>
                    					<td>
                    						<input type="text" class="form-control" name="pen_jabatan" value="<?= $regis['penanggung_jabatan']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>TELEPON (Ext.)</td>
                    					<td>
                    						<input type="text" class="form-control" name="pen_telp" value="<?= $regis['penanggung_telp_ext']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>FAX</td>
                    					<td>
                    						<input type="text" class="form-control" name="pen_fax" value="<?= $regis['penanggung_fax']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>HANDPHONE</td>
                    					<td>
                    						<input type="text" class="form-control" name="pen_phone" value="<?= $regis['penanggung_phone']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>EMAIL</td>
                    					<td>
                    						<textarea name="email" class="form-control" disabled><?= $regis['penanggung_email']; ?></textarea> 
                    					</td>
                    				</tr>
                    			</table>
                    		</div>
                    		<div class="col-md-6">

                    			<table class="table table-bordered table-striped" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
                    				<tr>
                    					<th colspan="2">PENANGGUNG JAWAB PEMBAYARAN </th>
                    				</tr>
                    				<tr>
                    					<td>Nama</td>
                    					<td>
                    						<input type="text" class="form-control" name="bayar_name" readonly value="<?= $regis['bayar_name']; ?>" placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>Jabatan</td>
                    					<td>
                    						<input type="text" class="form-control" name="bayar_jabatan" readonly value="<?= $regis['bayar_jabatan']; ?>" placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>TELEPON (Ext.)</td>
                    					<td>
                    						<input type="text" class="form-control" name="bayar_telp" value="<?= $regis['bayar_telp_ext']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>FAX</td>
                    					<td>
                    						<input type="text" class="form-control" name="bayar_fax" value="<?= $regis['bayar_fax']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>HANDPHONE</td>
                    					<td>
                    						<input type="text" class="form-control" name="bayar_phone" value="<?= $regis['bayar_phone']; ?>" readonly placeholder="">
                    					</td>
                    				</tr>

                    				<tr>
                    					<td>ALAMAT PENGIRIMAN INVOICE</td>
                    					<td>
                    						<textarea name="bayar_address" class="form-control" disabled><?= $regis['bayar_address_invoice']; ?></textarea> 
                    					</td>
                    				</tr>
                    			</table>
                    		</div>
                    	</div>
                    </form> 
	            </div>
	        </article>
	    </div>
	</section>
</div>