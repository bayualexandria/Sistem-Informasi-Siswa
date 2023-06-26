<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <h6 class="text-lg font-bold text-slate-500">Data Ruang Kelas</h6>

        <div class="flex flex-col lg:flex-row lg:gap-x-5 gap-y-5">
            <div class="flex flex-col w-full">
                <!-- Start Head -->
                <div id="searchBoxSiswa" kelas="<?= $kelas->id; ?>" class="py-10" status-id="<?= session('status_id'); ?>">
                </div>
                <!-- End Head -->

                <div class="flex flex-col w-full p-5 bg-white rounded-lg shadow-md md:w-full gap-y-10">
                    <h5 class="text-base font-bold text-slate-500">Data Wali Kelas <?= $kelas->kelas; ?> <?= $jurusan->jurusan; ?></h5>
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
                    <form action="<?= base_url('/siswa/wali-kelas/' . $kelas->id); ?>" method="get" class="block">
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
                <!-- Start Table Data Guru -->
                <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">

                    <table class="w-full divide-y divide-gray-300 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-[10px] text-sm text-gray-500">#</th>
                                <th class="px-3 py-[10px] text-sm text-gray-500">No Induk</th>
                                <th class="px-3 py-[10px] text-sm text-gray-500">Nama</th>
                                <?php if (session('status_id') == 1) : ?>
                                    <th class="px-3 py-[10px] text-sm text-gray-500">Ubah</th>
                                <?php endif; ?>
                                <th class="px-3 py-[10px] text-sm text-gray-500">Hapus</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
                            <!-- Start Looping Data -->
                            <?= $this->include('backend/pages/kelas/components/siswa/looping'); ?>
                            <!-- End Looping Data -->
                        </tbody>
                    </table>

                </div>
                <!-- End Table Data Guru -->

                <!-- Start Pagination -->
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <a href="<?= base_url('/laporan-data-kelas-siswa/' . $kelas->id); ?>" class="px-4 py-2 text-sm text-white rounded-full outline-none bg-lime-500" target="_blank">Data Siswa/Siswi</a>
                    </div>
                    <div class="flex justify-end py-5">
                        <?= $pager->links('pagination', 'paginate'); ?>
                    </div>
                </div>
                <!-- End Pagination -->

            </div>
        </div>
        <div class="flex flex-col lg:flex-row lg:gap-x-5 gap-y-5">
            <div class="flex flex-col w-1/3 p-5 my-5 bg-white rounded-lg shadow-md gap-y-3">
                <div class="flex flex-row items-center justify-between">
                    <h6 class="pb-5 text-base font-bold text-slate-500">Jadwal Mata Pelajaran</h6>
                    <a href="<?= base_url('/laporan-data-jadwal-mapel/' . $kelas->id); ?>" class="px-3 py-1.5 text-sm text-white rounded-full outline-none bg-lime-500" target="_blank">Jadwal Mapel</a>
                </div>
                <!-- Start Table Data Jadwal Mapel -->
                <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">

                    <table class="w-full divide-y divide-gray-300 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-[10px] text-sm text-gray-500">Hari</th>
                                <th class="px-3 py-[10px] text-sm text-gray-500">Mapel</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
                            <!-- Start Looping Data -->
                            <?php foreach ($mapel as $m) : ?>
                                <tr>

                                    <td class="px-3 py-[10px]">
                                        <div class="text-sm text-center text-gray-500">
                                            <?= $m->hari; ?>
                                        </div>
                                    </td>
                                    <td class="px-3 py-[10px] text-center">
                                        <button class="text-sm text-center outline-none hover:text-lime-800 text-lime-500" type="button" data-bs-toggle="modal" id="showModal<?= $m->hari ?>" onclick="showModal('showModal<?= $m->hari ?>')" onclick="showModal('showModal<?= $m->hari ?>')" data-bs-target="#show<?= $m->hari ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                            </svg>
                                        </button>
                                    </td>

                                <?php endforeach; ?>
                                <!-- End Looping Data -->
                        </tbody>
                    </table>

                </div>
                <!-- End Table Data Jadwal Mapel -->
            </div>
        </div>
    </div>
</div>

<!-- Start Include Update Kelas Siswa -->
<?= $this->include('backend/pages/kelas/components/siswa/modal_update_siswa'); ?>
<!-- End Include Update Kelas Siswa -->

<!-- Start Include Delete Kelas Siswa -->
<!-- <?= $this->include('backend/pages/kelas/components/siswa/modal_delete_siswa'); ?> -->
<!-- End Include Delete Kelas Siswa -->

<!-- Start Modal Show Jadwal Mapel -->
<?php foreach ($mapel as $m) : ?>
    <div class="relative z-10 hidden" id="show<?= $m->hari; ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="absolute top-1.5 right-3 ">
                        <button class="text-base font-bold outline-none text-rose-500" onclick="showModal('showModal<?= $m->hari ?>')">
                            x
                        </button>
                    </div>
                    <div class="px-5 pt-10">

                        <h1 class="text-base font-bold text-slate-500">Jadwal Mata Pelajaran hari <?= $m->hari; ?></h1>
                    </div>

                    <div class="flex flex-col px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4 gap-y-5">
                        <?php $db = db_connect();
                        $jadwal = $db->table('mapel')->select('mapel.*,guru.nama')->join('guru', 'guru.id=mapel.guru_id')->where('hari', $m->hari)->where('kelas_id', $kelas->id)->orderBy('waktu', 'ASC')->get()->getResultObject(); ?>
                        <?php foreach ($jadwal as $j) : ?>
                            <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">
                                <table class="w-full divide-y divide-gray-300 table-auto">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 py-[10px] text-sm text-gray-500 text-center">Mata Pelajaran</th>
                                            <th class="px-3 py-[10px] text-sm text-gray-500 text-center">Waktu</th>
                                            <th class="px-3 py-[10px] text-sm text-gray-500 text-center">Guru Pengampu</th>
                                        </tr>
                                    </thead>
                                    <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
                                        <!-- Start Looping Data -->
                                        <tr>

                                            <td class="px-3 py-[10px]">
                                                <div class="text-sm text-center text-gray-500">
                                                    <?= $j->nama_mapel; ?>
                                                </div>
                                            </td>
                                            <td class="px-3 py-[10px]">
                                                <div class="text-sm text-center text-gray-500">
                                                    <?= $j->waktu; ?>
                                                </div>
                                            </td>
                                            <td class="px-3 py-[10px]">
                                                <div class="text-sm text-center text-gray-500">
                                                    <?= $j->nama; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- End Looping Data -->
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Show Jadwal Mapel -->

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