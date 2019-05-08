<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Welcome extends CI_Controller {
  /**
  * Kirim email dengan SMTP Gmail.
  * 
  */

  public function index()
  {
  	if(isset($_POST['submit'])){

  		$this->form_validation->set_rules('to', 'Email', 'trim|required|valid_email|max_length[35]');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[35]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[103]');
        $this->form_validation->set_error_delimiters('<label class="form-check-label">','</label>');

        if ($this->form_validation->run() == false) {
        	
        	$data['title'] = "Kirim Email Dengan Codeigniter";
        	$this->load->view('welcome_message',$data);
        
        }else{
        	
        	$to = $this->input->post('to');
        	$subject = $this->input->post('subject');
        	$message = $this->input->post('message');

        	$sendEmail = $this->_sendEmail($to,$subject,$message);
        	$this->session->set_flashdata('message',$sendEmail);
        	redirect('welcome');

        }  		
  	}else{
  		$data['title'] = "Kirim Email Dengan Codeigniter";
  		$this->load->view('welcome_message',$data);
  	}
  }

  public function _sendEmail($to,$subject,$message)
  {
    // Konfigurasi email
    $config['mailtype']    = 'html';
    $config['charset']     = 'utf-8';
    $config['protocol']    = 'smtp';
    $config['smtp_host']   = 'ssl://smtp.gmail.com';
    $config['smtp_user']   = 'email-gmail-anda@gmail.com';
    $config['smtp_pass']   = 'password-gmail-anda';
    $config['smtp_port']   = 465;
    $config['crlf' ]       = "\r\n";
    $config['newline']     = "\r\n";
              

    // Load library email dan konfigurasinya
    $this->load->library('email', $config);

    // Email dan nama pengirim
    $this->email->from('no-reply@akbardesign.com', 'AkbarDesign.org | Akbar Design');

    // Email penerima
    $this->email->to($to);

    // Lampiran email, isi dengan url/path file
    $this->email->attach('./assets/img/kirim-email.jpg');

    // Subject email
    $this->email->subject($subject);

    // Isi email
    $this->email->message($messag);

    // Tampilkan pesan sukses atau error
    if ($this->email->send()) {
    	return '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Sukses!</strong> email berhasil dikirim.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    } else {
    	return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Error!</strong> email tidak dapat dikirim.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    }
  }
}

