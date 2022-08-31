<header class="container py-2">
    <ul class="flex justify-end md:gap-56">

        <li class="flex items-center justify-between gap-4 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

            </svg>

            <button type="button" id="profile" class="flex items-center gap-x-1">
                <?php if (auth()->status_id == 1) : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                <?php else : ?>
                    <div class="flex items-center justify-center">
                        <div class="flex items-start justify-center w-8 h-8 overflow-hidden border rounded-full shadow-md border-slate-500">
                            <img src="<?= base_url('assets/img/profile/guru/' . guru()->image_profile); ?>" alt="" class="w-8">
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (auth()->status_id == 2) : ?>
                    <h5 class="hidden text-sm text-slate-500 md:block"><?= guru()->nama; ?></h5>
                <?php else : ?>
                    <h5 class="hidden text-sm text-slate-500 md:block"><?= auth()->username; ?></h5>
                <?php endif; ?>
            </button>
        </li>
    </ul>
</header>
