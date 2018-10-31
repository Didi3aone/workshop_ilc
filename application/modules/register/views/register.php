<div class="container" style="margin-top: 180px;">
	<p>
		<img src="<?= base_url(); ?>assets/frontend/img/ilc.jpeg" alt="" align="left" width="130">
		<h1 class="well" style="background-color: red; color: white; margin-left: 13%">FORMULIR PENDAFTARAN TRAINING / WORKSHOP</h1>
	</p>
	<div class="row">
        <form method="post" id="forms">
			<table class="table table-bordered" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
				<?php 
					$id 	    = ($workshop['PelatihanId']) ? $workshop['PelatihanId'] : "";
					$judul      = ($workshop['PelatihanTitle']) ? $workshop['PelatihanTitle'] : "";
					$tanggal    = ($workshop['PelatihanStartDate']) ? $workshop['PelatihanStartDate'] : "";
					$perusahaan = ($workshop['PelatihanCompany']) ? $workshop['PelatihanCompany'] : "";
				?>
	            <tr>
	            	<td style="width: 190px;">Judul Training/Workshop</td>
	                <td>
	                	<input type="hidden" name="train_id" value="<?= $id; ?>">
	                	<input type="hidden" name="id">
	                    <input type="text" class="form-control td-inputan" name="" value="<?= $judul; ?>" readonly placeholder="">
	                </td>
	            </tr>

	            <tr>
	            	<td style="width: 190px;">Tanggal Pelaksana</td>
	                <td>
	                    <input type="text" class="form-control td-inputan" name="" value="<?= $tanggal; ?>" readonly placeholder="">
	                </td>
	            </tr>

	            <tr>
	            	<td style="width: 190px;">Perusahaan</td>
	                <td>
	                    <input type="text" class="form-control td-inputan" name="company" value="" placeholder="">
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
		            	<td class="td-inputan">
		            		<input type="text" class="form-control td-inputan" name="name_1" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="jabatan_1" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="phone_1" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="email_1" value="" placeholder="">
		            	</td>
		            </tr>
		            <tr>
		            	<td>2</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="name_2" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="jabatan_2" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="phone_2" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="email_2" value="" placeholder="">
		            	</td>
		            </tr>
		            <tr>
		            	<td>3</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="name_3" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="jabatan_3" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="phone_3" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="email_3" value="" placeholder="">
		            	</td>
		            </tr>
		            <tr>
		            	<td>4</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="name_4" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="jabatan_4" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="phone_4" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="email_4" value="" placeholder="">
		            	</td>
		            </tr>
		            <tr>
		            	<td>5</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="name_5" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="jabatan_5" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="phone_5" value="" placeholder="">
		            	</td>
		            	<td>
		            		<input type="text" class="form-control td-inputan" name="email_5" value="" placeholder="">
		            	</td>
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
			            	<td >Nama</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="pen_name" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>Jabatan</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="pen_jabatan" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>TELEPON (Ext.)</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="pen_telp" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>FAX</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="pen_fax" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>HANDPHONE</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="pen_phone" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>EMAIL</td>
			                <td>
			                    <textarea name="email" class="form-control td-inputan"></textarea> 
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
			                    <input type="text" class="form-control td-inputan" name="bayar_name" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>Jabatan</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="bayar_jabatan" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>TELEPON (Ext.)</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="bayar_telp" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>FAX</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="bayar_fax" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>HANDPHONE</td>
			                <td>
			                    <input type="text" class="form-control td-inputan" name="bayar_phone" value="" placeholder="">
			                </td>
		            	</tr>

		            	<tr>
			            	<td>ALAMAT PENGIRIMAN INVOICE</td>
			                <td>
			                    <textarea name="bayar_address" class="form-control td-inputan"></textarea> 
			                </td>
		            	</tr>
		            </table>
	            </div>
	        </div>
	        <div class="footer-regis">
	        	<p>
	        		Kebijakan Pemabatalan Training/Workshop:<br/>
	        			1. Pembatalan dilakukan secara tertulis (email atau surat resmi).<br/>
	        			2. Pembatalan H-3 di kenakan biaya sebesar 100% dari biaya. <br/>
	        		<br/>
	        		*Kebijakan biaya pembatalan training/workshop diperlukan demi menajaga <br/>
	        		jumlah minimum peserta training saat training berlangsung. <br/>
	        		<br/>
	        	</p>
	        </div>

		</form> 
        <div class="footer-regis">
        	<input type="checkbox" name="cek" class="cek"> Saya setuju dengan <a href="<?= site_url('syarat-ketentuan'); ?>" target="_blank" title="" style="color: blue;"> Syarat & Ketentuan</a> yang ditetapkan oleh PT "NAMA PT"<br><br> 
        	<button type="button" id="sbutton" class="btn btn-primary submit-save" disabled>submit</button>
        </div>
	</div>
</div>