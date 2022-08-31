<!-- Start Modal Logout -->
<div class="fixed top-0 bottom-0 left-0 right-0 hidden h-56 m-auto transition-all rounded-lg shadow-lg w-96 bg-slate-200" id="modal-logout">
    <div class="flex flex-col items-center justify-center px-4 pt-8 pb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-red-500 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
        </svg>
        <h6>Apakah anda ingin keluar dari sistem?</h6>
        <div class="flex flex-row justify-center gap-20 pt-12">
            <button class="px-4 py-2 text-sm font-bold text-white bg-blue-500 rounded-lg shadow-lg hover:ring hover:ring-blue-300" id="batal-logout">Tidak</button>
            <form action="<?= base_url('/logout-admin'); ?>" method="POST">
                <?= csrf_field(); ?>
                <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-red-500 rounded-lg shadow-lg hover:ring hover:ring-red-300">Ya</button>
        </div>
        </form>
    </div>
</div>
<!-- End Modal Logout -->