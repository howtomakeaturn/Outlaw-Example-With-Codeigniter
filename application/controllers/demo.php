<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', 'ol');
    }

    public function index()
    {
        $this->template->title('TEMPLATE DEMO');
        $this->template->build('welcome/demo');
    }

    public function create()
    {
        $this->template->title('TEMPLATE DEMO');
        $this->template->build('demo/create');
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
