<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
    
    protected $data = array();
    
    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
    }

    public function index(){
        if (!$_REQUEST['ol_table']){
            redirect('/member/index?ol_table=members');
        }
      
        # Maybe this is an option.
        # $this->data['articles'] = $this->ol->getAll('articles');
        $this->data['members'] = $this->ol->gather();
        $this->template->build('member/index', $this->data);
    }

    public function add()
    {
        $this->data['stores'] = R::findAll('stores');
        $this->template->build('member/add', $this->data);
    }
    
    function add_post(){
        $model_name = $_POST['ol_table'];

        $instance = R::dispense($model_name);
        
        $store = R::load('stores', '1');
        $store->ownMembers = array($instance);
        R::store($store);
        $id = R::store($instance);        
#        $this->ol->inject();
        redirect('/member');        
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
        $this->data['store'] = $this->ol->take();
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
