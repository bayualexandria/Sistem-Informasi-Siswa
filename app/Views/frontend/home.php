<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<?= $this->include('frontend/component/logo-menu'); ?>
<?php if (session()->getFlashdata('succes')) : ?>
  <div class="fixed top-0 bottom-0 left-0 right-0 w-full h-56 px-4 m-auto md:w-1/4 md:px-0" id="success">
    <div class="flex flex-col items-center justify-center px-10 py-10 m-auto text-sm font-bold rounded-md shadow-md bg-light-primary text-slate-500 gap-y-5">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-lime-500 animate-ping" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <?= session()->getFlashdata('succes'); ?>
    </div>
  </div>
<?php endif; ?>
<?= $this->include('frontend/component/modal-logout'); ?>
<?= $this->include('frontend/component/menu'); ?>
<div id="frontend-logo-menu" siswa="<?= $siswa->nama; ?>"></div>
<?= $this->endSection(); ?>