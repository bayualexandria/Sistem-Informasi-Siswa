<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-8 overflow-y-auto">
        <div class="flex justify-start pb-4">
            <h4 class="font-bold text-xl2 text-slate-500">Dashboard</h4>
        </div>

        <div class="flex flex-col gap-y-10">
            <div class="grid gap-10 grid-col-1 md:grid-cols-2 lg:grid-cols-4">

                <a href="#" class="p-6 transition duration-300 bg-white rounded-lg shadow-lg group ring-1 ring-slate-900/5 hover:bg-orange-500 hover:ring-orange-500">
                    <div class="flex items-center gap-x-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-orange-500 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                        <h3 class="text-lg font-semibold text-slate-900 group-hover:text-white">Guru</h3>
                    </div>
                    <div class="flex justify-center pt-1">
                        <p class="text-lg font-bold text-slate-500 group-hover:text-white"><?= $guru; ?></p>
                    </div>
                </a>

                <a href="#" class="p-6 transition duration-300 bg-white rounded-lg shadow-lg group ring-1 ring-slate-900/5 hover:bg-lime-500 hover:ring-lime-500">
                    <div class="flex items-center gap-x-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-lime-500 group-hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <h3 class="text-lg font-semibold text-slate-900 group-hover:text-white">Siswa</h3>
                    </div>
                    <div class="flex justify-center pt-1">
                        <p class="text-lg font-bold text-slate-500 group-hover:text-white"><?= $siswa; ?></p>
                    </div>
                </a>

                <a href="#" class="p-6 transition duration-300 bg-white rounded-lg shadow-lg group ring-1 ring-slate-900/5 hover:bg-indigo-500 hover:ring-indigo-500">
                    <div class="flex items-center gap-x-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-indigo-500 group-hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-slate-900 group-hover:text-white">Mapel Pelajaran</h3>
                    </div>
                    <div class="flex justify-center pt-1">
                        <p class="text-lg font-bold text-slate-500 group-hover:text-white"><?= $mapel;?></p>
                    </div>
                </a>

                <a href="#" class="p-6 transition duration-300 bg-white rounded-lg shadow-lg group ring-1 ring-slate-900/5 hover:bg-rose-500 hover:ring-rose-500">
                    <div class="flex items-center gap-x-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-rose-500 group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>

                        <h3 class="text-lg font-semibold text-slate-900 group-hover:text-white">Ruang Kelas</h3>
                    </div>
                    <div class="flex justify-center pt-1">
                        <p class="text-lg font-bold text-slate-500 group-hover:text-white"><?= $kelas;?></p>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10">
                <div class="flex flex-col p-5 bg-white rounded-md shadow-md">
                    <div class="flex flex-row items-center justify-between py-5">
                        <h6 class="text-base font-bold text-slate-500">Data tahun ajaran</h6>
                        <button data-bs-toggle="modal" data-bs-target="#add" id="addBtnModal" onclick="showModal('addBtnModal')" class="px-2 py-1 text-sm font-bold text-white transition duration-200 rounded-md shadow-md bg-cyan-500 hover:text-cyan-500 hover:bg-white hover:ring hover:ring-cyan-200">Tambah data</button>
                    </div>
                    <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">
                        <table class="w-full divide-y divide-gray-300 table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-[10px] text-sm text-gray-500">Semester</th>
                                    <th class="px-3 py-[10px] text-sm text-gray-500">Tahun Ajaran</th>
                                    <th class="px-3 py-[10px] text-sm text-gray-500">Edit</th>
                                    <th class="px-3 py-[10px] text-sm text-gray-500">Hapus</th>
                                </tr>
                            </thead>
                            <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
                                <!-- Start Looping Data -->
                                <?php foreach ($semester as $s) : ?>
                                    <tr>
                                        <td class="px-3 py-[10px]">
                                            <div class="text-sm text-center text-gray-500">
                                                <?= $s->semester; ?>
                                            </div>
                                        </td>
                                        <td class="px-3 py-[10px]">
                                            <div class="text-sm text-center text-gray-500">
                                                <?= $s->tahun_pelajaran; ?>
                                            </div>
                                        </td>
                                        <td class="px-3 py-[10px]">
                                            <button type="button" data-bs-toggle="modal" id="editBtnModal" onclick="showModal('editBtnModal')" onclick="showModal('editBtnModal')" data-bs-target="#edit" class="text-sm text-center transition duration-300 outline-none hover:text-gray-500 text-sky-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="px-3 py-[10px]">
                                            <button type="button" data-bs-toggle="modal" id="deleteBtnModal" onclick="showModal('deleteBtnModal')" onclick="showModal('deleteBtnModal')" data-bs-target="#delete" class="text-sm text-center transition duration-300 outline-none hover:text-gray-500 text-rose-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- End Looping Data -->
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- Start Modal Add Data Semester -->
            <div class="relative z-10 hidden" id="add" aria-labelledby="modal-title" role="dialog" aria-modal="true">

                <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-full p-4 text-center ">
                        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="px-5 pt-5">

                                <h1 class="text-base font-bold text-slate-500">Tambah Data Tahun Ajaran</h1>
                            </div>
                            <form action="<?= base_url('/semester'); ?>" method="post">
                                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                                    <?= csrf_field(); ?>
                                    <div class="flex flex-row p-4 gap-y-2 gap-x-5">
                                        <div class="flex flex-col w-full gap-y-2">
                                            <label for="semester" class="text-base font-normal text-slate-600">Semester</label>
                                            <select name="semester" id="semester" class="px-4 py-2 bg-white rounded-md shadow-md outline-none text-slate-500">
                                                <option value="I" class="text-sm font-bold text-slate-500">I</option>
                                                <option value="II" class="text-sm font-bold text-slate-500">II</option>
                                            </select>
                                            <span class="flex">
                                                <p class="pt-2 font-sans text-xs text-red-500">
                                                    <?= $validation->getError('semester') ?>
                                                </p>
                                            </span>
                                        </div>
                                        <div class="flex flex-col w-full gap-y-2">
                                            <label for="semester" class="text-base font-normal text-slate-600">Tahun Ajaran</label>
                                            <div class="flex flex-row items-center gap-x-3">
                                                <select name="tahun-start" id="tahun-start" class="px-4 py-2 bg-white rounded-md shadow-md outline-none text-slate-500">
                                                    <option value="<?= date('Y') + 1; ?>" class="text-sm font-bold text-slate-500"><?= date('Y') + 1; ?></option>
                                                    <?php for ($i = date('Y'); $i >= date('Y') - 22; $i -= 1) : ?>
                                                        <option value="<?= $i; ?>" class="text-sm font-bold text-slate-500"><?= $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                                <p class="font-bold text-slate-500">/</p>
                                                <select name="tahun-end" id="tahun-end" class="px-4 py-2 bg-white rounded-md shadow-md outline-none text-slate-500">
                                                    <option value="<?= date('Y') + 1; ?>" class="text-sm font-bold text-slate-500"><?= date('Y') + 1; ?></option>
                                                    <?php for ($i = date('Y'); $i >= date('Y') - 22; $i -= 1) : ?>
                                                        <option value="<?= $i; ?>" class="text-sm font-bold text-slate-500"><?= $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
                                    <button type="submit" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Simpan</button>
                                    <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('addBtnModal')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Add Data Semester -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?php $this->section('script'); ?>
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
<?php $this->endSection(); ?>