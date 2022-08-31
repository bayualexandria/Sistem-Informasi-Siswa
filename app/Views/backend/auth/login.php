<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class=" pt-14">
    <div class="flex flex-col items-center justify-center">
        <h3 class="mb-3 font-sans text-lg font-bold text-center text-white">
            LOGIN <br /> Sistem Informasi Admin
        </h3>
        <div class="p-8 bg-white border rounded-md shadow-md border-slate-300 md:w-1/3">
            <div class="flex justify-center mb-8">
                <img src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" class="w-1/5">
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="w-full p-3 mb-5 text-sm font-semibold text-center text-red-500 bg-red-300 rounded-lg">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url('/auth-admin') ?>">
                <div class="w-full px-10 mb-8">
                    <label htmlFor="nis" class="text-base font-normal text-slate-600">
                        NIP atau Username
                    </label>
                    <input type="text" id="nis" class="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('username') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" name="username" />

                    <span class="flex">
                        <p class="pt-2 font-sans text-xs text-red-500">
                            <?= $validation->getError('username') ?>
                        </p>
                    </span>

                </div>

                <div class="w-full px-10 mb-8">
                    <label htmlFor="password" class="text-base font-normal text-slate-600">
                        Password
                    </label>
                    <input type="password" id="password" class="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('password') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>" name="password" />

                    <span class="flex">
                        <p class="pt-2 font-sans text-xs text-red-500">
                            <?= $validation->getError('password') ?>
                        </p>
                    </span>

                </div>

                <div class="w-full px-10 mb-4">
                    <button class="w-full px-4 py-2 text-white transition duration-300 rounded-full bg-sky-700 hover:ring hover:ring-sky-300" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>