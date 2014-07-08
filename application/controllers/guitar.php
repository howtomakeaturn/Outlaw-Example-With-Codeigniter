<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guitar extends CI_Controller {
    
    protected $data = array();

    function __construct(){
        parent::__construct();
        $this->load->library('OutlawWrapper', '', 'ol');
        $this->load->helper('url');        
#        $this->load->library('Vivi/Card/CardRepository', '', 'cr');
    }

    public function index(){
        $this->data['songs'] = $this->ol->gather('songs');
        $this->template->build('guitar/index', $this->data);
    }

    public function add()
    {
        
        $this->template->build('guitar/add', $this->data);
    }
    
    function add_post(){
        $id = $this->ol->inject('songs');
        $song = R::load('songs', $id);
        $lines = explode("\n", $this->input->post('lyrics'));
        $order = 0;
        foreach($lines as $line){
            $lyric = R::dispense('lyrics');
            $lyric->order = $order;
            $lyric->content = $line;
            $lyric->songs = $song;
            R::store($lyric);
            $order += 1;
        }
        
        redirect('/guitar');        
    }
        
    function inject(){
        $this->ol->inject();
        redirect('/demo');
    }
    
    function delete(){
        $this->ol->murder();
        redirect('/demo');
    }

    function edit_song($id){
#        $this->data['store'] = $this->ol->take();
        $this->data['song'] = $song = $this->ol->take('songs', $id);
        $this->template->title($song->name);
        $this->template->build('guitar/edit_song', $this->data);        
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
