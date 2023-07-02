<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <div class="relative flex flex-col w-full bg-white rounded-md shadow-md md:p-5">
            <div class="absolute top-3 right-3">
                <button type="button" data-bs-toggle="modal" id="editBtnModal<?= $sekolah->id ?>" onclick="showModal('editBtnModal<?= $sekolah->id ?>')" onclick="showModal('editBtnModal<?= $sekolah->id ?>')" data-bs-target="#edit<?= $sekolah->id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-sky-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                </button>
            </div>
            <h6 class="p-5 text-lg font-bold text-slate-500">Profile Sekolah</h6>

            <div class="m-5">
                <div class="flex flex-col w-full md:flex-row gap-y-5 md:gap-x-5 md:justify-between">
                    <div class="md:w-1/2 w-full justify-center items-center flex">
                        <img src="<?= base_url('/assets/' . $sekolah->logo); ?>" alt="" srcset="" class="w-1/2">
                    </div>
                    <div class="md:w-1/2 w-full h-full">
                        <div class="flex flex-col justify-center items-center gap-y-3">
                            <div class="flex flex-col gap-y-2 text-center">
                                <h1 class="text-2xl font-bold text-slate-500"><?= $sekolah->nama_sekolah; ?></h1>
                                <h1 class="text-base font-bold text-slate-700"><?= $sekolah->alamat; ?></h1>
                                <h1 class="text-base font-bold text-slate-700"><?= $sekolah->no_telp; ?></h1>
                            </div>
                            <div class="flex flex-col gap-y-2 text-center">
                                <h1 class="font-bold text-base text-slate-900">Kepala Sekolah</h1>
                                <h1 class="font-bold text-base text-slate-500"><?= $sekolah->kepala_sekolah; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Start Include Update Data Sekolah -->
<?= $this->include('backend/pages/profile/sekolah/components/modal_update_sekolah'); ?>
<!-- End Include Update Data Sekolah -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="fixed top-0 bottom-0 left-0 right-0 h-56 m-auto transition-all rounded-lg shadow-lg w-96 bg-slate-200" id="modal-success">
        <div class="flex flex-col items-center justify-center px-4 pt-8 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-lime-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h6 class="text-sm font-bold text-slate-500"><?= session()->getFlashdata('success'); ?></h6>
            <div class="relative flex flex-row justify-center gap-20 pt-12">
                <button class="px-4 py-2 text-sm font-bold text-white rounded-lg shadow-lg bg-lime-500 hover:ring hover:ring-lime-300" onclick="success()">Ok</button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
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

    function updatePreviewImage(id) {
        const image = document.getElementById('updateImage' + id);
        const imgPreview = document.getElementById('img-preview' + id);

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function showModal(id) {
        const btnModal = document.getElementById(id);
        const toggle = document.querySelector(btnModal.getAttribute('data-bs-target'));
        toggle.classList.toggle('hidden');
    }

    const btnSuccess = document.getElementById('success-update');
    const modalSuccess = document.getElementById('modal-success');

    function success() {
        const modalSuccess = document.querySelector('#modal-success');
        modalSuccess.classList.add('hidden');
    }
</script>
<?= $this->endSection(); ?>