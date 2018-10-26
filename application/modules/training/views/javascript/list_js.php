<script>
    var lists = function () {
        var table_id = "#dataTable";
        var ajax_source = "<?= site_url('manager/training/list_all_data'); ?>";
        var url = "<?= site_url('manager/training/'); ?>";
        var path_image_url = "<?= site_url();?>"
        var columns = [
            {"data": "PelatihanId" },
            {"data": "PelatihanTitle" },
            {"data": "PelatihanStartDate"},
            {"data": "PelatihanLokasi"},
            {
                "title": "Action",
                "class": "text-center",
                "data": null,
                "sortable": false,
                "render": function(data, type, full) {
                    var edit =  '<td>';
                        edit +=  ' <a href="'+ url + 'edit/' + full.PelatihanId + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Group" data-placement="top" ><i class="fa fa-pencil"></i></a>';
                        edit +=  ' <a href="' + url + '" class="btn btn-info btn-circle" rel="tooltip" title="Register" data-placement="top" ><i class="fa fa-eye"></i></a>&nbsp;';
                        edit += '<a href="'+ url +'delete" data-id ="' + full.PelatihanId + '" data-name ="' + full.PelatihanTitle + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Group" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                               
                        edit +=  '</td>';

                    return edit;
                }
            },
        ];
        setup_daterangepicker(".date-range-picker");
        init_datatables (table_id, ajax_source, columns);

	    //on popup confirm trigger success.
	    $(document).on("popup-confirm:success", function (e, url, data_id){
	        $("#dataTable").dataTable().fnClearTable();
	    });
	};

    $(document).ready(function() {
        lists();
    });
</script>