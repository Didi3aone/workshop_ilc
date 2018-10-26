<!--=========== BEGIN COURSE BANNER SECTION ================-->
<section id="imgBanner" style="margin-bottom: 80px;">
  <h2>Course Archive</h2>
</section>
<!--=========== END COURSE BANNER SECTION ================-->
<div class="container">
    <table class="table table-bordered" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
        <thead>
            <tr>
                <form action="<?= site_url('training/index'); ?>" method='GET'>
                <th style="background-color: blue; color: white;">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" id="search" value="" placeholder="Judul">
                </th>
                <th style="background-color: blue; color: white;">
                    <label>Tanggal</label>
                    <input type="text" class="form-control datepicker" name="start_date" value="" placeholder="Tanggal">
                </th>
                <th style="background-color: blue; color: white;">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="tempat" value="" placeholder="Lokasi">
                </th>
                <th style="background-color: blue; color: white;">
                    <button type="submit" name="search_submit" style="" class="btn btn-warning"> Search</button>&nbsp;
                    <button type="button" class="btn btn-danger" onclick="change();">Clear</button> &nbsp;
                    <button type="button" class="btn btn-success" onclick="ref();">Refresh</button>
                </th>
                </form>
            </tr>
        </thead>
    </table>
    <div style="overflow-x:auto; margin-bottom: 150px;">
        <table class="table table-bordered table-striped" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
            <tr>
                <th style="background-color: blue; color: white;">#</th>
                <th style="background-color: blue; color: white;">Judul</th>
                <th style="background-color: blue; color: white;">Tanggal</th>
                <th style="background-color: blue; color: white;">Tempat</th>
                <th style="background-color: blue; color: white;">Biaya</th>
                <th style="background-color: blue; color: white;">Action</th>
            </tr>
            <tbody>
                <?php 
                    $no = 1;
                        // print_r($datas);exit();
                    foreach($datas as $key => $val) :
                ?>
                <tr>
                    <td style="text-align: center;"><?= $no++;?></td>
                    <td style="text-align: center;"><?= $val['PelatihanTitle']; ?></td>
                    <td style="text-align: center;"><?= $val['PelatihanStartDate']; ?></td>
                    <td style="text-align: center;"><?= $val['PelatihanLokasi']; ?></td>
                    <td style="text-align: center;"><?= $val['PelatihanBiaya']; ?></td>
                    <td style="text-align: center;"><a href="<?= site_url('register'); ?>" class="btn btn-info" title=""><i class="fa fa-file-o"></i> Daftar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            <?php echo $pagination; ?>
    </div>
</div>
