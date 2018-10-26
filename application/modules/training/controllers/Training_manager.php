<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_manager extends MX_Controller {

	private $_title       = "Workshop";
    private $_title_page  = 'Workshop ';
    private $_breadcrumb  = "<li><a href='/'>Home</a></li>";
    private $_active_page = "Workshop";
    private $_dm;
    private $_view        = "training/manage/";
    private $_js_view     = "training/javascript/";
    private $_header;
    private $_footer;
    
    //table init
    private $_table = "tbl_pelatihan";
    private $_table_alias = "tp";
    private $_pk_field    = "PelatihanId";

    public function __construct() {
    	parent::__construct();
    	//new class model
        $this->load->helper('form');
        $this->_dm = new Dynamic_model();
    }

	/*
    * list data
    */
    public function index()
    {
        $this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>Workshop</li>",
            "active_page"=> $this->_active_page,
            "css" => array(
                "assets/js/plugins/lightbox/css/lightbox.css"
            )
        );

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.tableTools.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/plugins/lightbox/js/lightbox.js",
                // "assets/js/pages/background/list.js"
            ),
            "script_js"   => $this->_js_view."list_js"
        );
       
       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'index');
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function create()
    {

        $this->_header = array(
            "title"         => $this->_title ."-create",    
            "title_page"    => $this->_title_page."-create",
            "breadcrumb"    => $this->_breadcrumb. "<li> Buat Artikel </li>",
            "active_page"   => $this->_active_page ."-create",
        );
        // pr($this->_header);exit;

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/markdown/markdown.min.js",
                "assets/js/plugins/markdown/to-markdown.min.js",
                "assets/js/plugins/markdown/bootstrap-markdown.min.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),
            "script_js" => $this->_js_view ."create_js",
            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'create');
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function edit($id = null)
    {
        if($id == null || !is_numeric($id)) {
            show_404();
        }

        $data['item'] = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->get_all_data(array(
            "conditions" => array("status" => STATUS_ACTIVE, "slider_id" => $id), 
            "row_array"  => true))['datas'];
        // pr($data['item']);exit;
        $this->_header = array(
            "title"         => $this->_title ."-create",    
            "title_page"    => $this->_title_page."-create",
            "breadcrumb"    => $this->_breadcrumb. "<li> Buat Artikel </li>",
            "active_page"   => $this->_active_page ."-create",
        );
        // pr($this->_header);exit;

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/markdown/markdown.min.js",
                "assets/js/plugins/markdown/to-markdown.min.js",
                "assets/js/plugins/markdown/bootstrap-markdown.min.js",
            ),
            "script_js" => $this->_js_view ."create_js",
            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'create',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
    * ajax get data
    */
    public function list_all_data()
    {
       //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit = sanitize_str_input($this->input->get("length"), "numeric");
        $start = sanitize_str_input($this->input->get("start"), "numeric");
        $search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

        $select = array("PelatihanId","PelatihanTitle","PelatihanStartDate","PelatihanLokasi");
        // $joined = array("tbl_user u" => array("u.user_id" => $this->_table_alias.".created_by"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = ($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(group_id)'] = $value;
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->get_all_data(array(
            'select'            => $select,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            "debug"             => false
        ));

        //get total rows
        $total_rows = $datas['total'];

        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    /**
     * ajax form
     */
    public function process_form()
    {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }
        //load library form validation
        $this->load->library("form_validation");

        //initital
        $message['is_error'] = true;
        $message['redirect_to'] = '';
        // pr($this->input->post());exit;
        $id         = $this->input->post('id');
        $title      = $this->input->post('title');
        $company    = $this->input->post('company');
        $lokasi     = $this->input->post('lokasi');
        $biaya      = $this->input->post('biaya');
        $desc       = $this->input->post('desc');
        $dates      = $this->input->post('dates');
        $create_by  = $this->session->userdata("id");
        $now        = date("Y-m-d H:i:s");
        $data_image = $this->input->post('data_image');

        $dates = date('Y-m-d', strtotime($dates));
        // pr($this->input->post());exit;
        //set validation
        $this->form_validation->set_rules("title", "Title", "required");
        $this->form_validation->set_rules("company", "Company", "required");
        $this->form_validation->set_rules("lokasi", "Lokasi", "required");
        $this->form_validation->set_rules("biaya", "Biaya", "required");
 
        if($this->form_validation->run() == FALSE)
        {
            $message['error_msg'] = validation_errors();
        }
        else {
            //begin transaction
            $this->db->trans_begin();
            //validation success
            //prepare save to DB
            $_save_data = array(
                "PelatihanTitle"        => $title,
                "PelatihanCompany"      => $company,
                "PelatihanLokasi"       => $lokasi,
                "PelatihanBiaya"        => $biaya,
                "PelatihanStartDate"    => $dates,
                "PelatihanDesc"         => $desc
            );

            $this->load->library('Uploader');

            $image = $this->upload_image(
                "brosurcrop", //name post 
                "upload/brosurcrop", //path
                "image_file", //name post
                $data_image, //data
                1024, //width
                600, //height
                $id //id
            );

            if(isset($_FILES['real_image']) ) {
                $upload_real_image = $this->upload_file("real_image", "brosur-".date('Ymd').time()  , false,"upload/brosur/real-image",$id);
            } 
            // pr($image);exit;
            if(isset($upload_real_image['uploaded_path'])) {
                $_save_data['PelatihanPhotoReal'] = $upload_real_image['uploaded_path'];
            }

            if(!empty($image)) {
                $_save_data['PelatihanPhoto'] = $image;
            }

            //insert or update
            if($id == "") {
                // pr($image);exit;
                $_save_data['PelatihanCreatedBy']   = $create_by;
                $_save_data['PelatihanCreatedDate'] = $now;
                $result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->insert($_save_data);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'Insert failed! Please try again.';
                } else {
                    $this->db->trans_commit();
                    //growler.
                    $message['is_error']        = false;
                    $message['notif_title']     = "Excellent!";
                    $message['notif_message']   = "Workshop has been added.";

                    //on update, redirect.
                    $message['redirect_to']     = site_url('manager/training');
                }
            } else {

                $conditions = array("PelatihanId" => $id);

                $_save_data['PelatihanUpdatedBy']   = $create_by;
                $_save_data['PelatihanUpdatedDate'] = $now;

                $result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->update($_save_data, $conditions);

                //end transaction
                if($this->db->trans_status() == false ) {
                    //balikin jangan di insert
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                    //success
                    $message['is_error']        = false;
                    $message['notif_title']     = 'Good!';
                    $message['notif_message']   = 'Workshop has been been updated';
                    $message['redirect_to']     = site_url('manager/training');
                }
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * delete 
     */
    public function delete() {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Background_model');

        $message['is_error'] = true;

        $id = $this->input->post('id');

        if($id == "" || !is_numeric($id)) {
            show_404();
        } else {
            $get_data = $this->Background_model->get_all_data(array(
                "find_by_pk" => array($id),
                "row_array"  => true
            ))['datas'];
            
            $conditions = array("slider_id" => $id);
            $result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->update(array("status" => 0), $conditions);

            if($this->db->trans_status() == false) {

                $this->db->trans_rollback();
                $message['error_msg'] = "Database operation failed.";
            } else {

                $this->db->trans_commit();
                $message['is_error']      = false;
                $message['notif_title']   = "Excellent !!.";
                $message['notif_message'] = "Background SLide has been deleted.";
                $message['redirect_to']   = site_url("admin/background");
            }
        }

        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     *  upload image with cropper
     */
    protected function upload_image ($file_name, $saving_path, $key, $data_image, $width, $height, $id, $preset2 = array()) {
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $message['redirect_to'] = "";

        //after successfull image upload and cropping, this var will contain the path to the file.
        $final_upload_path = "";

        if ($data_image != "") {
            //validation success.
            //prepare upload config.
            $config = array(
                "allowed_types"         =>  FILE_TYPE_UPLOAD,
                "file_ext_tolower"      =>  true,
                "overwrite"             =>  false,
                "max_size"              =>  MAX_UPLOAD_IMAGE_SIZE_IN_KB,
                "upload_path"           =>  "upload/temp",
            );

            if (!empty($file_name)) {
                $config['filename_overwrite'] = $file_name;
            }

            //load the uploader library.
            $this->load->library('Uploader');

            //try to upload the image.
            $upload_result = $this->uploader->upload_files($key, false, $config);

            if ($upload_result['is_error']) {
                if (($id == "" && $upload_result['result'][0]['error_code'] == 0) || $upload_result['result'][0]['error_code'] != 0) {
                    //file upload error of something.
                    //show the error.
                    $message['error_msg'] = $upload_result['result'][0]['error_msg'];

                    //encoding and returning.
                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                }

            }

            //get first index because it's not multiple files.
            $uploaded = $upload_result['result'];

            //file upload success.
            if (!$upload_result['is_error']) {

                //creating config for image resizing.
                $config = array(
                    "image_targets"     =>  array(
                        "preset1"   =>  array(
                            "target_path"   =>  $saving_path,
                            "target_width"  =>  $width,
                            "target_height" =>  $height,
                            "crop_data"     =>  $data_image,
                        ),
                    )
                );

                if (!empty($preset2)) {
                    $config['image_targets']['preset2'] = $preset2;
                }

                $image_result = $this->uploader->crop_images($uploaded['uploaded_path'], true, $config);

                //if there is somekind of error, write it to log.
                if ($image_result['is_error'] ) {
                    foreach ($image_result['result'] as $key => $value) {
                        $message['error_msg'] .= $image_result['error_msg'];
                    }

                    //encoding and returning.
                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                } else {
                    //success cropping.

                    if (!empty($preset2)) {
                        $final_upload_path = array(
                            "/".$image_result['result'][0]['uploaded_path'],
                            "/".$image_result['result'][1]['uploaded_path'],
                        );
                    } else {
                        $final_upload_path = "/".$image_result['result'][0]['uploaded_path'];
                    }


                }

            } else if ($upload_result['is_error'] && $uploaded[0]['error_code'] == 0) {
                //if file upload error, but the error is because there is no new file.

            } 
        }
        return $final_upload_path;
    }

    protected function upload_file ($key, $file_name, $multiple = false, $upload_path, $id) {
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $message['redirect_to'] = "";

        //load the uploader library.
        $this->load->library('Uploader');

        $config = array(
            "allowed_types"         =>  FILE_TYPE_UPLOAD,
            "file_ext_tolower"      =>  true,
            "overwrite"             =>  false,
            "max_size"              =>  MAX_UPLOAD_FILE_SIZE_IN_KB,
            "upload_path"           =>  $upload_path,
        );

        if (!empty($file_name)) {
            $config['filename_overwrite'] = $file_name;
        }

        //try to upload the image.
        $upload_result = $this->uploader->upload_files($key, $multiple, $config);

        if ($upload_result['is_error']) {
            if ($upload_result['is_error']) {
                if (($id == "" && $upload_result['result'][0]['error_code'] == 0) || $upload_result['result'][0]['error_code'] != 0) {
                    //file upload error of something.
                    //show the error.
                    $message['error_msg'] = $upload_result['result'][0]['error_msg'];

                    //encoding and returning.
                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                }

            }
        }

        return $upload_result['result'];
    }

}

/* End of file Training_manager.php */
/* Location: ./application/modules/training/controllers/Training_manager.php */