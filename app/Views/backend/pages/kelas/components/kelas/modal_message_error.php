<?php if (session()->getFlashdata('error')) : ?>
    <div class="relative z-10" id="modal-error">

        <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-center justify-center min-h-full p-4 text-center ">

                <div class="relative w-full overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl md:w-1/4">
                    <div class="flex flex-col items-center justify-center p-5 gap-y-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 w-14 h-14 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                        </svg>
                        <p class="text-base font-bold text-center text-slate-500"><?= session()->getFlashdata('error'); ?></p>
                        <button class="px-8 py-1 text-sm font-bold text-white transition duration-200 bg-red-500 rounded-full hover:bg-white hover:text-red-500 hover:ring hover:ring-red-300" onclick="empty()">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>