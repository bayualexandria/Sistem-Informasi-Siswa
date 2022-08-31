<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/logo-menu'); ?>
<section class="absolute w-full pt-5 pl-5 pr-5">
    <div class="relative rounded-md shadow-md h-[34rem] bg-light-primary/60" id="box">
        <div class="absolute top-1 right-2 ">
            <a href="<?= base_url('/home'); ?>" id="btn-close" class="flex items-center justify-center text-center">
                <span class="w-5 h-5 text-sm font-bold transition duration-150 rounded-full shadow-md outline-none text-rose-500 bg-rose-300 hover:ring-1 hover:ring-rose-100 hover:bg-rose-400 hover:text-white">
                    x
                </span>
            </a>
        </div>
    </div>
</section>
<?= $this->include('frontend/component/modal-logout'); ?>
<?= $this->include('frontend/component/menu'); ?>
<?= $this->include('frontend/component/footer'); ?>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url('assets/js/frontend/scripts.js'); ?>"></script>
<script>
    // View Menu
    const btnClose = document.querySelector('#btn-close');
    const box = document.querySelector('#box');

    btnClose.addEventListener('click', function() {
        box.classList.add('hidden');
    });
</script>
<?= $this->endSection(); ?>