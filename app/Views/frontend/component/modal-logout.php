<div class="fixed top-0 bottom-0 left-0 right-0 hidden w-full h-56 px-4 m-auto md:w-1/4 md:px-0" id="modal-logout">
    <div class="flex flex-col items-center justify-center px-10 py-10 text-sm font-bold rounded-md shadow-md bg-light-primary text-slate-500" id="view-logout">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-red-500 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
        </svg>

        <h6>Apakah anda ingin keluar dari sistem?</h6>
        <div class="flex flex-row justify-center gap-20 pt-12">
            <button class="px-4 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg shadow-lg hover:ring hover:ring-blue-300" id="batal-logout">Tidak</button>
            <form action="<?= base_url('/logout'); ?>" method="POST" id="form-logout">
                <?= csrf_field(); ?>
                <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-red-500 rounded-lg shadow-lg hover:ring hover:ring-red-300" id="berhasil-logout">Ya</button>
        </div>
    </div>
    <div class="flex-col items-center justify-center hidden px-10 py-10 text-sm font-bold rounded-md shadow-md bg-light-primary text-slate-500" id="view-loading">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-primary animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        Menunggu...
    </div>
</div>