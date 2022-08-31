<footer class="fixed bottom-0 w-full bg-light-primary">
    <div class="flex flex-row items-center justify-between p-2 text-sm font-bold border-t border-b-0 shadow-md text-slate-500">
        <button class="w-10 h-10 p-1 transition duration-75 border rounded-full shadow-md shadow-slate-500 border-slate-100 hover:ring hover:ring-sky-200 " id="logo">
            <img src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" class="w-8 rounded-full">
        </button>
        <div id="time" class="hidden md:block"></div>
        <p>Hello, <?= $siswa->nama; ?>. Selamat Datang!</p>
    </div>
</footer>