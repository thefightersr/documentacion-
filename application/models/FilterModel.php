<?php defined('BASEPATH') OR exit('No direct script access allowed');

class FilterModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library('FunctionsLibrary');
		$this->load->database();
	}
	
	public function itemFilter($params="", $sector="", $tags="", $limitTotal=10, $limitFrom=0) {

		$this->db->select('DISTINCT(item.id),item.*, sectorItem.nombre as nombreSector, ( SELECT GROUP_CONCAT(ti.nombre)
								FROM tagItem AS ti
								WHERE ti.id IN (
									SELECT idTag
										FROM itemsTags
										WHERE item.id=idItem) ) AS tagNombre');
		$this->db->from('item');

		if ($params) {
			$this->db->like('item.titulo',$params,'both');
		}

		$this->db->join('sectorItem', 'sectorItem.id = item.sector');
		if ($sector) {
			$this->db->group_start();
			$this->db->where('sectorItem.id',$sector);
			$this->db->or_where('sectorItem.idPadre',$sector);
			$this->db->group_end();
		}

		if ($tags) {
			$tags = explode(',', $tags);
			$this->db->join('itemstags', 'itemstags.idItem = item.id');
			$this->db->where_in('itemstags.idTag',$tags);
		}

		if ($limitFrom) {
			$this->db->limit($limitTotal,$limitFrom);
		}else{
			$this->db->limit($limitTotal);
		}
		$this->db->where('estado',1);

		$this->db->order_by('item.titulo', 'ASC');
		$result = $this->db->get()->result();
		// echo $this->db->last_query();
		return $result;
	}
}