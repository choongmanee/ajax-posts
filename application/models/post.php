<?php

class post extends CI_Model
{
	public function createpost($message)
	{
		// die('model createpost');
		$sql = 'INSERT INTO ajaxposts (post_message) VALUES (?)';
		$this->db->query($sql,array($message));
		return $this->db->insert_id();
	}

	public function getposts()
	{
		$sql = 'SELECT * FROM ajaxposts';
		$query = $this->db->query($sql);
		// echo "<pre>";
		// var_dump($query->result_array());
		// die('getpost model test');
		return $query->result_array();
	}

	public function getrecord($id)
	{
		return $this->db->query("SELECT * FROM ajaxposts WHERE id = ?", $id)->row_array();
	}
}

?>