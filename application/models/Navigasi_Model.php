<?php
	class Navigasi_Model extends CI_Model
	{
		var $navtable = 'nav_homepage';
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function get_menu_admin()
		{
			$this->db->from($this->navtable);
			
			$query = $this->db->get();

			return $query->result();
		}
					
		public function get_menu_guest()
		{
			$data=array('1','2','3','4','6');
			$this->db->from($this->navtable);
			$this->db->where_in('id', $data);
			$query = $this->db->get();

			return $query->result();
		}

		public function get_menu_operator()
		{
			$data=array('1','2','3','4','6','7','8');
			$this->db->from($this->navtable);
			$this->db->where_in('id', $data);
			$query = $this->db->get();

			return $query->result();
		}

		public function get_menu_maha()
		{
			$data=array('1','2','3','4','6','7','8');
			$this->db->from($this->navtable);
			$this->db->where_in('id', $data);
			$query = $this->db->get();

			return $query->result();
		}

		public function get_menu_alumni()
		{
			$data=array('1','2','3','4','6','7');
			$this->db->from($this->navtable);
			$this->db->where_in('id', $data);
			$query = $this->db->get();

			return $query->result();
		}

	}
?>