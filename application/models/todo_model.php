<?php
class todo_model extends CI_Model{
	
	public function __construct(){
     
     /*Creating the database connection here*/
     $this->load->database();

	}

	public function get_todos($id=0){
	/*getting the todo list with/without condition*/
		if ($id==0){

			$query = $this->db->get_where('todos',array('status'=>0));
			return $query->result_array();

		}

			$query = $this->db->get_where('todos',array('$id'=>0));
			return $query->row_array();

	}

	public function set_todos($id=0){
	/*setting the todo list & updating according to condition*/
		//$this->load->helpers(url);

		$data = array('title'=>$this->input->post('title'),'description'=>$this->input->post('description'));
		

		if ($id==0){
			return $this->db->insert('todos',$data);
		}
		else{
			$this->db->where('id',$id);
			return $this->db->update('todos',$data);
		}


	}
}
?>