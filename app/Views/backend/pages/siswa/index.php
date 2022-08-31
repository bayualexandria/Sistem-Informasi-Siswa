<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>

<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <div class="flex flex-col w-full p-5 bg-white rounded-md shadow-md">
            <h6 class="text-lg font-bold text-slate-500">Data Siswa</h6>

            <!-- Start Head Page -->
            <div class="flex flex-col items-center py-5 md:justify-between md:flex-row gap-y-5">
                <form action="<?= base_url('/siswa') ?>">
                    <div class="relative">
                        <input type="text" name="search" id="search" class="px-4 py-2 text-sm font-bold border rounded-full shadow-md outline-none border-slate-300 text-slate-500" value="<?= $keyword; ?>">
                        <div class="absolute bg-white top-2 right-3">
                            <button class="outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <button class="flex items-center gap-2 p-2 text-sm text-white transition duration-300 rounded-md shadow-md bg-primary hover:bg-white hover:text-primary hover:ring hover:ring-sky-300" data-bs-toggle="modal" data-bs-target="#add" id="addBtnModal" onclick="showModal('addBtnModal')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tambah Data
                </button>
            </div>
            <!-- End Head Page -->

            <!-- Start Data Table Siswa -->
            <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">
                <table class="w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                #
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Nama
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                No. Induk
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Tanggal akun
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Status
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Ubah
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Hapus
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        <!-- Start Include Looping Data Siswa -->
                        <?= $this->include('backend/pages/siswa/components/looping'); ?>
                        <!-- End Include Looping Data Siswa -->
                    </tbody>
                </table>

            </div>
            <!-- End Data Table Siswa -->

            <!-- Start Pagination -->
            <div class="flex justify-end py-5">
                <?= $pager->links('pagination', 'paginate'); ?>
            </div>
            <!-- End Pagination -->

        </div>
    </div>
</div>

<!-- Start Include Add Data -->
<?= $this->include('backend/pages/siswa/components/modal_add_data'); ?>
<!-- End Include Add Data -->

<!-- Start Include Update Data -->
<?= $this->include('backend/pages/siswa/components/modal_update_data'); ?>
<!-- End Include Update Data -->

<!-- Start Include Update User -->
<?= $this->include('backend/pages/siswa/components/modal_update_user'); ?>
<!-- End Include Update User -->

<!-- Start Include Add User -->
<?= $this->include('backend/pages/siswa/components/modal_add_user'); ?>
<!-- End Include Add User -->

<!-- Start Modal Delete Siswa -->
<?php foreach ($siswa as $s) : ?>
    <div class="relative z-10 hidden" id="delete<?= $s->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">

                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="flex justify-center pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-rose-500 animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <form action="<?= base_url('/siswa/' . $s->no_induk); ?>" method="post">
                        <div class="px-4 pt-5 pb-4 text-center bg-white text-slate-700">

                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <p>Apakah anda ingin menghapus data Siswa/Siswi dengan nama <?= $s->nama; ?> ?</p>
                        </div>
                        <div class="flex flex-col gap-2 px-4 py-3 md:justify-center bg-gray-50 md:flex-row">
                            <button type="submit" class="px-4 py-2 text-base font-bold text-white transition duration-200 rounded-md bg-rose-500 hover:bg-white hover:text-rose-500 hover:ring-1 hover:ring-rose-500">Ya</button>
                            <button type="button" class="px-4 py-2 text-base font-bold text-white transition duration-200 rounded-md bg-sky-500 hover:bg-white hover:text-sky-500 hover:ring-1 hover:ring-sky-300" onclick="showModal('deleteBtnModal<?= $s->id ?>')">Tidak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Delete Siswa -->

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
    function addPreviewImage(id) {
        const image = document.getElementById(id);
        const imgPreview = document.getElementById('img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function updatePreviewImage(id) {
        const image = document.getElementById('updateImage' + id);
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function success() {
        const modalSuccess = document.querySelector('#modal-success');
        modalSuccess.classList.add('hidden');
    }

    function showModal(id) {
        const btnModal = document.getElementById(id);
        const toggle = document.querySelector(btnModal.getAttribute('data-bs-target'));
        toggle.classList.toggle('hidden');
    }

    function empty() {
        const search = document.getElementById('search');
        document.getElementById('modal-error').classList.add('hidden');
        // return location.href = '<?= base_url('/siswa') ?>';
    }
</script>
<?= $this->endSection(); ?>