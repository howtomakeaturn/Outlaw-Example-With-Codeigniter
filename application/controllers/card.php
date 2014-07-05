<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {
    
    protected $data = array();
    
    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
    }

    public function index(){
        $this->data['cards'] = $this->ol->gather('cards');
        $this->template->build('card/index', $this->data);
    }

    public function add()
    {
        $this->data['stores'] = $this->ol->gather('stores');
        $this->data['members'] = $this->ol->gather('members');
        
        $this->template->build('card/add', $this->data);
    }
    
    function add_post(){
        $this->ol->inject();
        redirect('/card');        
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
        $id = $this->ol->pollute();
        redirect('/store/index');
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
