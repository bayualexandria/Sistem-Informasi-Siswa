<div class="fixed top-0 left-0 w-1/5 h-screen border-r drop-shadow-md bg-primary">
    <div class="px-4 py-8">
        <div class="flex justify-center">
            <img src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" class="w-3/3 sm:w-2/3 md:w-1/3" />
        </div>
        <ul class="flex flex-col justify-center mt-20 text-sm text-white md:px-8 gap-y-5">
            <li class="flex justify-center w-full md:justify-between">
                <a href="<?= base_url('/dashboard'); ?>" class="flex items-center gap-3 hover:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <p class="hidden md:block">Home</p>
                </a>
            </li>
            <?php if (auth()->status_id == 1) : ?>
                <li class="transition duration-300 hover:stroke-2 ">
                    <div class="flex flex-col items-center justify-center cursor-pointer md:justify-between hover:text-slate-300 md:items-start md:flex-row" onclick="showSidebar('master-data')" id="master-data">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                            </svg>
                            <p class="hidden md:block">Master Data</p>
                        </div>
                        <button class="transition duration-300 ease-in-out bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                    <ul id="menu-master-data" class="hidden w-full mt-5 md:pl-5">
                        <div class="flex flex-col gap-y-4">
                            <li class="flex justify-center md:justify-between"><a href="<?= base_url('/guru'); ?>">Guru</a></li>
                            <li class="flex justify-center md:justify-between"><a href="<?= base_url('/siswa'); ?>">Siswa</a></li>
                            <li class="flex justify-center md:justify-between"><a href="<?= base_url('/mata-pelajaran'); ?>">Mapel</a></li>

                        </div>
                    </ul>
                </li>
            <?php else : ?>
                <?php $db = db_connect();
                $kelas = $db->table('kelas')->where('id_guru', guru()->id)->get()->getResultObject();
                ?>
                <?php if ($kelas) : ?>
                    <li class="transition duration-300 hover:stroke-2 ">
                        <div class="flex flex-col items-center justify-center cursor-pointer md:justify-between hover:text-slate-300 md:items-start md:flex-row" onclick="showSidebar('master-data')" id="master-data">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                <p class="hidden md:block">Siswa</p>
                            </div>
                            <button class="transition duration-300 ease-in-out bg-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                        <ul id="menu-master-data" class="hidden w-full mt-5 md:pl-5">
                            <div class="flex flex-col gap-y-4">
                                <?php foreach ($kelas as $k) : ?>
                                    <li class="flex justify-center md:justify-between">
                                        <a href="<?= base_url('/siswa/wali-kelas/' . $k->id); ?>"><?= $k->kelas; ?>
                                            <?php $jurusan = $db->table('jurusan')->where('id', $k->id_jurusan)->get()->getResultObject(); ?>
                                            <?php foreach ($jurusan as $j) : ?>
                                                <?= $j->jurusan; ?>
                                            <?php endforeach; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </div>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="flex justify-center md:justify-between">
                    <a href="<?= base_url('/mapel/' . guru()->nip); ?>" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <p class="hidden md:block">Mapel</p>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (auth()->status_id == 1) : ?>
                <li class="flex justify-center md:justify-between">
                    <a href="<?= base_url('/kelas'); ?>" class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <p class="hidden md:block">Ruang Kelas</p>
                    </a>
                </li>
            <?php endif; ?>
            <li class="flex justify-center md:justify-between">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="hidden md:block">Info</p>
                </div>
            </li>
            <?php if (auth()->status_id == 1) : ?>
                <li class="flex justify-center md:justify-between">
                    <a href="<?= base_url('/profile-sekolah'); ?>" class="flex items-center gap-3 cursor-pointer hover:text-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                        <p class="hidden md:block">Profile Sekolah</p>
                    </a>
                </li>
            <?php endif; ?>
            <li class="flex justify-center md:justify-between">
                <?php if (auth()->status_id == 2) : ?>
                    <a href="<?= base_url('/profile'); ?>" class="flex items-center gap-3 hover:text-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="hidden md:block">Profile</p>
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('/profile'); ?>" class="flex items-center gap-3 hover:text-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        <p class="hidden md:block">Set User</p>
                    </a>
                <?php endif; ?>
            </li>
            <li class="flex justify-center md:justify-between">
                <button class="flex items-center gap-3 cursor-pointer hover:text-slate-300" onclick="logout()"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <p class="hidden md:block">Logout</p>
                </button>
            </li>
        </ul>
    </div>
</div>