function showSidebar(id) {
  document.getElementById(id).classList.toggle('text-slate-300');
  document.querySelector(`#${id} button svg`).classList.toggle('rotate-90');
  document.getElementById('menu-' + id).classList.toggle('hidden');
}

// Profile Menu
const profile = document.querySelector('#profile');
const profileMenu = document.querySelector('#profile-menu');

profile.addEventListener('click', function () {
  profileMenu.classList.toggle('hidden');
});

// Klik di luar profile menu
// window.addEventListener('click',function (e) {
//     if (e.target!=profile && e.target!=profileMenu) {
//         profileMenu.classList.add('hidden');
//     }
// })

// Modal Logout
const modalLogout = document.querySelector('#modal-logout');

function logout() {
  document.getElementById('modal-logout').classList.toggle('hidden');
  profileMenu.classList.add('hidden');
}

// Batal Logout
const batalLogout = document.querySelector('#batal-logout');
batalLogout.addEventListener('click', function () {
  modalLogout.classList.remove('block');
  modalLogout.classList.add('hidden');
});
