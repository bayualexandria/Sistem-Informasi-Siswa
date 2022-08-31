<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/logo-menu'); ?>

<section class="w-full pt-5 pl-5 pr-5">
    <div class="relative rounded-md shadow-md h-[34rem] bg-light-primary" id="box">
        <div class="absolute top-1 right-2 ">
            <a href="<?= base_url('/menu-profile'); ?>" id="btn-close" class="flex items-center justify-center text-center">
                <span class="w-5 h-5 text-sm font-bold transition duration-150 rounded-full shadow-md outline-none text-rose-500 bg-rose-300 hover:ring-1 hover:ring-rose-100 hover:bg-rose-400 hover:text-white">
                    x
                </span>
            </a>
        </div>
        <div class="flex items-center justify-center w-full h-full py-20">
            <form action="<?= base_url('/edit-profile'); ?>" method="post" class="flex flex-col w-2/3 gap-y-5" enctype="multipart/form-data" id="update-profile">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="flex flex-row w-full gap-20">
                    <div class="flex flex-col w-full gap-4">
                        <div class="flex flex-col gap-y-2">
                            <label for="nama" class="text-base font-bold text-slate-500">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="w-full px-4 py-3 text-sm font-bold border rounded-full shadow-md outline-none border-light-primary hover:ring-sky-200 hover:ring focus-within:ring-sky-200 focus-within:ring text-slate-500" value="<?= old('nama') ?? $siswa->nama; ?>">
                            <span class="flex">
                                <p class="font-sans text-xs text-red-500">
                                    <?= $validation->getError('nama') ?>
                                </p>
                            </span>
                        </div>
                        <div class="flex flex-col w-full gap-y-2">
                            <label for="jenis_kelamin" class="text-base font-bold text-slate-500">Jenis Kelamin</label>
                            <div class="flex justify-start">
                                <div class="form-check form-check-inline">
                                    <input class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-sky-400 checked:border-sky-400 focus:outline-none" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" <?= $siswa->jenis_kelamin == 'Laki-laki' ? 'checked' : ''; ?>>
                                    <label class="text-base font-bold text-slate-500" for="Laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-sky-400 checked:border-sky-400 focus:outline-none" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" <?= $siswa->jenis_kelamin == 'Perempuan' ? 'checked' : ''; ?>>
                                    <label class="text-base font-bold text-slate-500" for="Perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full gap-4">
                        <div class="flex flex-col gap-y-2">
                            <label for="no_hp" class="text-base font-bold text-slate-500">No Handhpone</label>
                            <input type="text" name="no_hp" id="no_hp" class="w-full px-4 py-3 text-sm font-bold border rounded-full shadow-md outline-none border-light-primary hover:ring-sky-200 hover:ring focus-within:ring-sky-200 focus-within:ring text-slate-500" value="<?= old('no_hp') ?? $siswa->no_hp; ?>">
                            <span class="flex">
                                <p class="font-sans text-xs text-red-500">
                                    <?= $validation->getError('no_hp') ?>
                                </p>
                            </span>
                        </div>
                        <div class="flex flex-row items-center justify-center gap-x-3">
                            <div class="flex justify-start">
                                <div class="w-full mb-3">
                                    <label for="image_profile" class="text-base font-bold text-slate-500">Foto Profile</label>
                                    <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border-light-primary hover:ring-sky-200 hover:ring focus-within:ring-sky-200 focus-within:ring rounded-md " type="file" name="image_profile" onchange="previewImage()" id="image_profile">
                                    <span class="flex">
                                        <p class="font-sans text-xs text-red-500">
                                            <?= $validation->getError('image_profile') ?>
                                        </p>
                                    </span>
                                </div>

                            </div>
                            <div class="w-56">
                                <?php if ($siswa->image_profile) : ?>
                                    <img src="<?= base_url('assets/img/profile/siswa/' . $siswa->image_profile); ?>" alt="cover" class="rounded-md w-[40rem] img-preview">
                                <?php else : ?>
                                    <img src="" alt="cover" class="hidden rounded-md w-[40rem] img-preview">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full gap-y-2">
                    <label for="alamat" class="text-base font-bold text-slate-500">Alamat</label>
                    <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white border-light-primary hover:ring-sky-200 hover:ring focus-within:ring-sky-200 focus-within:ring rounded-md outline-none" id="alamat" rows="3" placeholder="Alamat Lengkap" name="alamat"><?= old('alamat') ?? $siswa->alamat; ?></textarea>
                    <span class="flex">
                        <p class="font-sans text-xs text-red-500">
                            <?= $validation->getError('alamat') ?>
                        </p>
                    </span>
                </div>
                <div class="flex flex-row justify-end">

                    <button type="submit" class="w-1/6 px-2 py-2 text-sm font-bold text-white rounded-full shadow-md bg-sky-400" id="btn-profile">
                        Ubah profile
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