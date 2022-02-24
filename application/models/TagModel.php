<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TagModel extends CI_Model {
	
	public function findAll() {

		$db = $this->load->database();

		$this->db->order_by('tagItem.nombre', 'ASC');
		return $this->db->get('tagitem')->result();
	}

	public function getById($id) {

		$db = $this->load->database();
		
		$result = $this->db->where('id',$id)->get('tagItem')->result();

		return $result[0];
	}

	public function save ($id, $data){
		$data = FunctionsLibrary::setNullValues($data);
		if ($id) {
			$this->db->where('id',$id);
			$this->db->update('tagItem',$data);
		} else {
			$this->db->insert('tagItem',$data);
		}
	}

	public function delete ($id){
		
		if ($this->db->where('id',$id)->delete('tagItem')) {
			return true;
		} else {
			return false;
		}
	}
}
