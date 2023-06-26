<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <div class="relative flex flex-col w-full bg-white rounded-md shadow-md md:p-5">
            <h6 class="p-5 text-lg font-bold text-slate-500"><?= auth()->status_id == 2 ? 'Edit Data Guru' : 'User Administrator'; ?></h6>

            <div class="<?= auth()->status_id == 2 ? 'md:grid-cols-2 grid-cols-1 md:gap-x-5 grid px-10' : '' ?> py-10">
             
            </div>

        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="fixed top-0 bottom-0 left-0 right-0 h-56 m-auto transition-all rounded-lg shadow-lg w-96 bg-slate-200" id="modal-success">
        <div class="flex flex-col items-center justify-center px-4 pt-8 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-lime-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h6 class="text-sm font-bold text-slate-500"><?= session()->getFlashdata('success'); ?></h6>
            <div class="relative flex flex-row justify-center gap-20 pt-12">
                <button class="px-4 py-2 text-sm font-bold text-white rounded-lg shadow-lg bg-lime-500 hover:ring hover:ring-lime-300" id="success">Ok</button>
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

    const btnSuccess = document.getElementById('success');
    const modalSuccess = document.getElementById('modal-success');

    btnSuccess.addEventListener('click', function() {
        modalSuccess.classList.add('hidden');
    });
</script>
<?= $this->endSection(); ?>