<script>
	var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "<?= site_url('manager/user/list-all-data')?>";
    var url = "<?= site_url('manager/user/'); ?>";
    var columns = [
        {"data": "user_id" },
        {"data": "name" },
        {"data": "email" },
        {
            "data": "last_login_time",
            "render":function(data, type, full) {
                if (data != null && data != "") {
                    return moment(data).format("DD MMM YYYY HH:mm:ss");
                }

                return "";
            }
        },
        {"data": "status" },
        {
            "title": "Action",
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    edit +=  ' <a href="'+url+'edit/' + full.user_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Admin" data-placement="top" ><i class="fa fa-pencil"></i></a>' +
                             ' <a href="'+ url + 'delete/" data-id ="' + full.user_id + '" data-name ="' + full.name + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Admin" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                    edit +=  '</td>';

                return edit;
            }
        },
    ];
    setup_daterangepicker(".date-range-picker");
    init_datatables (table_id, ajax_source, columns);

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

    $(document).on("popup-confirm:success", function (e, url, data_id){
        $("#dataTable").dataTable().fnClearTable();
    });
};

$(document).ready(function() {
    lists();
});

</script>