<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class todos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent:: __construct();

		$this->load->library('form_validation');
		$this->load->model('todo_model');
	}

	public function index()
	{
		$data['title'] = "My Todo List";
		$data ['todos'] = $this->todo_model->get_todos($id=0);
		$this->load->view('index',$data);
		//print_r ($data);
	}

	public function create(){

		$data ['title'] = "Create Your Todo List Here";

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required');

		if ($this->form_validation->run()==FALSE){

			$this->load->view('create');
		}

		else{

			$this->todo_model->set_todos($id=0);
			$this->load->view('success');
		}

		

	}

	public function edit(){

		$data ['title'] = "Edit your task";

		$id = $this->uri->segment(3); 

		$data ['todos'] = $this->todo_model->get_todos($id);

		//print_r ($data['todos']);exit;
		

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required');

		if ($this->form_validation->run()==FALSE){

			$this->load->view('edit',$data);
		}

		else{
			$this->todo_model->set_todos($id);
			redirect( base_url() . 'todos');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */