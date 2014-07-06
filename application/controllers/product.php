<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
    
    protected $data = array();

    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
        $this->load->library('Vivi/Card/CardRepository', '', 'cr');
    }

    public function index(){
        $this->data['products'] = $this->ol->gather('products');
        $this->template->build('product/index', $this->data);
    }

    public function add()
    {
        $this->template->build('product/add', $this->data);
    }
    
    function add_post(){
        $this->ol->inject('products');
        redirect('/product');        
        
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
        $this->data['card'] = $this->ol->take('cards', $id);
        $this->data['stores'] = $this->ol->gather('stores');
        $this->data['members'] = $this->ol->gather('members');
        $this->template->build('card/edit', $this->data);        
    }
    
    function batch(){
        $this->template->build('card/batch');              
    }
    function batch_post(){
        $this->cr->createBatch($this->input->post('amount'), $this->input->post('prefix'));
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
