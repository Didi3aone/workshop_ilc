<!--MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
            <h1>
                <a class="btn btn-primary" href="<?= site_url(); ?>manager/training/create" rel="tooltip" title="Add new Workshop" data-placement="left">
                    <i class="fa fa-plus fa-lg"></i> Add
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
                        <h2>Workshop list</h2>
                    </header>

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dataTable" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="hasinput" style="width: 180px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="name_filter" name="filter[workshop]" class="form-control filter-this" placeholder="Workshop" />
                                                    <div class="input-group-btn"><button type="button" class="clear-filter btn"><i class="fa fa-close"></i></button></div>
                                                </div>
                                            </div>
                                        </th>
                                        <th style="width: 180px;"></th>
                                        <th style="width: 180px;"></th>
                                        <th class="hasinput" style="width: 180px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="name_filter" name="filter[lokasi]" class="form-control filter-this" placeholder="Lokasi" />
                                                    <div class="input-group-btn"><button type="button" class="clear-filter btn"><i class="fa fa-close"></i></button></div>
                                                </div>
                                            </div>
                                        </th>

                                        <!-- <th class="hasinput">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="last_login_filter" name="filter[last_login]" class="form-control filter-this date-range-picker" placeholder="Last Login Date" readonly />
                                                    <div class="input-group-btn"><button class="btn open-calendar-button" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button></div>
                                                </div>
                                            </div>
                                        </th> -->
                                    <th></th>
                                    <th style="width: 180px;"></th>
                                    </tr>
                                    <tr>
                                        <th data-hide="phone">ID</th>
                                        <th data-hide="phone,tablet">Workshop</th>
                                        <th data-hide="phone"> Start Date</th>
                                        <th data-hide="phone"> End Date</th>
                                        <th data-class="expand"> Lokasi </th>
                                        <th data-class="expand"> Brosur </th>
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