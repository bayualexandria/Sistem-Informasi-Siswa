<?php foreach ($mapel as $m) : ?>
  <div class="relative z-10 hidden" id="edit<?= $m->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex items-center justify-center min-h-full p-4 text-center ">
        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
          <div class="px-5 pt-5">

            <h1 class="text-base font-bold text-slate-500">Update Data Mata Pelajaran</h1>
          </div>
          <form action="<?= base_url('/mata-pelajaran/' . $m->id); ?>" method="post">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="PUT" />
              <div class="flex flex-col p-4 modal-body gap-y-2">
                <div class="flex flex-col w-full gap-y-2">
                  <label for="nama_mapel" class="text-base font-normal text-slate-600">Nama Mata Pelajaran</label>
                  <input type="text" id="nama_mapel" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('nama_mapel') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold" name="nama_mapel" value="<?= old('nama_mapel') ?? $m->nama_mapel; ?>" placeholder="Bahasa Indonesia" />

                </div>
                <div class="flex flex-col w-full gap-y-2">
                  <label for="kelas_id" class="text-base font-normal text-slate-600">Kelas</label>
                  <select name="kelas_id" id="kelas_id" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                    <?php foreach ($kelas as $k) : ?>
                      <option value="<?= $k->id; ?>" class="rounded-md" <?= $k->id === $m->kelas_id ? 'selected' : ''; ?>><?= $k->kelas; ?> | <?= $k->jurusan; ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="flex flex-col w-full gap-y-2">
                  <label for="guru_id" class="text-base font-normal text-slate-600">Guru Mapel</label>
                  <select name="guru_id" id="guru_id" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                    <?php foreach ($guru as $g) : ?>
                      <option value="<?= $g->id; ?>" class="rounded-md" <?= $g->id === $m->guru_id ? 'selected' : ''; ?>><?= $g->nama; ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>

                <div class="flex flex-row justify-between gap-x-5">
                  <div class="flex flex-col w-full gap-y-2">
                    <label for="hari" class="text-base font-normal text-slate-600">Hari</label>
                    <select name="hari" id="hari" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                      <option value="Senin" class="rounded-md" <?= $m->hari === 'Senin' ? 'selected' : ''; ?>>Senin</option>
                      <option value="Selasa" class="rounded-md" <?= $m->hari === 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                      <option value="Rabu" class="rounded-md" <?= $m->hari === 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                      <option value="Kamis" class="rounded-md" <?= $m->hari === 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                      <option value="Jum`at" class="rounded-md" <?= $m->hari === 'Jum`at' ? 'selected' : ''; ?>>Jum`at</option>
                      <option value="Sabtu" class="rounded-md" <?= $m->hari === 'Sabtu' ? 'selected' : ''; ?>>Sabtu</option>
                    </select>
                  </div>
                  <?php
                  $waktu = explode('-', $m->waktu);
                  $start = explode(':', $waktu[0]);
                  $end = explode(':', $waktu[1]);

                  ?>
                  <div class="flex flex-col w-full gap-y-2">
                    <label for="waktu" class="text-base font-normal text-slate-600">Waktu</label>
                    <div class="flex flex-row items-center gap-x-2">
                      <select name="start_hours" id="start_hours" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                        <option value="00" class="rounded-md" <?= $start[0] == 00 ? 'selected' : ''; ?>>00</option>
                        <option value="01" class="rounded-md" <?= $start[0] == 01 ? 'selected' : ''; ?>>01</option>
                        <option value="02" class="rounded-md" <?= $start[0] == 02 ? 'selected' : ''; ?>>02</option>
                        <option value="03" class="rounded-md" <?= $start[0] == 03 ? 'selected' : ''; ?>>03</option>
                        <option value="04" class="rounded-md" <?= $start[0] == 04 ? 'selected' : ''; ?>>04</option>
                        <option value="05" class="rounded-md" <?= $start[0] == 05 ? 'selected' : ''; ?>>05</option>
                        <option value="06" class="rounded-md" <?= $start[0] == 06 ? 'selected' : ''; ?>>06</option>
                        <option value="07" class="rounded-md" <?= $start[0] == 07 ? 'selected' : ''; ?>>07</option>
                        <option value="08" class="rounded-md" <?= $start[0] == '08' ? 'selected' : ''; ?>>08</option>
                        <option value="09" class="rounded-md" <?= $start[0] == '09' ? 'selected' : ''; ?>>09</option>
                        <?php for ($i = 10; $i <= 23; $i++) : ?>
                          <option value="<?= $i; ?>" class="rounded-md" <?= $start[0] == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php endfor; ?>
                      </select>
                      <select name="start_minutes" id="start_minutes" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                        <option value="00" class="rounded-md" <?= $start[1] == 00 ? 'selected' : ''; ?>>00</option>
                        <option value="01" class="rounded-md" <?= $start[1] == 01 ? 'selected' : ''; ?>>01</option>
                        <option value="02" class="rounded-md" <?= $start[1] == 02 ? 'selected' : ''; ?>>02</option>
                        <option value="03" class="rounded-md" <?= $start[1] == 03 ? 'selected' : ''; ?>>03</option>
                        <option value="04" class="rounded-md" <?= $start[1] == 04 ? 'selected' : ''; ?>>04</option>
                        <option value="05" class="rounded-md" <?= $start[1] == 05 ? 'selected' : ''; ?>>05</option>
                        <option value="06" class="rounded-md" <?= $start[1] == 06 ? 'selected' : ''; ?>>06</option>
                        <option value="07" class="rounded-md" <?= $start[1] == 07 ? 'selected' : ''; ?>>07</option>
                        <option value="08" class="rounded-md" <?= $start[1] == '08' ? 'selected' : ''; ?>>08</option>
                        <option value="09" class="rounded-md" <?= $start[1] == '09' ? 'selected' : ''; ?>>09</option>
                        <?php for ($i = 10; $i <= 59; $i++) : ?>
                          <option value="<?= $i; ?>" class="rounded-md" <?= $start[1] == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php endfor; ?>
                      </select>
                      <p>-</p>
                      <select name="end_hours" id="end_hours" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                        <option value="00" class="rounded-md" <?= $end[0] == 00 ? 'selected' : ''; ?>>00</option>
                        <option value="01" class="rounded-md" <?= $end[0] == 01 ? 'selected' : ''; ?>>01</option>
                        <option value="02" class="rounded-md" <?= $end[0] == 02 ? 'selected' : ''; ?>>02</option>
                        <option value="03" class="rounded-md" <?= $end[0] == 03 ? 'selected' : ''; ?>>03</option>
                        <option value="04" class="rounded-md" <?= $end[0] == 04 ? 'selected' : ''; ?>>04</option>
                        <option value="05" class="rounded-md" <?= $end[0] == 05 ? 'selected' : ''; ?>>05</option>
                        <option value="06" class="rounded-md" <?= $end[0] == 06 ? 'selected' : ''; ?>>06</option>
                        <option value="07" class="rounded-md" <?= $end[0] == 07 ? 'selected' : ''; ?>>07</option>
                        <option value="08" class="rounded-md" <?= $end[0] == '08' ? 'selected' : ''; ?>>08</option>
                        <option value="09" class="rounded-md" <?= $end[0] == '09' ? 'selected' : ''; ?>>09</option>
                        <?php for ($i = 10; $i <= 23; $i++) : ?>
                          <option value="<?= $i; ?>" class="rounded-md" <?= $end[0] == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php endfor; ?>
                      </select>
                      <select name="end_minutes" id="end_minutes" class="px-4 py-2 bg-white border rounded-md shadow-md outline-none border-sky-500 focus:ring-sky-500">
                        <option value="00" class="rounded-md" <?= $end[1] == 00 ? 'selected' : ''; ?>>00</option>
                        <option value="01" class="rounded-md" <?= $end[1] == 01 ? 'selected' : ''; ?>>01</option>
                        <option value="02" class="rounded-md" <?= $end[1] == 02 ? 'selected' : ''; ?>>02</option>
                        <option value="03" class="rounded-md" <?= $end[1] == 03 ? 'selected' : ''; ?>>03</option>
                        <option value="04" class="rounded-md" <?= $end[1] == 04 ? 'selected' : ''; ?>>04</option>
                        <option value="05" class="rounded-md" <?= $end[1] == 05 ? 'selected' : ''; ?>>05</option>
                        <option value="06" class="rounded-md" <?= $end[1] == 06 ? 'selected' : ''; ?>>06</option>
                        <option value="07" class="rounded-md" <?= $end[1] == 07 ? 'selected' : ''; ?>>07</option>
                        <option value="08" class="rounded-md" <?= $end[1] == '08' ? 'selected' : ''; ?>>08</option>
                        <option value="09" class="rounded-md" <?= $end[1] == '09' ? 'selected' : ''; ?>>09</option>
                        <?php for ($i = 10; $i <= 59; $i++) : ?>
                          <option value="<?= $i; ?>" class="rounded-md" <?= $end[1] == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
              <button data-bs-toggle="modal" id="editBtnModal<?= $m->id ?>" onclick="showModal('editBtnModal<?= $m->id ?>')" onclick="showModal('editBtnModal<?= $m->id ?>')" data-bs-target="#edit<?= $m->id ?>" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Update</button>
              <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('editBtnModal<?= $m->id ?>')">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>