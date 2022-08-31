<?php foreach ($kelas as $k) : ?>
    <div class="relative z-10 hidden" id="edit<?= $k->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="px-5 pt-5">

                        <h1 class="text-base font-bold text-slate-500">Update Data Siswa</h1>
                    </div>
                    <form action="<?= base_url('/kelas/' . $k->id); ?>" method="post" enctype="multipart/form-data">
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="flex flex-col p-4 modal-body gap-y-2">
                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="kelas" class="text-base font-normal text-slate-600">Kelas</label>
                                    <input type="text" id="kelas" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('kelas') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold" name="kelas" value="<?= old('kelas') ?? $k->kelas; ?>" placeholder="XII" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('kelas') ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="nama" class="text-base font-normal text-slate-600">Jurusan</label>
                                    <select name="id_jurusan" id="id_jurusan" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?= $j->id; ?>" class="rounded-md" <?= ($j->id === $k->id_jurusan) ? 'selected' : '' ?>><?= $j->jurusan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="nama" class="text-base font-normal text-slate-600">Wali Kelas</label>
                                    <select name="id_guru" id="id_guru" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                                        <?php foreach ($guru as $g) : ?>
                                            <option value="<?= $g->id; ?>" class="rounded-md" <?= ($g->id === $k->id_guru) ? 'selected' : ''; ?>><?= $g->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </span>
                                </div>
                            </div>



                        </div>
                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
                            <button data-bs-toggle="modal" id="editBtnModal<?= $k->id ?>" onclick="showModal('editBtnModal<?= $k->id ?>')" onclick="showModal('editBtnModal<?= $k->id ?>')" data-bs-target="#edit<?= $k->id ?>" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Update</button>
                            <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('editBtnModal<?= $k->id ?>')">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>