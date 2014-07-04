<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {
    
    protected $data = array();
    
    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
    }

    public function index(){
        if (!$_REQUEST['ol_table']){
            redirect('/demo/index?ol_table=articles');
        }
      
        # Maybe this is an option.
        # $this->data['articles'] = $this->ol->getAll('articles');
        $this->data['articles'] = $this->ol->gather();
        $this->template->build('demo/index', $this->data);
    }

    public function create()
    {
        $this->template->title('OUTLAW DEMO');
        $this->template->build('demo/create');
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

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
