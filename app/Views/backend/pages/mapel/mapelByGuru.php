<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <div class="flex flex-col w-full p-5 ">
            <h6 class="text-lg font-bold text-slate-500">Data Mata Pelajaran</h6>
            <!-- Start Head -->
            <div class="flex flex-col items-center py-5 md:justify-between md:flex-row gap-y-5">
                <form action="<?= base_url('/mapel/' . guru()->nip) ?>">
                    <div class="relative mt-1 rounded-md shadow-sm md:block">
                        <input type="search" name="search" id="search" class="block w-full px-4 py-2 border rounded-md shadow-md border-sky-300 iw wlp2s0mon interface add mon0 type monitorfocus:ring-sky-500 focus:border-sky-500 sm:text-sm focus:outline-none" autocomplete="off" autofocus value="<?= $keyword; ?>">

                        <button type="submit" class="absolute inset-y-0 right-0 flex items-center px-6 py-2 text-white transition duration-300 shadow-md bg-primary rounded-r-md hover:ring-2 hover:ring-sky-300 hover:bg-white hover:text-primary">
                            <i class="far fa-search"></i>
                        </button>
                    </div>
                </form>
                <button class="flex items-center gap-2 p-2 text-sm text-white transition duration-300 rounded-md shadow-md bg-primary hover:bg-white hover:text-primary hover:ring hover:ring-sky-300" data-bs-toggle="modal" data-bs-target="#add" id="addBtnModal" onclick="showModal('addBtnModal')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tambah Data
                </button>
            </div>
            <!-- End Head -->

            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">
                <!-- Start Looping Data -->
                <?= $this->include('backend/pages/mapel/components/mapel/looping'); ?>
                <!-- End Looping Data -->
            </div>

            <!-- Start Pagination -->
            <div class="flex justify-end py-5">
                <?= $pager->links('pagination', 'paginate'); ?>
            </div>
            <!-- End Pagination -->

        </div>
    </div>
</div>

<!-- Start Include Add Data -->
<?= $this->include('backend/pages/mapel/components/mapel/modal_add_data'); ?>
<!-- End Include Add Data -->

<!-- Start Include Update Data -->
<?= $this->include('backend/pages/mapel/components/mapel/modal_update_data'); ?>
<!-- End Include Update Data -->

<!-- Start Include Delete Data -->
<?= $this->include('backend/pages/mapel/components/mapel/modal_delete_data'); ?>
<!-- End Include Delete Data -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?= $this->include('backend/component/scripts/scripts'); ?>
<?= $this->endSection(); ?>