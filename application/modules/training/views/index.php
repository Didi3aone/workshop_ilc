<!--=========== BEGIN COURSE BANNER SECTION ================-->
<!-- <section id="imgBanner" style="margin-bottom: 80px;">
  <h2>Course Archive</h2>
</section> -->
<!--=========== END COURSE BANNER SECTION ================-->
<div class="container" style="margin-top: 160px;">
    <div style="overflow-x:auto;">
        <div class="table-responsive"> 
            <table class="table table-bordered tbl-atas">
                <thead>
                    <tr>
                        <form action="<?= site_url('training/index'); ?>" method='GET'>
                            <th style="background-color: blue; color: white;">
                                <label>Judul</label>
                                <input type="text" class="form-control t_header" name="judul" id="search" value="" placeholder="Judul">
                            </th>

                            <th style="background-color: blue; color: white;">
                                <label>Dari Tanggal</label>
                                <input type="text" class="form-control datepicker" name="start_date" id="start" value="" placeholder="Dari Tanggal">
                            </th>

                            <th style="background-color: blue; color: white;">
                                <label>Sampai Tanggal</label>
                                <input type="text" class="form-control datepicker" name="end_date" id="end" value="" placeholder="Sampai Tanggal">
                            </th>

                            <th style="background-color: blue; color: white;">
                                <label>Lokasi</label>
                                <input type="text" class="form-control t_header" name="tempat" value="" placeholder="Lokasi">
                            </th>

                            <th style="background-color: blue; color: white;">
                                <button type="submit" name="search_submit" style="" class="btn btn-warning"><i class="fa fa-search"></i>Search</button>&nbsp;
                                <!-- <button type="button" class="btn btn-danger" onclick="change();"><i class="fa fa-trash"></i>Clear</button> &nbsp; -->
                                <button type="button" class="btn btn-success" onclick="ref();"><i class="fa fa-refresh"></i> Refresh</button>
                            </th>
                        </form>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered tbl-atas table-hover">
            <tr>
                <th style="background-color: blue; color: white;">#</th>
                <th style="background-color: blue; color: white;">Judul</th>
                <th style="background-color: blue; color: white;">Tanggal Mulai</th>
                <th style="background-color: blue; color: white;">Tanggal Selesai</th>
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
                    <td style="text-align: center;"><?= $val['PelatihanEndDate']; ?></td>
                    <td style="text-align: center;"><?= $val['PelatihanLokasi']; ?></td>
                    <td style="text-align: center;"><?= $val['PelatihanBiaya']; ?></td>
                    <td style="text-align: center;">
                        <a href="<?= site_url('register/form/'.$val['PelatihanId']); ?>" class="btn btn-info" title=""><i class="fa fa-file-o"></i> Daftar</a>
                        <a href="<?= site_url('training/view/'.$val['PelatihanId']); ?>" class="btn btn-warning" title=""><i class="fa fa-eye"></i> Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            <?php echo $pagination; ?>
    </div>
</div>
