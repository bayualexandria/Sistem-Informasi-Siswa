<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <div class="flex flex-col w-full p-5 bg-white rounded-md shadow-md">
            <h6 class="text-lg font-bold text-slate-500">Data Ruang Kelas</h6>

            <!-- Start Head -->
            <div class="flex flex-col items-center py-5 md:justify-between md:flex-row gap-y-5">
                <form action="<?= base_url('/kelas') ?>">
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
            <!-- End Head -->

            <!-- Start Include Message Error -->
            <?= $this->include('backend/pages/kelas/components/kelas/modal_message_error'); ?>
            <!-- End Include Message Error -->

            <!-- Start Table Data Guru -->
            <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">
                <table class="w-full divide-y divide-gray-300 ">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                #
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Kelas
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Jurusan
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Wali Kelas
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Ubah
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Hapus
                            </th>
                            <th class="px-6 py-[10px] text-sm text-gray-500">
                                Siswa/Siswi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        <!-- Start Looping Data -->
                        <?= $this->include('backend/pages/kelas/components/kelas/looping'); ?>
                        <!-- End Looping Data -->
                    </tbody>
                </table>

            </div>
            <!-- End Table Data Guru -->

            <!-- Start Pagination -->
            <div class="flex justify-end py-5">
                <?= $pager->links('pagination', 'paginate'); ?>
            </div>
            <!-- End Pagination -->

        </div>
    </div>
</div>

<!-- Start Include Add Data -->
<?= $this->include('backend/pages/kelas/components/kelas/modal_add_data'); ?>
<!-- End Include Add Data -->

<!-- Start Include Update Data -->
<?= $this->include('backend/pages/kelas/components/kelas/modal_update_data'); ?>
<!-- End Include Update Data -->

<!-- Start Include Delete Data -->
<?= $this->include('backend/pages/kelas/components/kelas/modal_delete_data'); ?>
<!-- End Include Delete Data -->

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    function showModal(id) {
        const btnModal = document.getElementById(id);
        const toggle = document.querySelector(btnModal.getAttribute('data-bs-target'));
        toggle.classList.toggle('hidden');
    }

    function empty() {
        const search = document.getElementById('search');
        document.getElementById('modal-error').classList.add('hidden');
        // return location.href = '<?= base_url('/guru') ?>';
    }
</script>
<?= $this->endSection(); ?>