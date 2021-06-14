<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getAllProduct()
	{
		return $this->db->get('products')->result_array();
	}

	public function getProductById($id)
	{
		return $this->db->get_where('products', ['id' => $id])->row_array();
	}

}

/* End of file Home_model.php */
