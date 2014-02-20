<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//change class name to reflect the controller page name
class posts extends CI_Controller {

	public function index()
	{
		// $data['messages'] = $this->getdata();
		// echo "<pre>";
		// var_dump($data['messages']);
		// die('check the messages');
		$this->load->view('posts');
	}

	public function postdata()
	{
		$message = $this->input->post('message');

		$this->load->model('post');	
		// $data['id'] = $this->post->createpost($message);
		// $array = $this->post->getrecord($data['id']);
		$array = $this->post->getrecord($this->post->createpost($message));
		echo json_encode($array);
	}

	public function getdata()
	{
		$this->load->model('post');
		$data = $this->post->getposts();
		echo json_encode($data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */