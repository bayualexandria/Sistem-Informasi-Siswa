<!-- Start Modal Success -->
<div class="fixed top-0 bottom-0 left-0 right-0 h-56 m-auto transition-all rounded-lg shadow-lg w-96 bg-slate-200" id="modal-logout">
    <div class="flex flex-col items-center justify-center px-4 pt-8 pb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-lime-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h6><?= $n;?></h6>
        <div class="flex flex-row justify-center gap-20 pt-12">
            <button class="px-4 py-2 text-sm font-bold text-white rounded-lg shadow-lg bg-lime-500 hover:ring hover:ring-lime-300" id="batal-logout">Ok</button>
        </div>
    </div>
    <!-- End Modal Success -->