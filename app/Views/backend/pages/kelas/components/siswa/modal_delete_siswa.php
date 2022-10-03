<?php foreach ($siswa as $s) : ?>

    <div class="relative z-10 hidden" id="delete<?= $s->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">

                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="flex justify-center pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-rose-500 animate-bounce" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <?php if (session('status_id') == 1) : ?>
                        <form action="<?= base_url('/kelas/siswa/delete/' . $s->id); ?>" method="post">
                        <?php else : ?>
                            <form action="<?= base_url('/kelas-siswa-delete/' . $s->id); ?>" method="post">
                            <?php endif; ?>
                            <div class="px-4 pt-5 pb-4 text-center bg-white text-slate-700">

                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="kelas" value="<?= $kelas->id; ?>">
                                <p>Apakah anda ingin menghapus siswa dengan nama <?= $s->nama; ?> dari kelas <?= $kelas->kelas; ?> ?</p>
                            </div>
                            <div class="flex flex-col gap-2 px-4 py-3 md:justify-center bg-gray-50 md:flex-row">
                                <button type="submit" class="px-4 py-2 text-base font-bold text-white transition duration-200 rounded-md bg-rose-500 hover:bg-white hover:text-rose-500 hover:ring-1 hover:ring-rose-500">Ya</button>
                                <button type="button" class="px-4 py-2 text-base font-bold text-white transition duration-200 rounded-md bg-sky-500 hover:bg-white hover:text-sky-500 hover:ring-1 hover:ring-sky-300" onclick="showModal('deleteBtnModal<?= $s->id ?>')">Tidak</button>
                            </div>
                            </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>