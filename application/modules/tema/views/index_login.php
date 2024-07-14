<?php $this->load->view('pars/header') ?>

<?php
if ($this->session->flashdata('error')) {
	$kode   = 'error';
	$msg    = $this->session->flashdata('error');
} else if ($this->session->flashdata('success')) {
	$kode   = 'success';
	$msg    = $this->session->flashdata('success');
} else if ($this->session->flashdata('warning')) {
	$kode   = 'warning';
	$msg    = $this->session->flashdata('warning');
} else {
	$kode   = "";
	$msg    = "";
}
?>
<input type="hidden" id="flash-kode" value="<?= $kode ?>">
<input type="hidden" id="flash-text" value="<?= $msg ?>">

<body>
	<section id="hero" class="d-flex align-items-center">
		<div class="container-fluid">
			<?= $contents ?>
		</div>
	</section>
	<?php $this->load->view('pars/footer') ?>
	<?php $this->load->view('pars/script') ?>
</body>

</html>