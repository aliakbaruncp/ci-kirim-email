<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link href="<?=base_url().'assets/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link href="<?=base_url().'assets/css/stylesheet.css' ?>" rel="stylesheet" type="text/css">

<body>
	<div class="container">
		<h1><?= $title ?></h1>
		<div class="row">
			<div class="col-sm-12">
				<?php echo $this->session->flashdata('message') ?>
			</div>
			<div class="col-sm-12">
				<?php echo form_open('welcome/index'); ?>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">To</label>
				    <div class="col-sm-7">
				      <input type="text" name="to" class="form-control" value="<?php echo set_value('to'); ?>" placeholder="email-tujuan@gmail.com">
				      <?php echo form_error('to'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Subject</label>
				    <div class="col-sm-7">
				      <input type="text" name="subject" class="form-control" value="Kirim Email Dengan Codeigniter">
				      <?php echo form_error('subject'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Message</label>
				    <div class="col-sm-10">
				      <textarea name="message" class="form-control" rows="3">Ini adalah contoh script mengirim email CodeIgniter yang dikirim menggunakan SMTP email Google (Gmail).</textarea>
				      <?php echo form_error('message'); ?>
				    </div>
				  	
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label"></label>
				    <div class="col-sm-7">
				      <button type="submit" name="submit" class="btn btn-info">Send Email</button>
				    </div>
				  </div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<h5>Sumber: <a href="https://akbardesign.org/mengirim-email-dengan-codeigniter/">https://akbardesign.org/mengirim-email-dengan-codeigniter/</a></h5>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" type="text/javascript"></script>
	<script src="<?=base_url().'assets/' ?>js/bootstrap.min.js"></script>
	

</body>
</html>