<div class="w-full overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300 md:overflow-hidden">
    <table class="w-full divide-y divide-gray-300 table-auto">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-3 py-[10px] text-sm text-gray-500">#</th>
                <th class="px-3 py-[10px] text-sm text-gray-500">No Induk</th>
                <th class="px-3 py-[10px] text-sm text-gray-500">Nama</th>
                <th class="px-3 py-[10px] text-sm text-gray-500">Semester</th>
                <th class="px-3 py-[10px] text-sm text-gray-500">Hasil</th>
            </tr>
        </thead>
        <tbody class="overflow-y-scroll bg-white divide-y divide-gray-300">
            <!-- Start Looping Data -->
            <?php foreach ($siswa as $s) : ?>
                <tr>
                    <td class="px-3 py-[10px] text-center">
                        <div class="flex justify-center">
                            <div class="items-center w-8 h-8 overflow-hidden rounded-full">
                                <img src="<?= base_url('/assets/img/profile/siswa/' . $s->image_profile); ?>" alt="" />
                            </div>
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
                    <td class="px-3 py-[10px] text-center text-slate-500">
                        <?= $tahun[0] === date('Y') ? 'I' : ($tahun[1] === date('Y') ? 'II' : ''); ?>
                    </td>
                    <td class="px-3 py-[10px]">
                        <?php if ($nilaiRataRata) : ?>
                            <?php $db = db_connect();
                            $data = $db->table('nilai_mapel_siswa')->select('nilai_mapel_siswa.*')->where('id_siswa', $s->id)->where('id_nilai', $nilaiRataRata['id'])->get()->getResultObject();
                            ?>
                            <?php if ($data) : ?>
                                <?php foreach ($data as $d) : ?>
                                    <button type="button" data-bs-toggle="modal" id="updateNilaiMapelSiswa<?= $d->id ?>" onclick="showModal('updateNilaiMapelSiswa<?= $d->id ?>')" data-bs-target="#update-nilai<?= $d->id ?>" class="p-2 text-sm font-bold rounded-md shadow-md outline-none text-lime-500 bg-slate-100">
                                        <?= $d->nilai; ?>
                                    </button>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <button type="button" data-bs-toggle="modal" id="addNilai<?= $s->id ?>" onclick="showModal('addNilai<?= $s->id ?>')" onclick="showModal('addNilai<?= $s->id ?>')" data-bs-target="#add-nilai<?= $s->id ?>" class="text-sm text-center transition duration-300 outline-none hover:text-gray-500 text-lime-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>

                                </button>
                            <?php endif; ?>
                        <?php else : ?>
                            <button type="button" data-bs-toggle="modal" id="addNilai<?= $s->id ?>" onclick="showModal('addNilai<?= $s->id ?>')" onclick="showModal('addNilai<?= $s->id ?>')" data-bs-target="#add-nilai<?= $s->id ?>" class="text-sm text-center transition duration-300 outline-none hover:text-gray-500 text-lime-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>

                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- End Looping Data -->
        </tbody>
    </table>
</div>