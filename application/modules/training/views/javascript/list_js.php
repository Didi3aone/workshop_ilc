<script>
    var lists = function () {
        var table_id = "#dataTable";
        var ajax_source = "<?= site_url('manager/training/list_all_data'); ?>";
        var url = "<?= site_url('manager/training/'); ?>";
        var path_image_url = "<?= site_url();?>"
        var columns = [
            {"data": "PelatihanId" },
            {"data": "PelatihanTitle" },
            {
                "data": "PelatihanStartDate",
                "render":function(data, type, full) {
                    if (data != null && data != "") {
                        return moment(data).format("DD MMM YYYY");
                    }

                    return "";
                }
            },
            {
                "data": "PelatihanEndDate",
                "render":function(data, type, full) {
                    if (data != null && data != "") {
                        return moment(data).format("DD MMM YYYY");
                    }

                    return "";
                }
            },
            {"data": "PelatihanLokasi"},
            {
                "title": "Gambar", 
                "class": "text-center",
                "data": null,
                "sortable": false,
                "render": function(data, type, full) {
                    if(full.PelatihanPhoto != null || full.PelatihanPhotoReal != null) {
                        var path_image =  (full.PelatihanPhoto) ? path_image_url + full.PelatihanPhoto : path_image_url + full.PelatihanPhotoReal;
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
                        edit +=  ' <a href="'+ url + 'edit/' + full.PelatihanId + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Workshop" data-placement="top" ><i class="fa fa-pencil"></i></a>';
                        edit +=  ' <a href="' + url + 'view/'+ full.PelatihanId +'" class="btn btn-info btn-circle" rel="tooltip" title="Detail" data-placement="top" ><i class="fa fa-eye"></i></a>&nbsp;';
                        edit += '<a href="'+ url +'delete" data-id ="' + full.PelatihanId + '" data-name ="' + full.PelatihanTitle + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Workshop" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                               
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