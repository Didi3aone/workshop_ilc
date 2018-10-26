<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Background_manager extends CI_Controller {

	private $_title       = "Background Slider";
    private $_title_page  = 'Background ';
    private $_breadcrumb  = "<li><a href='/'>Home</a></li>";
    private $_active_page = "slider";
    private $_dm;
    private $_view        = "background/";
    private $_js_view     = "background/javascript/";
    private $_header;
    private $_footer;
    
    //table init
    private $_table = "tbl_background_slider";
    private $_table_alias = "tbs";
    private $_pk_field    = "slider_id";

    protected $_currentUser;

    public function __construct() {
    	parent::__construct();
    	//new class model
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
            "breadcrumb" => $this->_breadcrumb ."<li>Artikel</li>",
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

        $select = array("slider_id","u.username","description", "image");
        $joined = array("tbl_user u" => array("u.user_id" => $this->_table_alias.".created_by"));

        $conditions = array($this->_table_alias.".status" => STATUS_ACTIVE);

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
            'joined'            => $joined,
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
     * process form 
     * server validation
     */
    public function process_form()
    {
    	// Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initial
        $message['is_error'] = true;
        //load models && load library form validation
        $this->load->library('form_validation');

        $id 	    = $this->input->post('id');
        $title      = $this->input->post('title');
        $desc 	    = $this->input->post('desc');
        $create_by  = $this->session->userdata("user_id");
        $data_image = $this->input->post('data-image');
        
         // pr($this->input->post());exit;
        $this->form_validation->set_error_delimiters(" ", "");
        $this->form_validation->set_rules("desc", "Description", "trim|required");

        if($this->form_validation->run() == false) {
        	$message['error_msg'] = validation_errors();
        }
        else {
            $this->load->library('Uploader');

            $image = $this->upload_image("background", "upload/background", "image-file", $data_image, 1680, 900, $id );
            // pr($image);exit;
            $this->db->trans_begin();

        	$arrayToDb = array(
                "title"        => $title,
        		"description"  => $desc,
        		"created_date" => date("Y-m-d H:i:s"),
        		"created_by"    => $create_by,
        	);

            if(!empty($image)) {
                $arrayToDb['image'] = $image;
            }
 
        	if($id == "") {

        		$result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->insert($arrayToDb);

        		if($this->db->trans_status() == false) {

        			$this->db->trans_rollback();
        			$message['error_msg'] = "Database operation failed.";
        		} else {

        			$this->db->trans_commit();
        			$message['is_error']      = false;
        			$message['notif_title']   = "Good !!.";
        			$message['notif_message'] = "Background SLide has been added.";
        			$message['redirect_to']   = site_url("manager/background");
        		}
        	} else {

                $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->get_all_data(array(
                    "conditions" => array("slider_id" => $id),
                    "row_array"  => true
                ))['datas'];

                //update     
                if(!empty($image) && isset($get_data['image'])) {
                    unlink( FCPATH .$get_data['image']);
                }

        		$conditions = array("slider_id" => $id);

        		$result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->update($arrayToDb, $conditions);

        		if($this->db->trans_status() == false) {

        			$this->db->trans_rollback();
        			$message['error_msg'] = "Database operation failed.";
        		} else {

        			$this->db->trans_commit();
        			$message['is_error']      = false;
        			$message['notif_title']   = "Excellent !!.";
        			$message['notif_message'] = "Background SLide has been update.";
        			$message['redirect_to']   = site_url("manager/background");
        		}
        	}
	        $this->output->set_content_type('application/json');
	        echo json_encode($message);
        }
    }

    /**
     * delete 
     */
    public function show() {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        $message['is_error'] = true;

        $id = $this->input->post('id');

        if($id == "" || !is_numeric($id)) {
            // show_404();
            $message['is_error'] = true;
            $message['error_msg'] = "Invalid Id.";
        } else {
            
            $conditions = array("slider_id" => $id);
            $result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->update(array("is_show" => 'Y'), $conditions);

            if($this->db->trans_status() == false) {

                $this->db->trans_rollback();
                $message['error_msg'] = "Database operation failed.";
            } else {

                $this->db->trans_commit();
                $message['is_error']      = false;
                $message['notif_title']   = "Excellent !!.";
                $message['notif_message'] = "Brosur image has been show.";
                $message['redirect_to']   = site_url("admin/background");
            }
        }

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

}

/* End of file Background_manager.php */
/* Location: ./application/modules/background/controllers/Background_manager.php */