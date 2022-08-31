<?php foreach ($guru as $g) : ?>
                <div class="relative z-10 hidden" id="add<?= $g->id ?>" aria-labelledby="modal-title" role="dialog" aria-modal="true">

                    <div class="fixed inset-0 transition-opacity bg-opacity-75 bg-gray-500/50"></div>

                    <div class="fixed inset-0 z-10 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-full p-4 text-center ">

                            <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
                                <form action="<?= base_url('/guru/adduser/' . $g->nip); ?>" method="post">
                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">

                                        <?= csrf_field(); ?>
                                        <div class="flex flex-col justify-start p-4 modal-body gap-y-4">
                                            <div class="flex flex-col w-full gap-y-2">
                                                <label for="username" class="text-base font-normal text-left text-slate-600">Username</label>
                                                <input type="text" class="w-full px-3 py-2 border rounded-md text-slate-500 focus:outline-none focus:ring-1 bg-slate-300" name="username" value="<?= old('username') ?? $g->nip; ?>" placeholder="NIP" readonly />
                                            </div>
                                            <div class="flex flex-row gap-x-5">

                                                <div class="flex flex-col w-full gap-y-2">
                                                    <label for="password" class="text-base font-normal text-left text-slate-600">Password</label>
                                                    <input type="password" class="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('password') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" name="password" value="<?= old('password'); ?>" placeholder="Password" />
                                                    <span class="flex">
                                                        <p class="pt-2 font-sans text-xs text-red-500">
                                                            <?= $validation->getError('password') ?>
                                                        </p>
                                                    </span>
                                                </div>

                                                <div class="flex flex-col w-full gap-y-2">
                                                    <label for="cpassword" class="text-base font-normal text-left text-slate-600">Konfirmasi Password</label>
                                                    <input type="password" class="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('cpassword') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" name="cpassword" value="<?= old('cpassword'); ?>" placeholder="Password" />
                                                    <span class="flex">
                                                        <p class="pt-2 font-sans text-xs text-red-500">
                                                            <?= $validation->getError('cpassword') ?>
                                                        </p>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex justify-start form-check">
                                                <input class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none" type="checkbox" name="is_active">
                                                <label class="inline-block text-gray-800 form-check-label" for="is_active">
                                                    Apakah anda ingin mengaktifkan akun?
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="flex flex-col gap-2 px-4 py-3 bg-gray-50 md:flex-row md:justify-end">
                                        <button type="submit" class="px-4 py-2 text-base font-bold text-white transition duration-200 rounded-md bg-primary hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Simpan</button>
                                        <button type="button" class="px-4 py-2 text-base font-bold text-white transition duration-200 rounded-md bg-slate-500 hover:bg-white hover:text-slate-500 hover:ring-1 hover:ring-slate-300" onclick="showModal('addBtnModal<?= $g->id ?>')">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>