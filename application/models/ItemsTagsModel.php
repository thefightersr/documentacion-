<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ItemsTagsModel extends CI_Model {
	
	public function findAll() {

		$db = $this->load->database();

		$this->db->order_by('tagItem.nombre', 'DESC');
		return $this->db->get('itemstags')->result();
	}

	public function findByItem($idItem) {

		$db = $this->load->database();

		$this->db->select('itemsTags.*,tagItem.nombre as nombreTag');
		$this->db->from('itemsTags');
		$this->db->join('tagItem', 'itemsTags.idTag = tagItem.id', 'left');

		$this->db->order_by('tagItem.nombre', 'ASC');
		return $this->db->where('itemsTags.idItem',$idItem)->get()->result();
	}

	public function getById($id) {

		$db = $this->load->database();
		
		$result = $this->db->where('id',$id)->get('itemstags')->result();
		return $result[0];
	}

	public function save ($id, $datos=array()){
		
		$datos = FunctionsLibrary::setNullValues($datos);
		$this->db->where('idItem',$id);
		$this->db->delete('itemstags');

		if(empty($datos)) return ;
		foreach ($datos as $tag) {
			$this->db->set('idItem',$id);
			$this->db->set('idTag',$tag);
			$this->db->insert('itemstags');
		}
	}

	public function deleteByItem ($id){
		$this->db->where('idItem',$id);
		$this->db->delete('itemstags');
	}

	public function delete ($id){
		$this->db->where('id',$id)->delete('itemstags');
	}
}