<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\{Guru, Jurusan, Siswa, Kelas, Mapel};
use \Mpdf\Mpdf;


class LaporanController extends BaseController
{
    public function __construct()
    {
        $this->siswa = new Siswa();
        $this->jurusan = new Jurusan();
        $this->kelas = new Kelas();
        $this->guru = new Guru();
        $this->mpdf = new Mpdf();
        $this->mapel = new Mapel();
    }

    public function laporanDataKelasSiswa($id)
    {
        $siswa = $this->siswa->where('kelas_id', $id)->orderBy('nama', 'ASC')->asObject()->findAll();
        $kelas = $this->kelas->where('id', $id)->first();
        $guru = $this->guru->where('id', $kelas['id_guru'])->first();
        $jurusan = $this->jurusan->where('id', $kelas['id_jurusan'])->first();
        $mpdf = new Mpdf();

        $mpdf->WriteHTML(view('backend/pages/kelas/components/siswa/laporan-data-siswa', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'guru' => $guru
        ]));
        $mpdf->SetWatermarkImage('./assets/logo-pendidikan.png', 0.20, 50);
        $mpdf->showWatermarkImage = true;
        $mpdf->setFooter('SMK XXXX XXXX - ' . $kelas['kelas'] . ' ' . $jurusan['jurusan'] . ' [{PAGENO}]');
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Data Siswa-Siswi Kelas' . $kelas['kelas'] . ' ' . $jurusan['jurusan'] . '.pdf', 'I'); // opens in browser
    }

    public function laporanDataMapelKelas($id)
    {
        $mapel = $this->mapel->getDayMapel($id);
        $kelas = $this->kelas->where('id', $id)->first();
        $guru = $this->guru->where('id', $kelas['id_guru'])->first();
        $jurusan = $this->jurusan->where('id', $kelas['id_jurusan'])->first();
        $this->mpdf->WriteHTML(view('backend/pages/kelas/components/siswa/laporan-data-mapel', [
            'mapel' => $mapel,
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'guru' => $guru
        ]));
        $this->mpdf->SetWatermarkImage('./assets/logo-pendidikan.png', 0.20, 50);
        $this->mpdf->showWatermarkImage = true;
        $this->mpdf->setFooter('SMK XXXX XXXX - ' . $kelas['kelas'] . ' ' . $jurusan['jurusan'] . ' [{PAGENO}]');
        $this->response->setHeader('Content-Type', 'application/pdf');
        $this->mpdf->Output('arjun.pdf', 'I');
    }
}
