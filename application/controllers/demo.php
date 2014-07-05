<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {
    
    protected $data = array();
    
    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
    }

    public function index(){
      
        $this->data['articles'] = $this->ol->gather('articles');
        $this->template->build('demo/index', $this->data);
    }

    public function create()
    {
        $this->template->title('OUTLAW DEMO');
        $this->template->build('demo/create');
    }
        
    function inject(){
        if ( $this->ol->inject('articles') ){
            redirect('/demo');          
        }
        else{
            exit(var_export($this->ol->getErrors()));
        }
    }
    
    function delete(){
        $this->ol->murder();
        redirect('/demo');
    }

    function edit(){
        $this->data['article'] = $this->ol->take('articles');
        $this->template->build('demo/edit', $this->data);        
    }

    function view(){
        $this->data['article'] = $this->ol->take('articles');
        $this->template->build('demo/view', $this->data);        
    }
    
    function update(){
        if ($id = $this->ol->pollute('articles')){
            redirect('/demo/view?ol_table=articles&ol_id=' . $id);
        }
        else{
            exit(var_export($this->ol->getErrors()));
        }
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
