<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {
    
    protected $data = array();
    
    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
    }

    public function index(){
        if (!$_REQUEST['ol_table']){
            redirect('/store/index?ol_table=stores');
        }
      
        # Maybe this is an option.
        # $this->data['articles'] = $this->ol->getAll('articles');
        $this->data['stores'] = $this->ol->gather();
        $this->template->build('store/index', $this->data);
    }

    public function add()
    {
        $this->template->build('store/add');
    }
    
    function add_post(){
        $this->ol->inject();
        redirect('/store');        
    }
        
    function inject(){
        $this->ol->inject();
        redirect('/demo');
    }
    
    function delete(){
        $this->ol->murder();
        redirect('/demo');
    }

    function edit(){
        $this->data['article'] = $this->ol->take();
        $this->template->build('demo/edit', $this->data);        
    }

    function view(){
        $this->data['article'] = $this->ol->take();
        $this->template->build('demo/view', $this->data);        
    }
    
    function update(){
        $id = $this->ol->update();
        redirect('/demo/view?ol_table=articles&ol_id=' . $id);
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
