<!--MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
            <h1>
                <a class="btn btn-primary" href="<?= site_url(); ?>manager/setting/create-payment" rel="tooltip" title="Add new Payment" data-placement="left">
                    <i class="fa fa-plus fa-lg"></i>
                </a>
            </h1>
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-001"
                    data-widget-editbutton="false"
                    data-widget-deletebutton="false"
                    data-widget-attstyle="jarviswidget-color-blueLight">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Payment list</h2>
                    </header>

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dataTable" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
	                                    <th></th>
                                    </tr>
                                    <tr>
                                        <th data-hide="phone">ID</th>
                                        <th data-hide="phone,tablet">Bank</th>
                                        <th data-hide="phone"> Image </th>
                                        <th data-hide="phone,tablet">Action</th>
                                    </tr>
                                </thead>

                            </table>
                        </div> <!-- end widget content -->
                    </div> <!-- end widget div -->
                </div> <!-- end widget -->
            </article> <!-- WIDGET END -->
        </div> <!-- end row -->
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENTs