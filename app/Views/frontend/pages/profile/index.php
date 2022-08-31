<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/logo-menu'); ?>
<section class="w-full pt-5 pl-5 pr-5">
    <div class="relative rounded-md shadow-md h-[34rem] bg-light-primary/60" id="box">
        <div class="absolute top-1 right-2 ">
            <a href="<?= base_url('/home'); ?>" id="btn-close" class="flex items-center justify-center text-center">
                <span class="w-5 h-5 text-sm font-bold transition duration-150 rounded-full shadow-md outline-none text-rose-500 bg-rose-300 hover:ring-1 hover:ring-rose-100 hover:bg-rose-400 hover:text-white">
                    x
                </span>
            </a>
        </div>
        <div class="flex items-center justify-center h-full gap-x-16">
            <a href="<?= base_url('/edit-profile');?>" class="flex flex-col items-center text-sm font-bold transition duration-150 jutify-center text-slate-500 hover:text-slate-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 group-hover:text-lime-700 text-lime-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                Profile
            </a>
            <a href="<?= base_url('/ubah-password');?>" class="flex flex-col items-center text-sm font-bold transition duration-150 jutify-center text-slate-500 hover:text-slate-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500 group-hover:text-orange-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                Ubah Password
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