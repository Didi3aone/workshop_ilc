<script type="text/javascript">
	// var source = 
	var lists = function () {
	    var table_id = "#dataTable";
	    var ajax_source = "<?= site_url('manager/background/list_all_data'); ?>";
	    var url = "<?= site_url('manager/background/'); ?>";
	    var path_image_url = "<?= site_url();?>"
	    var columns = [
	        {"data": "slider_id" },
	        {"data": "username" },
	        {"data": "description"},
	        {
	            "title": "Gambar", 
	            "class": "text-center",
	            "data": null,
	            "sortable": false,
	            "render": function(data, type, full) {
	                if(full.image != null) {
						var path_image =  path_image_url + full.image;
						console.log(path_image);
						var data = 
                            '<a href="'  + path_image + '" data-lightbox="roadtrip"><img src="' + path_image + '" width=240 height=160></a>'; 
					} else {
						var data = '<img src="'+ url +'asset/images/pejuangsubuh.jpg" width=300 height=100>';
					}
					return data;
	            }
	        },
	        {
	            "title": "Action",
	            "class": "text-center",
	            "data": null,
	            "sortable": false,
	            "render": function(data, type, full) {
	                var edit =  '<td>';
	                    edit +=  ' <a href="'+ url + 'edit/' + full.slider_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Group" data-placement="top" ><i class="fa fa-pencil"></i></a>' +
	                             ' <a href="'+ url +'delete" data-id ="' + full.slider_id + '" data-name ="' + full.title + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Group" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
	                    edit +=  ' <a href="' + url + 'show/' + full.slider_id + '"  data-id ="' + full.slider_id + '" data-name ="' + full.title + '" class="btn show-confirm btn-success btn-circle" rel="tooltip" title="Show To web" data-placement="top" ><i class="fa fa-eye"></i></a>';
	                    edit +=  '</td>';

	                return edit;
	            }
	        },
	    ];
	    setup_daterangepicker(".date-range-picker");
    	init_datatables (table_id, ajax_source, columns);

    //on delete action button click.
    $(document).on("click", ".delete-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        var data_name = $(this).data("name");

        title = 'Delete Confirmation';
        content = 'Do you really want to delete ' + data_name + ' ?';

        popup_confirm (url, data_id, title, content);
    });

    //on delete action button click.
    $(document).on("click", ".show-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        // var data_name = $(this).data("name");

        title = 'Show Confirmation';
        content = 'Do you really want to show this image?';

        popup_confirm (url, data_id, title, content);
    });

    //on reactivate action button click.
    $(document).on("click", ".reactivate-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        var data_name = $(this).data("name");

        title = 'Re-activate Confirmation';
        content = 'Do you really want to re-activate ' + data_name + ' ?';

        popup_confirm (url, data_id, title, content);

    });

    //on popup confirm trigger success.
    $(document).on("popup-confirm:success", function (e, url, data_id){
        $("#dataTable").dataTable().fnClearTable();
    });
};

$(document).ready(function() {
    lists();
});

</script>