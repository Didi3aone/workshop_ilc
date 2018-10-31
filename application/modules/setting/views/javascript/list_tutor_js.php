<script>
    var lists = function () {
        var table_id = "#dataTable";
        var ajax_source = "<?= site_url('manager/setting/list_all_data_tutor'); ?>";
        var url = "<?= site_url('manager/setting/'); ?>";
        var path_image_url = "<?= site_url();?>"
        var columns = [
            {"data": "tutor_id" },
            {"data": "tutor_name" },
            {"data": "type_name"},
            {
                "title": "Action",
                "class": "text-center",
                "data": null,
                "sortable": false,
                "render": function(data, type, full) {
                    var edit =  '<td>';
                        edit +=  ' <a href="'+ url + 'edit_tutor/' + full.tutor_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Tutorial" data-placement="top" ><i class="fa fa-pencil"></i></a>';
                        edit +=  ' <a href="' + url + 'view_tutor/'+full.tutor_id+'"  class="btn btn-info btn-circle" rel="tooltip" title="View Tutorial" data-placement="top" ><i class="fa fa-eye"></i></a>&nbsp;';
                        edit += '<a href="'+ url +'delete" data-id ="' + full.tutor_id + '" data-name ="' + full.PelatihanTitle + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Tutorial" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                               
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