<?php if ($nilaiRataRata) : ?>
    <?php $db = db_connect();
    $nilai = $db->table('nilai_mapel_siswa')->select('nilai_mapel_siswa.*')->where('id_nilai', $nilaiRataRata['id'])->get()->getResultObject(); ?>
    <?php if ($nilai) : ?>
        <?php foreach ($nilai as $n) : ?>
            <div class="relative z-10 hidden" id="update-nilai<?= $n->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

                <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-full p-4 text-center ">
                        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="px-5 pt-5">

                                <h1 class="text-base font-bold text-slate-500">Update Nilai</h1>
                            </div>
                            <div class="px-5 pt-5">
                                <div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">
                                    <table class="w-full divide-y divide-gray-300 table-auto">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-3 py-[10px] text-sm text-gray-500 text-center">#</th>
                                                <th class="px-3 py-[10px] text-sm text-gray-500 text-center">No Induk</th>
                                                <th class="px-3 py-[10px] text-sm text-gray-500 text-center">Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
                                            <!-- Start Looping Data -->
                                            <?php $db = db_connect();
                                            $dataSiswa = $db->table('siswa')->select('siswa.*')->where('id', $n->id_siswa)->get()->getResultObject(); ?>
                                            <?php foreach ($dataSiswa as $s) : ?>
                                                <tr>

                                                    <td class="px-3 py-[10px]">
                                                        <div class="w-10 h-10 overflow-hidden rounded-full shadow-md">
                                                            <img src="<?= base_url('assets/img/profile/siswa/' . $s->image_profile); ?>" alt="profile">
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-[10px]">
                                                        <div class="text-sm text-center text-gray-500">
                                                            <?= $s->no_induk; ?>
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-[10px]">
                                                        <div class="text-sm text-center text-gray-500">
                                                            <?= $s->nama; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <!-- End Looping Data -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex flex-row items-center pt-5">
                                    <p class="text-base font-normal text-slate-500">Mata Pelajaran : &nbsp;&nbsp;</p>
                                    <p class="text-sm font-bold text-slate-500"><?= $mapel->nama_mapel; ?></p>
                                </div>
                            </div>
                            <form action="<?= base_url('/nilai-mapel-siswa/' . $n->id); ?>" method="post">
                                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id_mapel" value="<?= $mapel->id; ?>">
                                    <div class="flex flex-col p-4 modal-body gap-y-2">
                                        <div class="flex flex-col w-full gap-y-2">
                                            <label for="nilai" class="text-base font-normal text-slate-600">Nilai</label>
                                            <input type="text" id="nilai" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('nilai') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold" name="nilai" value="<?= $n->nilai ?? old('nilai'); ?>" placeholder="90.00" />
                                            <span class="flex">
                                                <p class="pt-2 font-sans text-xs text-red-500">
                                                    <?= $validation->getError('nilai') ?>
                                                </p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
                                    <button type="submit" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Ubah</button>
                                    <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('updateNilaiMapelSiswa<?= $n->id ?>')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>