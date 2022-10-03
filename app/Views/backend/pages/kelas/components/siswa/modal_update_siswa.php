<?php foreach ($siswa as $s) : ?>
    <div class="relative z-10 hidden" id="edit<?= $s->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="px-5 pt-5">

                        <h1 class="text-base font-bold text-slate-500">Pindah kelas</h1>
                    </div>
                    <?php if (session('status_id') == 1) : ?>
                        <form action="<?= base_url('/kelas/siswa/' . $s->id); ?>" method="post">
                        <?php else : ?>
                            <form action="<?= base_url('/kelas-siswa/' . $s->id); ?>" method="post">
                            <?php endif; ?>
                            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT" />
                                <div class="flex flex-col p-4 modal-body gap-y-2">
                                    <input type="hidden" name="kelas" value="<?= $kelas->id; ?>">
                                    <div class="flex flex-col w-full gap-y-2">
                                        <label for="nama" class="text-base font-normal text-slate-600">Kelas</label>
                                        <select name="kelas_id" id="kelas_id" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                                            <?php foreach ($getKelas as $k) : ?>
                                                <option value="<?= $k->id; ?>" class="rounded-md" <?= $k->id == $s->kelas_id ? 'selected' : ''; ?>><?= $k->kelas; ?> | <?= $k->jurusan; ?></option>
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
                                <button data-bs-toggle="modal" id="editBtnModal<?= $s->id ?>" onclick="showModal('editBtnModal<?= $s->id ?>')" onclick="showModal('editBtnModal<?= $s->id ?>')" data-bs-target="#edit<?= $s->id ?>" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Update</button>
                                <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('editBtnModal<?= $s->id ?>')">Batal</button>
                            </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>