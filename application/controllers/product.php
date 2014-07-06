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
        if ($this->ol->inject('products')){
            redirect('/product');        
        }
        else{
            exit(var_export($this->ol->getErrors()));
        }        
    }
    
#    function add_
        
    function inject(){
        $this->ol->inject();
        redirect('/demo');
    }
    
    function delete($id){
        $this->ol->murder('products', $id);
        redirect('/product');
    }

    function edit($id){
        $this->data['product'] = $this->ol->take('products', $id);
        $this->template->build('product/edit', $this->data);        
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
        $id = $_REQUEST['ol_id'];
        if ($this->ol->pollute('products', $id)){
            redirect('/store/index');
        }
        else{
            exit(var_export($this->ol->getErrors()));
        }
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
