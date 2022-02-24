<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library('FunctionsLibrary');
		$this->load->database();
	}

	public function getById($id) {
		$this->db->select('item.*, sectorItem.nombre as nombreSector');
		$this->db->from('item');
		$this->db->join('sectorItem', 'sectorItem.id = item.sector', 'left');

		$result = $this->db->where('item.id',$id)->get()->result();

		return $result[0];
	}

	public function findRelatedById($id) {

		return $this->db->query(sprintf('SELECT DISTINCT(i.id), i.*, se.nombre as nombreSector FROM item i
						LEFT JOIN sectorItem se ON i.sector=se.id
						LEFT JOIN itemstags it ON it.idItem=i.id
						WHERE i.id<>%d  AND ((se.id = (SELECT sector from item WHERE  id = %d ) OR se.idPadre = (SELECT sector from item WHERE  id = %d ) ) 
						OR it.idTag IN (SELECT idTag FROM itemstags WHERE idItem=%d )) AND estado=1  ORDER BY i.titulo',$id,$id,$id,$id))->result();

	}
	
	public function findAll($limitTotal=10, $limitFrom=0, $activas=true) {

		$this->db->select('item.*,sectorItem.nombre as nombreSector, ( SELECT GROUP_CONCAT(ti.nombre)
								FROM tagItem AS ti
								WHERE ti.id IN (
									SELECT idTag
										FROM itemsTags
										WHERE item.id=idItem) ) AS tagNombre');
		$this->db->from('item');
		$this->db->join('sectorItem', 'sectorItem.id = item.sector', 'left');

		if ($limitFrom && $limitTotal) {
			$this->db->limit($limitTotal,$limitFrom);
		} elseif ($limitTotal) {
			$this->db->limit($limitTotal);
		}

		if ($activas) {
			$this->db->where('estado',1);
		}

		$this->db->order_by('item.titulo', 'ASC');
		$result = $this->db->get()->result();
		// echo $this->db->last_query();
		// die();
		return $result;
	}

	public function changeState($id, $state) {
		$this->db->set('estado',$state);
		$this->db->where('id',$id);
		
		return $this->db->update('item');
	}

	public function save ($id, $data){
		$data = FunctionsLibrary::setNullValues($data);

		if ($id) {
			$this->db->where('id',$id);
			$this->db->update('item',$data);

			return $id;
		} else {
			$this->db->insert('item',$data);

			return $this->db->insert_id();
		}
	}

	public function delete ($id){
		if ($this->db->where('id',$id)->delete('item')) {
			return true;
		} else {
			return false;
		}
	}
}
