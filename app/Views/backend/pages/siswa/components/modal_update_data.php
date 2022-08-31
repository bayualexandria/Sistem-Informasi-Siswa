<?php foreach ($siswa as $s) : ?>
    <div class="relative z-10 hidden" id="edit<?= $s->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="px-5 pt-5">

                        <h1 class="text-base font-bold text-slate-500">Update Data Siswa</h1>
                    </div>
                    <form action="<?= base_url('/siswa/' . $s->no_induk); ?>" method="post" enctype="multipart/form-data">
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="flex flex-col p-4 modal-body gap-y-2">
                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="no_induk" class="text-base font-normal text-slate-600">No Induk</label>
                                    <input type="text" class="w-full px-3 py-1 text-slate-500 border rounded-md bg-slate-300 focus:outline-none focus:ring-1 <?= $validation->hasError('no_induk') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-slate-500'; ?>" name="no_induk" value="<?= $s->no_induk; ?>" readonly />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('no_induk') ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="nama" class="text-base font-normal text-slate-600">Nama Lengkap</label>
                                    <input type="text" name="nama" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('nama') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-slate-500 placeholder:text-sm placeholder:font-bold" placeholder="<?= $s->nama; ?>" name="nama" value="<?= old('nama') ?? $s->nama; ?>" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('nama') ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="flex flex-row justify-between">

                                    <div class="flex flex-col w-full gap-2 ">
                                        <label for="jenis_kelamin" class="text-base font-normal text-slate-600">Jenis Kelamin</label>
                                        <div class="flex flex-col justify-start md:flex-row gap-x-2">
                                            <div class="flex flex-row gap-x-1">
                                                <input class="w-3.5 h-3.5 mt-1 mr-2 transition duration-200 bg-white bg-center border rounded-full appearance-none cursor-pointer checked:bg-primary checked:border-primary focus:outline-none align-center border-primary" type="radio" name="jenis_kelamin" value="Laki-laki" <?= $s->jenis_kelamin === 'Laki-laki' ? 'checked' : ''; ?>>
                                                <label class="inline-block text-gray-800 form-check-label" for="Laki-laki">Laki-laki</label>
                                            </div>
                                            <div class="flex flex-row gap-x-1">
                                                <input class="w-3.5 h-3.5 mt-1 mr-2 transition duration-200 bg-white bg-center border rounded-full appearance-none cursor-pointer checked:bg-primary checked:border-primary focus:outline-none align-center border-primary" type="radio" name="jenis_kelamin" <?= $s->jenis_kelamin === 'Perempuan' ? 'checked' : ''; ?> value="Perempuan">
                                                <label class="inline-block text-gray-800 form-check-label" for="Perempuan">Perempuan</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full gap-y-2">
                                        <label for="namno_hpa" class="text-base font-normal text-slate-600">No. Handphone</label>
                                        <input type="text" name="no_hp" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('no_hp') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold " name="no_hp" value="<?= old('no_hp') ?? $s->no_hp; ?>" placeholder="<?= $s->no_hp; ?>" />
                                        <span class="flex">
                                            <p class="pt-2 font-sans text-xs text-red-500">
                                                <?= $validation->getError('no_hp') ?>
                                            </p>
                                        </span>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-x-2">
                                    <div class="flex justify-start">
                                        <div class="w-full mb-3">
                                            <label for="image_profile" class="inline-block mb-2 text-gray-700 form-label">Foto Profile</label>
                                            <div class="flex flex-row">
                                                <input class="file:rounded-full file:bg-sky-200 file:border-none file:text-sm file:font-bold file:text-primary file:px-4 file:py-1.5 file:cursor-pointer outline-none text-slate-500 text-sm font-bold hover:file:bg-primary transition duration-200 hover:file:text-white" type="file" name="image_profile" onchange="updatePreviewImage('<?= $s->id ?>')" id="updateImage<?= $s->id ?>" value="<?= old('image_profile'); ?>">
                                            </div>
                                            <span class="flex">
                                                <p class="pt-2 font-sans text-xs text-red-500">
                                                    <?= $validation->getError('image_profile') ?>
                                                </p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <?php if ($s->image_profile) : ?>
                                            <img src=" <?= base_url('assets/img/profile/siswa/' . $s->image_profile); ?>" alt="cover" class="rounded-md img-preview" id="img-preview<?= $s->id ?>">
                                        <?php else : ?>
                                            <img src="" alt="cover" class="hidden rounded-md img-preview" id="img-preview<?= $s->id ?>">
                                        <?php endif; ?>

                                    </div>
                                </div>

                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="nama" class="text-base font-normal text-slate-600">Alamat</label>
                                    <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 outline-none focus:ring-1 focus:ring-primary  <?= $validation->hasError('alamat') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold" rows="3" placeholder="Jl. Mawar Block B No. 50,Kedungmundu, Semarang Barat" name="alamat"><?= old('alamat') ?? $s->alamat; ?></textarea>
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('alamat') ?>
                                        </p>
                                    </span>
                                </div>
                            </div>


                        </div>
                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
                            <button type="submit" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Update</button>
                            <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('editBtnModal<?= $s->id ?>')">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>