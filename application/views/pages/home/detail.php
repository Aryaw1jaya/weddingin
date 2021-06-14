<div class="container">

	<!-- Alert -->
	<?php $this->load->view('layouts/_alert') ?>
	<!-- End of alert -->

	<!-- Product -->
	<div class="row mt-5">		
		<div class="col">
			<img src="<?= base_url() ?>/images/product/<?= $wedding['image'] ?>" class="card-img-top border border-dark" alt="<?= $wedding['name'] ?>" style="width: 390px">
		</div>
		<div class="col-5 margin ml-5 pl-5">
			<h2 class="font-weight-bold"><?= $wedding['name'] ?></h2>
			<br> 
			<h4 class="font-weight-bold h-1 badge badge-info badge-pill p-3"><?=  ucfirst($wedding['edition']) ?> Edition</h4>
			
			<!--
			<p><?= character_limiter($wedding['description'], 200) ?></p>
			 
			<p class="font-weight-bold">EDITION</p>
			<h5><span class="badge badge-info badge-pill p-2"><?=  ucfirst($wedding['edition']) ?></span></h5>
			-->
		</div>
		<div class="col">
			<div class="card">
				<div class="card-body text-center">
					<h2 class="text-center text-warning price mt-4 mb-4">Rp.<?= number_format($wedding['price']); ?></h2>
					<form action="<?= base_url('cart/add') ?>" method="POST">
						<input type="hidden" name="product_id" value="<?= $wedding['id'] ?>">
						<button type="submit" class="btn btn-large btn-success btn-block badge-pill mb-4">ADD TO CART</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End of -->

	<!-- Deskripsi -->
	<div class="row mt-5 mb-2">
		<div class="col">
			<h3 id="description">Deskripsi</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col bg-light p-5">
			<?= $wedding['description'] ?>
		</div>
	</div>
	<!-- End of Deskripsi -->

	<!-- Fasilitas -->
	<div class="row mt-5 mb-2">
		<div class="col">
			<h3>Fasilitas</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col bg-light p-5">
			<?= $wedding['fasilitas'] ?>
		</div>
	</div>
	<!-- End of System Fasilitas -->
</div>

<?php $this->load->view('layouts/_footer') ?>
