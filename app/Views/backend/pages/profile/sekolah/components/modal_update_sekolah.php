<div class="relative z-10 hidden" id="edit<?= $sekolah->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-full p-4 text-center ">
            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 w-full md:w-1/2">
                <div class="px-5 pt-5">

                    <h1 class="text-base font-bold text-slate-500">Update Data Mata Pelajaran</h1>
                </div>
                <form action="<?= base_url('/profile-sekolah/' . $sekolah->id); ?>" method="post" enctype="multipart/form-data">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="flex flex-col p-4 modal-body gap-y-2">

                            <div class="flex flex-col md:flex-row md:gap-x-3 ">
                                <div class="flex flex-col w-full md:w-1/2 gap-y-2">
                                    <label for="nama_sekolah" class="text-base font-normal text-slate-600">Nama Sekolah</label>
                                    <input type="text" id="nama_sekolah" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1  placeholder:text-sm placeholder:font-bold" name="nama_sekolah" value="<?= old('nama_sekolah') ?? $sekolah->nama_sekolah; ?>" placeholder="XXX XXXXXXXX XXX" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('nama_sekolah') ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="flex flex-col w-full md:w-1/2 gap-y-2">
                                    <label for="no_telp" class="text-base font-normal text-slate-600">No. Telepon</label>
                                    <input type="text" id="no_telp" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1  placeholder:text-sm placeholder:font-bold" name="no_telp" value="<?= old('no_telp') ?? $sekolah->no_telp; ?>" placeholder="0981-XXXXXX" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('no_telp') ?>
                                        </p>
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-x-2">
                                <div class="flex justify-start">
                                    <div class="w-full mb-3">
                                        <label for="logo" class="inline-block mb-2 text-gray-700 form-label">Foto Logo Sekolah</label>
                                        <div class="flex flex-row">
                                            <input class="file:rounded-full file:bg-sky-200 file:border-none file:text-sm file:font-bold file:text-primary file:px-4 file:py-1.5 file:cursor-pointer outline-none text-slate-500 text-sm font-bold hover:file:bg-primary transition duration-200 hover:file:text-white" type="file" name="logo" onchange="updatePreviewImage('<?= $sekolah->id ?>')" id="updateImage<?= $sekolah->id ?>" value="<?= old('logo'); ?>">
                                        </div>
                                        <span class="flex">
                                            <p class="pt-2 font-sans text-xs text-red-500">
                                                <?= $validation->getError('logo') ?>
                                            </p>
                                        </span>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <?php if ($sekolah->logo) : ?>
                                        <img src=" <?= base_url('assets/img/profile/sekolah/' . $sekolah->logo); ?>" alt="cover" class="rounded-md img-preview w-full md:w-1/2" id="img-preview<?= $sekolah->id ?>">
                                    <?php else : ?>
                                        <img src="" alt="cover" class="hidden rounded-md img-preview w-full md:w-1/2" id="img-preview<?= $sekolah->id ?>">
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="flex flex-col w-full md:w-1/2 gap-y-2">
                                    <label for="kepala_sekolah" class="text-base font-normal text-slate-600">Nama Kepala Sekolah</label>
                                    <input type="text" id="kepala_sekolah" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1  placeholder:text-sm placeholder:font-bold" name="kepala_sekolah" value="<?= old('nama_mapel') ?? $sekolah->kepala_sekolah; ?>" placeholder="Ali Hasan, S.Pd M.Pd" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('kepala_sekolah') ?>
                                        </p>
                                    </span>
                                </div>
                                <div class="flex flex-col w-full md:w-1/2 gap-y-2">
                                    <label for="nip_kepsek" class="text-base font-normal text-slate-600">NIP Kepala Sekolah</label>
                                    <input type="text" id="nip_kepsek" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1  placeholder:text-sm placeholder:font-bold" name="nip_kepsek" value="<?= old('nip_kepsek') ?? $sekolah->nip_kepsek; ?>" placeholder="92831032329909" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('nip_kepsek') ?>
                                        </p>
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col w-full gap-y-2">
                                <label for="nama" class="text-base font-normal text-slate-600">Alamat</label>
                                <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 outline-none focus:ring-1 focus:ring-primary  <?= $validation->hasError('alamat') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold" rows="3" placeholder="Jl. Mawar Block B No. 50,Kedungmundu, Semarang Barat" name="alamat"><?= old('alamat') ?? $sekolah->alamat; ?></textarea>
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('alamat') ?>
                                    </p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
                        <button data-bs-toggle="modal" id="editBtnModal<?= $sekolah->id ?>" onclick="showModal('editBtnModal<?= $sekolah->id ?>')" onclick="showModal('editBtnModal<?= $sekolah->id ?>')" data-bs-target="#edit<?= $sekolah->id ?>" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Update</button>
                        <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('editBtnModal<?= $sekolah->id ?>')">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>