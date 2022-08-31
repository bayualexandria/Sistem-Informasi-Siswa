<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="main bg-[#EFEFEF] pt-14">
    <div class="container">
        <div class="grid items-center grid-cols-3 gap-10 md:gap-10">
            <div class=" col-span-full md:col-span-1">
                <h6 class="py-5 text-lg font-bold text-slate-600">Informasi </h6>

                <ul class="flex flex-col-reverse bg-white border divide-y divide-y-reverse rounded-md shadow-md border-slate-300">
                    <li class="relative flex flex-col px-6 py-4">
                        <div class="absolute text-xs text-slate-400 top-1 right-3">5 bulan yang lalu</div>
                        <h6 class="pt-4 text-base">Hari Libur Siswa/Siswi Kelas X XI XII</h6>
                        <p class="text-sm text-slate-500">Kami meninformasikan jadwal libur kelas X XI XII semester Ganap Tahun Ajaran 2021-2022...</p>
                    </li>

                    <li class="relative flex flex-col px-6 py-4">
                        <div class="absolute text-xs text-slate-400 top-1 right-3">3 bulan yang lalu</div>
                        <h6 class="pt-4 text-base">Jadwal Mata Pelajaran Semester Ganjil</h6>
                        <p class="text-sm text-slate-500">Jadwal mata pelajaran siswa/siswi kelas X XI XII bisa dilihat pada SIS masing - m...</p>
                    </li>

                    <li class="relative flex flex-col px-6 py-4">
                        <div class="absolute text-xs text-slate-400 top-1 right-3">1 bulan yang lalu</div>
                        <h6 class="pt-4 text-base">Penggantian Guru Pengampu Mapel Matematika</h6>
                        <p class="text-sm text-slate-500">Ditujukan kepada siswa/siswi kelas XI untuk mata pelajaran Matematika akan diampu oleh Bapak Muhamad Adnan, S.Pd</p>
                    </li>

                    <li class="relative flex flex-col px-6 py-4">
                        <div class="absolute text-xs text-slate-400 top-1 right-3">1 jam yang lalu</div>
                        <h6 class="pt-4 text-base">Perubahan Jadwal Ulangan Bahasa Inggris Kelas X</h6>
                        <p class="text-sm text-slate-500">Perubahan jadwal ulangan Bahasa Inggris yang diampu oleh Ibu Ningsih Sulastri, S.Pd untuk siswa/siswi kelas X, bisa dilihat pada...</p>
                    </li>

                </ul>
            </div>
            <div class="col-span-full md:col-span-2">
                <div class="flex flex-col items-center justify-center">
                    <h3 class="mb-3 text-lg font-bold text-center text-slate-600">LOGIN <br> Sistem Informasi Siswa/Siswi</h3>
                    <div class="p-8 bg-white border rounded-md shadow-md border-slate-300 md:w-3/5">
                        <div class="flex justify-center mb-8">
                            <img src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" class="w-1/5">
                        </div>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="w-full p-3 mb-5 text-sm font-semibold text-center text-red-500 bg-red-300 rounded-lg">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('auth'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="w-full px-10 mb-8">
                                <label for="nis" class="text-base font-normal text-slate-600">No. Induk Siswa</label>
                                <input type="text" id="nis" class="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('username') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" name="username" value="<?= old('username'); ?>" />
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('username') ?>
                                    </p>
                                </span>
                            </div>

                            <div class="w-full px-10 mb-8">
                                <label for="password" class="text-base font-normal text-slate-600">Password</label>
                                <input type="password" id="password" class="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1  <?= $validation->hasError('password') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" name="password" />
                                <span class="flex">
                                    <p class="pt-2 font-sans text-xs text-red-500">
                                        <?= $validation->getError('password') ?>
                                    </p>
                                </span>
                            </div>
                            <div class="w-full px-10 mb-4">

                                <button class="w-full px-4 py-2 text-white transition duration-300 rounded-full bg-sky-700 hover:ring hover:ring-sky-300" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>