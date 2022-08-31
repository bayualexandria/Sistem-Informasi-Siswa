<div class="relative z-10 hidden" id="updateNilaiRataRata" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-center justify-center min-h-full p-4 text-center ">
            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                <div class="px-5 pt-5">

                    <h1 class="text-base font-bold text-slate-500">Ubah Nilai Rata Rata</h1>
                </div>
                <?php if ($nilaiRataRata) : ?>
                    <form action="<?= base_url('/nilai-rata-rata/' . $nilaiRataRata['id']); ?>" method="post">
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="flex flex-col p-4 modal-body gap-y-2">
                                <div class="flex flex-col w-full gap-y-2">
                                    <label for="nilai_rata_rata" class="text-base font-normal text-slate-600">Nilai Rata Rata</label>
                                    <input type="text" id="nilai_rata_rata" class="w-full px-3 py-1 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('nilai_rata_rata') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?> placeholder:text-sm placeholder:font-bold" name="nilai_rata_rata" value="<?= old('nilai_rata_rata') ?? $nilaiRataRata['nilai_rata_rata']; ?>" placeholder="80.50" />
                                    <span class="flex">
                                        <p class="pt-2 font-sans text-xs text-red-500">
                                            <?= $validation->getError('nilai_rata_rata') ?>
                                        </p>
                                    </span>
                                </div>
                            </div>


                        </div>
                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-x-2">
                            <button type="submit" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Ubah</button>
                            <button type="button" class="px-2 py-1 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('updateNilaiRataRataModal')">Batal</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>