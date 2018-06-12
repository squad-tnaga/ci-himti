<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	var $calendartemplate = '
		{table_open}<table id="kalender">{/table_open}

        {heading_row_start}<thead><tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}"><span class="glyphicon glyphicon-chevron-left"></span></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}"><h3>{heading}</h3></th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}"><span class="glyphicon glyphicon-chevron-right"></span></a></th>{/heading_next_cell}

        {heading_row_end}</tr></thead>{/heading_row_end}

        {week_row_start}<tr id="week">{/week_row_start}
        {week_day_cell}<td><b>{week_day}</b></td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td><a href="#">{/cal_cell_start}
        {cal_cell_start_today}<td id="today"><a href="#">{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a id="content" href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}{day}{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</a></td>{/cal_cell_end}
        {cal_cell_end_today}</a></td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
	';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{	
		

		$this->load->view('template/header1');
		if($this->session->userdata('logged')){
		$this->load->view('template/header3');}
		else{
		$this->load->view('template/header2');
		}
		$this->navloader('Home');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_home');
		$this->load->view('body_home');
		$this->load->view('template/footer');
		
	}
	
//profil himti
	public function profile()
	{
		$this->load->view('template/header1');
		if($this->session->userdata('logged')){
		$this->load->view('template/header3');}
		else{
		$this->load->view('template/header2');
		}
		$this->navloader('Profile');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_profile');
		$this->load->view('body_profile');
		$this->load->view('template/footer');

	}

	function login(){
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()){
			$us=$this->input->post('username');
			$pass=$this->input->post('password');
			$r=$this->input->post('rememberme');
			$p=hash("sha256",$pass);
			$this->load->model('User_auth');
			$data=$this->User_auth->cekuspas($us,$p);
			$datalength=count($data);
		if($datalength==1&&$r==0){
			$ceks=$this->User_auth->cekstatus($us,$p);
			$sess=array(			//Session
				'logged' => TRUE,
				'status' => $data[0]['status'],
				'username'=>$us,
				'id'=>$data[0]['id']

					);

			$this->session->set_userdata($sess);
			redirect(site_url());
					}

		elseif($data==1&&$r!=0){
			//jika remember me di centang
			$ceks=$this->User_auth->cekstatus($us,$p);
			
			$sess=array(			//Session
				'logged' => TRUE,
				'status' => $data[0]['status'],
				'username'=>$us,
				'id'=>$data[0]['id']

					);

			$this->session->set_userdata($sess);
			
			setcookie('username',$us,time() +(86400 * 30),"/");
			setcookie('password',$pass,time() +(86400 * 30),"/");
			redirect(site_url());
		}

					else{//jika gagal
			    echo "<script type='text/javascript'>alert('Login GAGAL');
				   window.location.href=''; </script>";
		}

		

		}

		

		

		else{ //jika kosong
			redirect(base_url());
			}
	}


		function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		setcookie('username','',time() -3600);
		setcookie('password','',time() -3600);

		redirect(base_url());
		}

//profile akun 
	public function MyProfile()
	{
	if($this->session->userdata('logged')){
	$No=$this->uri->segment('3');
		if($No==null){
			$No=$_SESSION['id'];
		}

		$this->load->model('User_auth');
		$data=$this->User_auth->wereuser($No);
		$d= array('da'=>$data);
		$d['fullpathimg'] = base_url('assets/image/userimg/'.$d['da'][0]['gambar']);

		$this->load->view('template/header1');
		$this->load->view('template/header3');
		$this->navloader('MyProfile');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_dafuser');
		$this->load->view('body_myprofile',$d);
		$this->load->view('template/footer');
	}

		else{
		redirect(base_url());
		}
		
	}

//halaman edit profil
	function editmy($param=null)
	{

	if($this->session->userdata('logged')){


	
		$this->load->model('User_auth');
		$data=$this->User_auth->wereuser($_SESSION['id']);
		$d= array('da'=>$data);
		$d['error'] = $param;

		$this->load->view('template/header1');
		$this->load->view('template/header3');
		$this->navloader('MyProfile');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_dafuser');
		$this->load->view('body_editmy',$d);
		$this->load->view('template/footer');

	}

	else{
		redirect(base_url());
		}
		
	}

	function uploadphoto()
	{
		$config['upload_path']=  './uploads/';
		$config['allowed_types']= 'jpg|jpeg|gif|png';
		//$config['file_name']= 'poto';
		$config['encrypt_name'] = TRUE;
		$config['max_size']='1024';
		$config['max_width']='1024';
		$config['max_height']='1024';

		$this->load->library('upload',$config);

		if(! $this->upload->do_upload('poto')):
			$success = false;
			$msg = 'Error : '.$this->upload->display_errors('','');
			$type = 'warning';
			$src = 'default.jpg';
		else:
			$success = true;
			$msg = 'Upload Success';
			$type = 'success';
			$src = $this->upload->data('file_name');
		endif;
		$json = array(
		'success' => $success,
		'msg' => $msg,
		'classtype' => $type,
		'src' => $src);
		header('Content-Type:application/json',true);
		echo json_encode($json);
	}
//fungsi edit profil
	function editmyproc()
	{		

		$this->load->library('form_validation');
		$this->form_validation->set_rules('userna', 'Username', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jkelamin', 'Jeniskelamn', 'required');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
		$this->form_validation->set_rules('tgllahir', 'Tanggallahir', 'required');
		$this->form_validation->set_rules('nohp', 'Nomerhp', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('emailmhs', 'Email', 'required');
		$this->form_validation->set_rules('sosmed', 'sosial media', 'required');
		
		//$this->form_validation->set_rules('imgfilename','Foto','required');

		if($this->form_validation->run())
		{
			
			// $poto=$this->input->post('poto');
			// $config=array();
			// $config['upload_path']=  base_url('assets/image/');
			// $config['allowed_types']= 'jpg|jpeg|gif|png';
			// //$config['file_name']= 'poto';
			// $config['max_size']='1024';
			// $config['max_width']='1024';
			// $config['max_height']='1024';
			// $this->load->library('upload',$config);
			// //$this->upload->initialize($config);
			// if(!$this->upload->do_upload($poto))
			// {
			// 	$param = array('error'=>$this->upload->display_errors());
			// 	redirect(site_url('Homepage/editmy/'.$param));
			// }
			// else
			// {
			// 	$data=$this->upload->data();
			// 	redirect(site_url('Homepage/profil'));
			// }

			 $this->load->model('User_auth');
			$id=$this->input->post('id');
			$nim=$this->input->post('nim');
			$use=$this->input->post('userna');
			$nam=$this->input->post('nama');
			$pasl=$this->input->post('passlama');
			$pl=hash("sha256",$pasl);
			$pasb=$this->input->post('passwordbaru');
			$pb=hash("sha256",$pasb);
			$jk=$this->input->post('jkelamin');
			$ang=$this->input->post('angkatan');
			$tgl=$this->input->post('tgllahir');
			$pekerjaan=$this->input->post('pekerjaan');
			$nohp=$this->input->post('nohp');
			$alamat=$this->input->post('alamat');
			$emailp=$this->input->post('email');
			$emailm=$this->input->post('emailmhs');
			$sos=$this->input->post('sosmed');
			$imgfilename=$this->input->post('imgfilename');
			//pengecekan jika ingin ganti password 			
			if($pasl==NULL||$pasb==NULL)
			{
				$this->User_auth->updatedata1($id,$nim,$use,null,$nam,$jk,$ang,$tgl,$pekerjaan,$nohp,$alamat,$emailp,$emailm,$sos,$imgfilename);
				$olddir = FCPATH.'uploads/';
				$newdir = FCPATH.'assets/image/userimg/';
				if(rename($olddir.$imgfilename,$newdir.$imgfilename)):

				else:
					echo '<script type="text/javascript">alert("error");</script>';
				endif;
				redirect(site_url('Homepage/MyProfile'));
			}
			elseif($pasl!=NULL&&$pasb!=NULL)
			{
				$data=$this->User_auth->cekuspas(null,$pl,$id);

				if($data==1)
				{
					$this->User_auth->updatedata1($id,$nim,$use,$pb,$nam,$jk,$ang,$tgl,$pekerjaan,$nohp,$alamat,$emailp,$emailm,$sos);
					echo "<script type='text/javascript'>alert('Update dan ubah password berhasil!');
					    window.location.href='MyProfile';</script>";
				}
				else
				{
				    echo "<script type='text/javascript'>alert('Password lama tidak cocok, update data GAGAL!');
				   window.location.href='MyProfile'; </script>";

				}
			}
		}
		//jika tidak lengkap
		else
		{
		    echo "<script type='text/javascript'>alert('Harap isi LENGKAP!');
		    window.location.href='editmy';</script>";
		}
	}
	



	public function event()
	{
		if($this->uri->segment(3) != null && $this->uri->segment(4) != null):
			$data['bulan'] = $this->uri->segment(4);
			$data['tahun'] = $this->uri->segment(3);
			$data['customdate'] = 1;
		else:
			$data['customdate'] = 0;
		endif;
		$prefs = array (
			'template'		=>		$this->calendartemplate,
			'start_day'		=>		'monday',
			'show_next_prev'=>		TRUE,
			'next_prev_url'	=>		''
		);
		$this->load->library('calendar',$prefs);
		$this->load->view('template/header1');
		if($this->session->userdata('logged')){
		$this->load->view('template/header3');}
		else{
		$this->load->view('template/header2');
		}
		$this->navloader('Event');
		$this->load->view('template/breadcrumb');
		$this->load->view('body_event',$data);
		$this->load->view('template/footer');
		
	}

	public function event_detail($idevent)
	{
		$this->load->view('template/header1');
		if($this->session->userdata('logged')){
		$this->load->view('template/header3');}
		else{
		$this->load->view('template/header2');
		}
		$this->navloader('Event');
		$this->load->view('template/breadcrumb');
		$this->load->view('body_event_detail');
		$this->load->view('template/footer');
	}

	public function infoprodi()
	{
		$this->load->view('template/header1');
		if($this->session->userdata('logged'))
		{
			$this->load->view('template/header3');}
		else
		{
			$this->load->view('template/header2');
		}
		$this->navloader('Info Prodi');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_infoprodi');
		$this->load->view('body_infoprodi');
		$this->load->view('template/footer');
		
	}

	public function contact()
	{
		$this->load->view('template/header1');
		if($this->session->userdata('logged')){
		$this->load->view('template/header3');}
		else{
		$this->load->view('template/header2');
		}
		$this->navloader('Contact Us');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_contact');
		$this->load->view('body_contact');
		$this->load->view('template/footer');
		
	}

//halaman daftar user untuk admin
	public function dafuser()
	{
	if($this->session->userdata('logged')&&
	$this->session->userdata('status')=='1'){
		
		$this->load->model('User_auth');
		$data=$this->User_auth->tampil();
		$d= array('da'=>$data);


		$this->load->view('template/header1');
		$this->load->view('template/header3');
		$this->navloader('Daftar User');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_dafuser');
		$this->load->view('body_dafuser',$d);
		$this->load->view('template/footer');
	}

		else{
		redirect(base_url());
		}
		
	}

//fungsi untuk search akun pada daftar user
	public function searchuser()
	{

	if($this->session->userdata('logged')&&
		$this->session->userdata('status')=='1'){

		$this->load->model('User_auth');
		$us=$this->input->post('search');
		$stat=$this->input->post('searchstat');	
		
		if($stat==0){
		$stat=null;
		}
		if($us==null&&$stat==null){
			redirect(site_url('Homepage/dafuser'));
		}
		$data=$this->User_auth->tampilsearch($us,$stat);
		$d=array('da'=> $data);

		$this->load->view('template/header1');
		$this->load->view('template/header3');
		$this->navloader('Daftar User');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_dafuser');
		$this->load->view('body_dafuser',$d);
		$this->load->view('template/footer');
		}

	else{
		redirect(base_url());
		}
		
	}

//halaman edit akun oleh admin
	function viewedit()
	{

	if($this->session->userdata('logged')&&
		$this->session->userdata('status')=='1'){

	
		$this->load->model('User_auth');
		$No=$this->uri->segment('3');
		$data=$this->User_auth->tampilwere($No);
			$d= array(
				'da'=>$data,
				'n'=>$No
				);

		$this->load->view('template/header1');
		$this->load->view('template/header3');
		$this->navloader('Daftar User');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_dafuser');
		$this->load->view('body_edits',$d);
		$this->load->view('template/footer');

	}

	else{
		redirect(base_url());
		}
		
	}

//fungsi tambah akun baru
	function insert(){
	if($this->session->userdata('logged')&&
		$this->session->userdata('status')=='1'){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usern', 'Username', 'required');
		$this->form_validation->set_rules('passw', 'Password', 'required');
		if($this->form_validation->run()){
			$us=$this->input->post('usern');
			$pass=$this->input->post('passw');
			$p=hash("sha256",$pass);
			$sta=$this->input->post('statuss');
			
		$this->load->model('User_auth');
			

			$this->User_auth->insertdata($us,$p,$sta);
			redirect(site_url('Homepage/dafuser'));
			
		}
	}

	else{
		redirect(base_url());
	}

	}

//fungsi delete akun oleh admin
	function delete()
	{
		$No=$this->uri->segment('3');
		$this->load->model('User_auth');
		$this->User_auth->deletedata($No);
	redirect(site_url('Homepage/dafuser'));
		
	}

//fungsi edit akun oleh admin(lanjutan viewedit)
	function edits()
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('userna', 'Username', 'required');
		$this->form_validation->set_rules('passwo', 'Password', 'required');
		if($this->form_validation->run()){
			$id=$this->input->post('id');
			$use=$this->input->post('userna');
			$pas=$this->input->post('passwo');
				$p=hash("sha256",$pas);
			$sta=$this->input->post('statuss');
		$this->load->model('User_auth');
		$this->User_auth->updatedata($id,$use,$p,$sta);
		redirect(site_url('Homepage/dafuser'));
		;
		}
	}


	function oprec(){// Halaman liat data oprec

	if($this->session->userdata('logged')){
		$this->load->view('template/header1');
		$this->load->view('template/header3');
		$this->navloader('Open Recruitment');
		$this->load->view('template/breadcrumb');
		$this->load->view('header_dafuser');
		$this->load->view('body_oprec');
		$this->load->view('template/footer');


	}

}
	private function navloader($activemenu)
	{
		$this->load->model('Navigasi_Model');

	if($this->session->userdata('logged')
		&&$this->session->userdata('status')=='1'
		){

	
		$data['allmenu'] = $this->Navigasi_Model->get_menu_admin();
		$data['activemenu'] = $activemenu;
		$this->load->view('template/navigasi',$data);

	}
	elseif($this->session->userdata('logged')
		&&$this->session->userdata('status')=='2'
		){
		$data['allmenu'] = $this->Navigasi_Model->get_menu_operator();
		$data['activemenu'] = $activemenu;
		$this->load->view('template/navigasi',$data);
	}
	
	elseif($this->session->userdata('logged')
		&&$this->session->userdata('status')=='3'
		){
		$data['allmenu'] = $this->Navigasi_Model->get_menu_alumni();
		$data['activemenu'] = $activemenu;
		$this->load->view('template/navigasi',$data);
	}
	
	elseif($this->session->userdata('logged')
		&&$this->session->userdata('status')=='4'
		){
		$data['allmenu'] = $this->Navigasi_Model->get_menu_maha();
		$data['activemenu'] = $activemenu;
		$this->load->view('template/navigasi',$data);
	}

	else{
		$data['allmenu'] = $this->Navigasi_Model->get_menu_guest();
		$data['activemenu'] = $activemenu;
		$this->load->view('template/navigasi',$data);
	}
	}
	
	






}