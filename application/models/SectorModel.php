<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SectorModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library('FunctionsLibrary');
		$this->load->database();
	}

	public function findAll() {
		$this->db->select('si.*, sip.nombre as nombrePadre');
		$this->db->from('sectorItem as si');
		$this->db->join('sectorItem as sip', 'si.idPadre = sip.id', 'left');

		$this->db->order_by('si.nombre', 'ascASC');
		return $this->db->get()->result();
	}
	
	public function countAll() {

		return $this->db->query('SELECT *,
								( SELECT COUNT(i.id) FROM item AS i
						 				WHERE i.sector=se.id AND i.estado=1 ) +
								( SELECT COUNT(i.id) FROM item AS i
										LEFT JOIN sectorItem AS si ON i.sector=si.id
						 				WHERE se.id IN 
						 					(SELECT idPadre FROM sectorItem WHERE se.id=si.idPadre ) AND i.estado=1 )   AS count 
						 				FROM sectorItem se ORDER BY se.nombre ')->result();
	}

	public function getById($id) {

		$result = $this->db->where('id',$id)->get('sectorItem')->result();

		return $result[0];
	}

	public function save ($id, $datos){
		$datos = FunctionsLibrary::setNullValues($datos);
		if ($id) {
			$this->db->where('id',$id);
			$this->db->update('sectorItem',$datos);
		} else {
			$this->db->insert('sectorItem',$datos);
		}
	}

	public function delete ($id){
		
		if ($this->db->where('id',$id)->delete('sectorItem')) {
			return true;
		} else {
			return false;
		}
	}
}