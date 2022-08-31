<?php

use CodeIgniter\I18n\Time;

if ($siswa) : ?>
    <?php
    // $i = 1 + (6 * ($currentPage - 1));
    foreach ($siswa as $s) : ?>
        <tr>
            <td class="px-6 py-[10px] text-sm text-center text-gray-500">
                <div class="w-8 h-8 overflow-hidden rounded-full shadow-md">
                    <img src="<?= base_url('assets/img/profile/siswa/' . $s->image_profile); ?>" alt="profile">
                </div>
            </td>
            <td class="px-6 py-[10px]">
                <div class="text-sm text-center text-gray-900">
                    <?= htmlspecialchars_decode($s->nama); ?>
                </div>
            </td>
            <td class="px-6 py-[10px]">
                <div class="text-sm text-center text-gray-500"><?= $s->no_induk; ?></div>
            </td>
            <td class="px-6 py-[10px] text-sm text-center text-gray-500">
                <?php $time = Time::parse($s->created_at, 'Asia/Jayapura');
                echo $time->toLocalizedString('d MMM yyyy'); ?>
            </td>

            <td class="px-6 py-[10px] text-sm text-center flex text-gray-500 justify-center mt-5 md:mt-0">

                <?php if ($s->user_id != null) : ?>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#update<?= $s->id ?>" id="updateBtnModal<?= $s->id ?>" onclick="showModal('updateBtnModal<?= $s->id ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-300 hover:text-sky-500 text-sky-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </button>
                <?php else : ?>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#add<?= $s->id ?>" id="addBtnModal<?= $s->id ?>" onclick="showModal('addBtnModal<?= $s->id ?>')" onclick="showModal('addBtnModal<?= $s->id ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-300 hover:text-lime-500 text-lime-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </button>
                <?php endif; ?>
            </td>
            <td class="px-6 py-[10px]">
                <button type="button" data-bs-toggle="modal" id="editBtnModal<?= $s->id ?>" onclick="showModal('editBtnModal<?= $s->id ?>')" onclick="showModal('editBtnModal<?= $s->id ?>')" data-bs-target="#edit<?= $s->id ?>" class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
            </td>
            <td class="px-6 py-[10px]">
                <button type="button" class="flex justify-center" data-bs-toggle="modal" id="deleteBtnModal<?= $s->id ?>" onclick="showModal('deleteBtnModal<?= $s->id ?>')" onclick="showModal('deleteBtnModal<?= $s->id ?>')" class="flex justify-center" data-bs-target="#delete<?= $s->id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>

            </td>
        </tr>

    <?php endforeach; ?>
<?php else : ?>
    <div class="relative z-10" id="modal-error">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">

                <div class="relative w-full overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl md:w-1/4">
                    <div class="flex flex-col items-center justify-center p-5 gap-y-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 w-14 h-14 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                        </svg>
                        <p class="text-base font-bold text-slate-500">Data yang anda cari tidak ada</p>
                        <button class="px-8 py-1 text-sm font-bold text-white transition duration-200 bg-red-500 rounded-full hover:bg-white hover:text-red-500 hover:ring hover:ring-red-300" onclick="empty()">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>