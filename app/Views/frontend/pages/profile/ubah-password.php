<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/logo-menu'); ?>

<section class="flex items-center justify-center w-full h-full pt-5 pl-5 pr-5">
    <div class="relative rounded-md shadow-md h-[20rem] bg-light-primary w-full md:w-1/3 " id="box">
        <div class="absolute top-1 right-2 ">
            <a href="<?= base_url('/menu-profile'); ?>" id="btn-close" class="flex items-center justify-center text-center">
                <span class="w-5 h-5 text-sm font-bold transition duration-150 rounded-full shadow-md outline-none text-rose-500 bg-rose-300 hover:ring-1 hover:ring-rose-100 hover:bg-rose-400 hover:text-white">
                    x
                </span>
            </a>
        </div>
        <div class="flex items-center justify-center w-full h-full py-20">
            <form action="<?= base_url('/ubah-password'); ?>" method="post" class="flex flex-col w-2/3 gap-y-5" id="update-profile">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="flex flex-col gap-y-2">
                    <label for="password_baru" class="text-base font-bold text-slate-500">Password baru</label>
                    <input type="password" name="password_baru" id="password_baru" class="w-full px-4 py-3 text-sm font-bold border rounded-full shadow-md outline-none border-light-primary hover:ring-sky-200 hover:ring focus-within:ring-sky-200 focus-within:ring text-slate-500">
                    <span class="flex">
                        <p class="font-sans text-xs text-red-500">
                            <?= $validation->getError('password_baru') ?>
                        </p>
                    </span>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="password_baru_confirm" class="text-base font-bold text-slate-500">Konfirmasi Password baru</label>
                    <input type="password" name="password_baru_confirm" id="password_baru_confirm" class="w-full px-4 py-3 text-sm font-bold border rounded-full shadow-md outline-none border-light-primary hover:ring-sky-200 hover:ring focus-within:ring-sky-200 focus-within:ring text-slate-500">
                    <span class="flex">
                        <p class="font-sans text-xs text-red-500">
                            <?= $validation->getError('password_baru_confirm') ?>
                        </p>
                    </span>
                </div>
                <div class="flex flex-row justify-end">
                    <button type="submit" class="w-2/3 px-2 py-2 text-sm font-bold text-white rounded-full shadow-md bg-sky-400" id="btn-profile">
                        Ubah password
                    </button>
                </div>
            </form>
        </div>
    </div>

</section>
<?= $this->include('frontend/component/footer'); ?>
<?= $this->include('frontend/component/modal-logout'); ?>
<?= $this->include('frontend/component/menu'); ?>
<div class="absolute top-0 bottom-0 left-0 right-0 hidden w-full h-full bg-transparent/50" id="bg-transparan">
</div>
<div class="fixed top-0 bottom-0 left-0 right-0 hidden w-full h-56 px-4 m-auto md:w-1/4 md:px-0" id="loading">
    <div class="flex flex-col items-center justify-center px-10 py-10 m-auto text-sm font-bold rounded-md shadow-md bg-light-primary text-slate-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-primary animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        Menunggu...
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    // View Menu
    const btnClose = document.querySelector('#btn-close');
    const box = document.querySelector('#box');

    btnClose.addEventListener('click', function() {
        box.classList.add('hidden');
    });

    // Image Profile
    function previewImage() {
        const image = document.querySelector('#image_profile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    const updateProfile = document.querySelector('#update-profile');
    const loading = document.querySelector('#loading');
    const btnProfile = document.querySelector('#btn-profile');
    const transparent = document.querySelector('#bg-transparan');

    btnProfile.addEventListener('click', function() {
        updateProfile.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('button');
            transparent.classList.remove('hidden');
            loading.classList.remove('hidden');
            setTimeout(() => {
                return updateProfile.submit();
            }, 5000)
        })
    })
</script>
<script src="<?= base_url('assets/js/frontend/scripts.js'); ?>"></script>
<?= $this->endSection(); ?>