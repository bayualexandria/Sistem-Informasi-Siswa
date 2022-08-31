<?= $this->extend('backend/app'); ?>

<?= $this->section('pages'); ?>
<div class="grid grid-cols-5 bg-slate-100">
    <div class="col-span-4 col-start-2 p-4 overflow-y-auto">
        <div class="relative flex flex-col w-full bg-white rounded-md shadow-md md:p-5">
            <h6 class="p-5 text-lg font-bold text-slate-500"><?= auth()->status_id == 2 ? 'Edit Data Guru' : 'User Administrator'; ?></h6>

            <div class="<?= auth()->status_id == 2 ? 'md:grid-cols-2 grid-cols-1 md:gap-x-5 grid px-10' : '' ?> py-10">
                <?php

                use CodeIgniter\I18n\Time;

                if (auth()->status_id == 2) : ?>
                    <div class="flex flex-col items-center justify-center gap-y-5">
                        <div class="w-56 h-56 overflow-hidden border rounded-full shadow-md border-slatebg-sky-500">
                            <img src="<?= base_url('assets/img/profile/guru/' . $guru->image_profile); ?>" alt="" srcset="">
                        </div>
                        <h6 class="text-sm font-medium text-slate-500"><?= $guru->nip; ?></h6>
                        <h5 class="text-xs font-bold text-slate-500"><?= $guru->nama; ?></h5>
                    </div>

                    <div class="flex flex-col">
                        <form action="<?= base_url('/profile'); ?>" method="post" enctype="multipart/form-data" class="flex flex-col gap-y-5">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="flex flex-col gap-y-3">
                                <label for="nip" class="text-sm font-bold text-slate-500">NIP</label>
                                <input type="text" name="nip" id="nip" class="px-4 py-2 transition duration-300 border rounded-md shadow-md outline-none border-sky-500 bg-slate-200" readonly value="<?= $guru->nip; ?>">
                            </div>
                            <div class="flex flex-col gap-y-3">
                                <label for="nama" class="text-sm font-bold text-slate-500">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="px-4 py-2 transition duration-300 border rounded-md shadow-md outline-none border-sky-500 hover:ring hover:ring-sky-200" value="<?= $guru->nama; ?>">
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('nama') ?>
                                    </p>
                                </span>
                            </div>
                            <div class="flex flex-col w-full gap-y-2">
                                <label for="jenis_kelamin" class="text-sm font-bold text-slate-500">Jenis Kelamin</label>
                                <div class="flex justify-start">
                                    <div class="form-check form-check-inline">
                                        <input class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-sky-600 checked:border-sky-600 focus:outline-none" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" <?= ($guru->jenis_kelamin == 'Laki-laki') ? 'checked' : '' ?>>
                                        <label class="inline-block text-gray-800 form-check-label" for="Laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-sky-600 checked:border-sky-600 focus:outline-none" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" <?= ($guru->jenis_kelamin == 'Perempuan') ? 'checked' : '' ?>>
                                        <label class="inline-block text-gray-800 form-check-label" for="Perempuan">Perempuan</label>
                                    </div>

                                </div>
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('jenis_kelamin') ?>
                                    </p>
                                </span>
                            </div>
                            <div class="flex flex-col mb-3 gap-y-3">
                                <label for="no_hp" class="text-sm font-bold text-slate-500">No. Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" class="px-4 py-2 border rounded-md outline-none border-sky-500 hover:ring hover:ring-sky-200" value="<?= old('no_hp') ?? $guru->no_hp; ?>">
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('no_hp') ?>
                                    </p>
                                </span>
                            </div>
                            <div class="flex flex-row items-center justify-center gap-x-3">
                                <div class="flex justify-start">
                                    <div class="w-full mb-3">
                                        <label for="image_profile" class="inline-block mb-2 text-gray-700 form-label">Foto Profile</label>
                                        <input class="file:rounded-full file:border-none file:bg-sky-200  file:text-sm file:font-bold file:text-primary file:px-4 file:py-1.5 file:cursor-pointer outline-none text-slate-500 text-sm font-bold file:hover:bg-sky-400" type="file" name="image_profile" onchange="previewImage()" id="image_profile" value="<?= old('image_profile'); ?>">
                                        <span class="flex">
                                            <p class="pt-2 font-sans text-xs text-red-500">
                                                <?= $validation->getError('image_profile') ?>
                                            </p>
                                        </span>
                                    </div>
                                </div>
                                <div class="w-56">
                                    <?php if ($guru->image_profile) : ?>
                                        <img src="<?= base_url('assets/img/profile/guru/' . $guru->image_profile); ?>" alt="cover" class="rounded-md img-preview">
                                    <?php else : ?>
                                        <img src="" alt="cover" class="hidden rounded-md img-preview">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex flex-col w-full gap-y-2">
                                <label for="nama" class="text-base font-normal text-slate-600">Alamat</label>
                                <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 outline-none <?= $validation->hasError('alamat') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Lengkap" name="alamat"><?= old('alamat') ?? $guru->alamat; ?></textarea>
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('alamat') ?>
                                    </p>
                                </span>
                            </div>
                            <div class="flex flex-row justify-end">
                                <button class="flex flex-row px-4 py-2 text-sm font-bold text-white transition duration-300 rounded-md bg-primary gap-x-3 hover:ring hover:ring-sky-200 hover:bg-white hover:text-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                <?php else : ?>
                    <form action="<?= base_url('/profile-admin'); ?>" method="post" class="flex flex-col justify-center px-5 py-5 gap-y-3">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="flex flex-col justify-center w-full md:flex-row md:gap-x-3 gap-y-4">
                            <div class="flex flex-col w-full md:w-1/5 gap-y-2">
                                <label for="username" class="text-sm font-bold text-slate-500">Username</label>
                                <input type="text" name="username" id="username" class="w-full px-4 py-2 transition duration-300 border rounded-full shadow-md outline-none md:py-1 border-primary hover:ring hover:ring-sky-300 focus:ring focus:ring-sky-300" value="<?= old('username') ?? $admin->username; ?>" />
                            </div>
                            <div class="flex flex-col w-full md:w-1/5 gap-y-2">
                                <label for="password" class="text-sm font-bold text-slate-500">Password</label>
                                <input type="password" name="password" id="password" class="w-full px-4 py-2 transition duration-300 border rounded-full shadow-md outline-none md:py-1 border-primary hover:ring hover:ring-sky-300 focus:ring focus:ring-sky-300" />
                            </div>
                        </div>
                        <div class="flex justify-center ">
                            <button type="submit" class="flex flex-row px-4 py-2 text-white transition duration-300 rounded-full shadow-md md:py-1 bg-primary hover:ring hover:ring-sky-300 hover:bg-white hover:text-primary gap-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Update
                            </button>
                        </div>
                    </form>
                    <div class="w-full py-5 overflow-hidden overflow-x-scroll border rounded-lg boder-slate-300">
                        <table class="w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-[10px] text-sm text-gray-500">
                                        #
                                    </th>
                                    <th class="px-6 py-[10px] text-sm text-gray-500">
                                        Username
                                    </th>
                                    <th class="px-6 py-[10px] text-sm text-gray-500">
                                        Tanggal akun
                                    </th>
                                    <th class="px-6 py-[10px] text-sm text-gray-500">
                                        Status
                                    </th>
                                    <th class="px-6 py-[10px] text-sm text-gray-500">
                                        Ubah
                                    </th>
                                    <th class="px-6 py-[10px] text-sm text-gray-500">
                                        Hapus
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                                <?php

                                foreach ($user as $s) : ?>
                                    <tr>
                                        <td class="px-6 py-[10px] text-sm text-center text-gray-500">
                                            1
                                        </td>
                                        <td class="px-6 py-[10px]">
                                            <div class="text-sm text-center text-gray-900">
                                                <?= $s->username; ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-[10px]">
                                            <div class="text-sm text-center text-gray-500">
                                                <?php $time = Time::parse($s->created_at, 'Asia/Jayapura');
                                                echo $time->toLocalizedString('d MMM yyyy'); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-[10px] text-sm text-center text-gray-500">
                                            <?php if ($s->is_active == 1) : ?>
                                                <span class="text-green-500">
                                                    Aktif
                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="px-6 py-[10px]">
                                            <a href="" class="flex justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="px-6 py-[10px]">
                                            <button type="button" class="flex justify-center" data-bs-toggle="modal" data-bs-target="#delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                            <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                                <div class="relative w-auto pointer-events-none modal-dialog modal-dialog-centered">
                                                    <div class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto modal-content bg-clip-padding">
                                                        <div class="flex items-center justify-between flex-shrink-0 p-4 border-b border-gray-200 modal-header rounded-t-md">
                                                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                                                Hapus Data Guru
                                                            </h5>
                                                            <button type="button" class="box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="relative p-4 modal-body">
                                                            <p>Apakah anda ingin menghapus data guru dengan nama ?</p>
                                                        </div>
                                                        <div class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t border-gray-200 modal-footer rounded-b-md">
                                                            <button type="button" class="inline-block px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-700 hover:shadow-lg  transition duration-150 ease-in-out" data-bs-dismiss="modal">
                                                                Tidak
                                                            </button>
                                                            <form action="" method="POST" id="deleteGuru">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="inline-block px-6 py-2.5 bg-rose-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-rose-700 hover:shadow-lg transition duration-150 ease-in-out ml-1">
                                                                    Ya
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="fixed top-0 bottom-0 left-0 right-0 h-56 m-auto transition-all rounded-lg shadow-lg w-96 bg-slate-200" id="modal-success">
        <div class="flex flex-col items-center justify-center px-4 pt-8 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-lime-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h6 class="text-sm font-bold text-slate-500"><?= session()->getFlashdata('success'); ?></h6>
            <div class="relative flex flex-row justify-center gap-20 pt-12">
                <button class="px-4 py-2 text-sm font-bold text-white rounded-lg shadow-lg bg-lime-500 hover:ring hover:ring-lime-300" id="success">Ok</button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    function previewImage() {
        const image = document.querySelector('#image_profile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    const btnSuccess = document.getElementById('success');
    const modalSuccess = document.getElementById('modal-success');

    btnSuccess.addEventListener('click', function() {
        modalSuccess.classList.add('hidden');
    });
</script>
<?= $this->endSection(); ?>