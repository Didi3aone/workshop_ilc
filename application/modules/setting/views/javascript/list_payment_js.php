<script>
    var lists = function () {
        var table_id = "#dataTable";
        var ajax_source = "<?= site_url('manager/setting/list_all_data_payment'); ?>";
        var url = "<?= site_url('manager/setting/'); ?>";
        var path_image_url = "<?= site_url();?>"
        var columns = [
            {"data": "payment_id" },
            {"data": "payment_bank" },
            {
                "title": "Gambar", 
                "class": "text-center",
                "data": null,
                "sortable": false,
                "render": function(data, type, full) {
                    if(full.payment_image != null) {
                        var path_image =  path_image_url + full.payment_image;
                        console.log(path_image);
                        var data = 
                            '<a href="'  + path_image + '" data-lightbox="roadtrip"><img src="' + path_image + '" width=110 height=100></a>'; 
                    } else {
                        var data = 'NO IMAGE';
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
                        edit +=  ' <a href="'+ url + 'edit_payment/' + full.payment_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Payment" data-placement="top" ><i class="fa fa-pencil"></i></a> &nbsp;';
                        edit += '<a href="'+ url +'delete-payment" data-id ="' + full.payment_id + '" data-name ="' + full.payment_bank + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Payment" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                               
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
	    //on popup confirm trigger success.
	    $(document).on("popup-confirm:success", function (e, url, data_id){
	        $("#dataTable").dataTable().fnClearTable();
	    });
	};

    $(document).ready(function() {
        lists();
    });
</script>