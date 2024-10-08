<!-- List Item -->
<div class="container">
	<div class="row mt-5">
		<div class="col">
			<h2 class="head">Paket Pernikahan</h2>
			<hr>
		</div>
	</div>

	<div class="row mb-5">
		<?php foreach($weddings as $wedding) : ?>
			<div class="col-lg-3 col-md-4 col-sm-6 mt-4">
				<div class="card shadow">
					<img src="<?= base_url() ?>/images/product/<?= $wedding['image'] ?>" class="card-img-top" alt="<?= $wedding['name'] ?>">
					<div class="card-body">
						<a href="<?= base_url('home/detail/' . $wedding['id']) ?>">
							<h6 class="card-title font-weight-bold"><?= $wedding['name'] ?></h6>
						</a>
						<h6 class="text-muted"><?= ucfirst($wedding['edition']) ?> Edition</h6>
						<h3 class="text-right text-warning price mt-4">Rp.<?= number_format($wedding['price']); ?></h3>
						<form action="<?= base_url('cart/add') ?>" method="POST">
							<input type="hidden" name="product_id" value="<?= $wedding['id'] ?>">
							<button type="submit" class="btn btn-success btn-block badge-pill mt-3 w-100">BOOK!</button>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- End of List Item -->

<!-- Footer -->
<?php $this->load->view('layouts/_footer') ?>
<!-- End of footer -->
