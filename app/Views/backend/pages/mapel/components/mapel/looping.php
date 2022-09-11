<?php
if ($mapel) : ?>
  <?php
  foreach ($mapel as $m) : ?>
    <div class="w-full p-5 bg-white rounded-md shadow-md">
      <div class="flex flex-row gap-x-3">
        <div class="w-3/5">
          <h5 class="text-base font-bold text-slate-500"><?= $m->nama_mapel; ?></h5>
          <p class="text-sm text-slate-500"><?= $m->kelas; ?>|<?= $m->jurusan; ?></p>
        </div>
        <div class="relative w-2/5">
          <div class="absolute top-0 right-0">
            <?php if ($tahun) : ?>
              <a href="<?= base_url('/mata-pelajaran/detail/' . $m->id); ?>" class="text-sm text-center text-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                </svg>
              </a>
            <?php else : ?>
              <div class="text-sm text-center text-slate-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                </svg>
              </div>
            <?php endif; ?>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-sky-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
          </svg>
          <div class="flex flex-col gap-y-1">
            <div class="flex flex-row items-center text-slate-500 gap-x-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
              </svg>

              <p class="text-xs"><?= $m->hari; ?></p>
            </div>
            <div class="flex flex-row items-center text-slate-500 gap-x-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="text-xs"><?= $m->waktu; ?></p>
            </div>

          </div>
        </div>
      </div>
      <div class="flex flex-row">
        <button type="button" data-bs-toggle="modal" id="editBtnModal<?= $m->id ?>" onclick="showModal('editBtnModal<?= $m->id ?>')" onclick="showModal('editBtnModal<?= $m->id ?>')" data-bs-target="#edit<?= $m->id ?>" class="flex justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </button>
        <button type="button" data-bs-toggle="modal" id="deleteBtnModal<?= $m->id ?>" onclick="showModal('deleteBtnModal<?= $m->id ?>')" onclick="showModal('deleteBtnModal<?= $m->id ?>')" class="flex justify-center" data-bs-toggle="modal" data-bs-target="#delete<?= $m->id ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </button>
      </div>
    </div>
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