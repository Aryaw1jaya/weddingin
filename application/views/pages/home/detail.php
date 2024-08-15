<div class="container mt-5">
    <!-- Alert -->
    <?php $this->load->view('layouts/_alert'); ?>
    <!-- End of alert -->

    <!-- Product -->
    <div class="row">
        <div class="col-md-4">
            <img src="<?= base_url() ?>/images/product/<?= $wedding['image'] ?>" 
                 class="card-img-top border border-dark rounded" 
                 alt="<?= $wedding['name'] ?>" 
                 style="width: 100%; max-width: 390px;">
        </div>
        <div class="col-md-5">
            <h2 class="font-weight-bold"><?= $wedding['name'] ?></h2>
            <h4 class="font-weight-bold h-1 badge badge-info badge-pill p-3 mt-3">
                <?= ucfirst($wedding['edition']) ?> Edition
            </h4>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-center text-warning price mt-4 mb-4">
                        Rp.<?= number_format($wedding['price']); ?>
                    </h2>
                    <form action="<?= base_url('cart/add') ?>" method="POST">
                        <input type="hidden" name="product_id" value="<?= $wedding['id'] ?>">
                        <button type="submit" class="btn btn-large btn-success btn-block badge-pill mb-4">
                            BOOK!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Product -->

    <!-- Deskripsi -->
    <div class="row mt-5 mb-2">
        <div class="col">
            <h3 id="description">Deskripsi</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col bg-light p-5 rounded shadow-sm">
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
        <div class="col bg-light p-5 rounded shadow-sm">
            <?= $wedding['fasilitas'] ?>
        </div>
    </div>
    <!-- End of Fasilitas -->
</div>

<?php $this->load->view('layouts/_footer'); ?>
