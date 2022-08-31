<?php
if ($kelas) : ?>
    <?php
    $i = 1 + (5 * ($currentPage - 1));
    foreach ($kelas as $k) : ?>
        <tr>
            <td class="px-6 py-[10px] text-sm text-center text-gray-500">
                <?= $i++; ?>
            </td>
            <td class="px-6 py-[10px]">
                <div class="text-sm text-center text-gray-900">
                    <?= htmlspecialchars_decode($k->kelas); ?>
                </div>
            </td>
            <td class="px-6 py-[10px]">
                <div class="text-sm text-center text-gray-500"><?= $k->jurusan; ?></div>
            </td>

            <td class="px-6 py-[10px]">
                <div class="text-sm text-center text-gray-500"><?= $k->nama; ?></div>
            </td>

            <td class="px-6 py-[10px]">
                <button type="button" data-bs-toggle="modal" id="editBtnModal<?= $k->id ?>" onclick="showModal('editBtnModal<?= $k->id ?>')" onclick="showModal('editBtnModal<?= $k->id ?>')" data-bs-target="#edit<?= $k->id ?>" class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
            </td>
            <td class="px-6 py-[10px]">
                <button type="button" data-bs-toggle="modal" id="deleteBtnModal<?= $k->id ?>" onclick="showModal('deleteBtnModal<?= $k->id ?>')" onclick="showModal('deleteBtnModal<?= $k->id ?>')" class="flex justify-center" data-bs-toggle="modal" data-bs-target="#delete<?= $k->id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>

            </td>
            <td class="px-6 py-[10px]">
                <a href="<?= base_url('/kelas/siswa/' . $k->id); ?>" class="flex items-center justify-center w-full text-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-lime-500">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                </a>
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
                        <p class="text-base font-bold text-center text-slate-500">Data tidak ditemukan</p>
                        <button class="px-8 py-1 text-sm font-bold text-white transition duration-200 bg-red-500 rounded-full hover:bg-white hover:text-red-500 hover:ring hover:ring-red-300" onclick="empty()">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>