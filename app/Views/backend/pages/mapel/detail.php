<?= $this->extend('backend/app.php'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <h6 class="text-lg font-bold text-slate-500">Data Mata Pelajaran</h6>
        <div class="flex flex-col py-10 lg:flex-row lg:gap-x-5 gap-y-5">
            <div class="flex flex-col w-full">
                <div class="flex flex-col w-full p-5 bg-white rounded-lg shadow-md md:w-full gap-y-10">
                    <h5 class="text-base font-bold text-slate-500">Data Guru Mapel <?= $mapel->nama_mapel; ?> Kelas <?= $kelas->kelas; ?> <?= $jurusan->jurusan; ?></h5>
                    <div class="grid grid-cols-3 py-5 gap-x-5">
                        <div class="flex items-center justify-center w-full">
                            <div class="overflow-hidden border-2 rounded-full shadow-lg w-36 h-36 border-slate-300">
                                <img src="<?= base_url('assets/img/profile/guru/' . $guru->image_profile); ?>" alt="">
                            </div>
                        </div>
                        <div class="flex flex-col col-span-2 text-sm border divide-y rounded-md shadow-md gap-y-2 border-slate-300 text-slate-500">
                            <div class="grid grid-cols-4 p-3 ">
                                <p class="font-bold">NIP</p>
                                <p class="w-full col-span-3"><?= $guru->nip; ?></p>
                            </div>
                            <div class="grid grid-cols-4 p-3 ">
                                <p class="font-bold">Nama</p>
                                <p class="w-full col-span-3"><?= $guru->nama; ?></p>
                            </div>
                            <div class="grid grid-cols-4 p-3">
                                <p class="font-bold">No. Hp</p>
                                <p class="w-full col-span-3"><?= $guru->no_hp; ?></p>
                            </div>
                            <div class="grid grid-cols-4 p-3 ">
                                <p class="font-bold">Alamat</p>
                                <p class="w-full col-span-3"><?= $guru->alamat; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full p-5 bg-white rounded-lg shadow-md gap-y-3">
                <div class="flex flex-row items-center justify-between">
                    <h6 class="pb-5 text-base font-bold text-slate-500">Data Siswa/Siswi</h6>

                    <form action="" method="get" class="block">
                        <div class="relative">
                            <input type="text" name="search" id="search" class="py-1.5 rounded-full shadow-md outline-none border-slate-300 px-4 border text-slate-500 text-sm font-bold" value="<?= $keyword; ?>">
                            <div class="absolute top-1.5 right-3 bg-white">
                                <button class="outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if ($nilaiRataRata) : ?>
                    <div class="flex flex-row items-center">
                        <p class="text-sm font-bold text-slate-500">Nilai Rata Rata Kelulusan &nbsp;&nbsp;</p>
                        <button class="p-2 text-sm font-bold rounded-md shadow-md outline-none bg-slate-100 text-lime-500" data-bs-toggle="modal" data-bs-target="#updateNilaiRataRata" id="updateNilaiRataRataModal" onclick="showModal('updateNilaiRataRataModal')">
                            <?= $nilaiRataRata['nilai_rata_rata']; ?>
                        </button>
                    </div>
                <?php else : ?>
                    <div class="flex flex-row items-center justify-center w-1/2">
                        <button class="px-2 py-1 text-sm font-bold text-white transition duration-200 rounded-full shadow-md bg-sky-500 hover:ring hover:ring-sky-300 hover:text-sky-500 hover:bg-white" data-bs-toggle="modal" data-bs-target="#addNilaiRataRata" id="addNilaiRataRataModal" onclick="showModal('addNilaiRataRataModal')">Nilai Rata Rata</button>
                    </div>
                <?php endif; ?>
                <!-- Start Table Data Siswa -->
                <?= $this->include('backend/pages/mapel/components/detail/lopping'); ?>
                <!-- End Table Data Siswa -->

                <!-- Start Pagination -->
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <a href="<?= base_url(''); ?>" class="px-4 py-2 text-sm text-white rounded-full outline-none bg-lime-500" target="_blank">Data Nilai</a>
                    </div>
                    <div class="flex justify-end py-5">
                        <?= $pager->links('pagination', 'paginate'); ?>
                    </div>
                </div>
                <!-- End Pagination -->

            </div>
        </div>
        <!-- <div class="flex flex-col lg:flex-row lg:gap-x-5 gap-y-5">
            <div class="flex flex-col w-1/3 p-5 my-5 bg-white rounded-lg shadow-md gap-y-3">
                <div class="flex flex-row items-center justify-between">
                    <h6 class="pb-5 text-base font-bold text-slate-500">Jadwal Mata Pelajaran</h6>

                </div>
                
                <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">

                    <table class="w-full divide-y divide-gray-300 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-[10px] text-sm text-gray-500">Hari</th>
                                <th class="px-3 py-[10px] text-sm text-gray-500">Mapel</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
                            
                        </tbody>
                    </table>

                </div>
               
            </div>
        </div> -->
    </div>
</div>

<!-- Start Include Add Nilai -->
<?= $this->include('backend/pages/mapel/components/detail/modal_add_nilai'); ?>
<!-- End Include Add Nilai -->


<!-- Start Include Update Niali -->
<?= $this->include('backend/pages/mapel/components/detail/modal_update_nilai'); ?>
<!-- End Include Update Nilai -->

<!-- Start Include Add Nilai Rata Rata -->
<?= $this->include('backend/pages/mapel/components/detail/modal_add_nilai_rata_rata'); ?>
<!-- End Include Add Nilai Rata Rata -->

<!-- Start Modal Update Nilai Rata Rata -->
<?= $this->include('backend/pages/mapel/components/detail/modal_update_nilai_rata_rata'); ?>
<!-- End Modal Update Nilai Rata Rata -->
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