<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {
    
    protected $data = array();
    
    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
    }

    public function index(){
        $this->data['stores'] = $this->ol->gather('stores');
        $this->template->build('store/index', $this->data);
    }

    public function add()
    {
        $this->template->build('store/add');
    }
    
    function add_post(){
        $this->ol->inject('stores');
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

    function edit($id){
#        $this->data['store'] = $this->ol->take();
        $this->data['store'] = $this->ol->take('stores', $id);
        $this->template->build('store/edit', $this->data);        
    }

    function view(){
        $this->data['article'] = $this->ol->take();
        $this->template->build('demo/view', $this->data);        
    }
    
    function edit_post(){
        $id = $this->ol->pollute('stores');
        redirect('/store/index');
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
