<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa/Siswi Kelas <?= $kelas->kelas; ?> <?= $jurusan->jurusan; ?></title>
    <link rel="shortcut icon" href="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
        }

        .head {
            display: flex;
            flex-direction: row;

            justify-content: center;
            align-items: center;
        }

        .img-rounded {
            width: 20%;
            float: left;
        }

        .title-head {
            width: 60%;
            float: left;
            text-align: center;
            margin: 0;
            gap: -10px;
        }

        .line {
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .ttd {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            padding: 0 20px;
            text-align: center;
        }

        .ttd1 {
            width: 40%;
            float: left;
        }

        .gap-ttd {
            width: 10;

        }

        .ttd2 {
            width: 40%;
            float: right;

        }

        .line-ttd {
            margin: -10px;
            border: 2px solid black;
        }

        .title-ttd {
            margin-bottom: 80px;

            font-size: 15px;
        }

        .nip {
            margin-top: -25px;
        }
    </style>
</head>

<body>
    <div class="head">
        <div class="img-rounded">
            <img src="./assets/logo-pendidikan.png" alt="" height="80" width="80">
        </div>
        <div class="title-head">
            <h4>Daftar Nilai Kelas <?= $kelas->kelas; ?> <?= $jurusan->jurusan; ?></h4>
            <h4><?= $sekolah->nama_sekolah; ?></h4>
            <h6><?= $sekolah->alamat; ?> Telp. <?= $sekolah->no_telp; ?></h6>
        </div>
    </div>
    <hr class="line">

    <div style="text-align: center;margin-bottom:-5px;">
        <h4>Nilai Mata Pelajaran <?= $mapel->nama_mapel; ?></h4>
    </div>
    <div style="text-align: right;margin-bottom:20px;">
        <p style="font-size: 14px;">Guru Pengampu : <b><?= $guru->nama; ?></b></p>
    </div>
    <table style="padding: 40px; border-collapse: collapse;width: 100%;font-size: 14px;">
        <thead>
            <tr style="border:1px solid silver;">
                <th style="padding: 10px;border:1px solid silver;">#</th>
                <th style="padding: 10px;border:1px solid silver;">No Induk</th>
                <th style="padding: 10px;border:1px solid silver;">Nama</th>
                <th style="padding: 10px;border:1px solid silver;">Nilai</th>
                <th style="padding: 10px;border:1px solid silver;">Hasil</th>

            </tr>
        </thead>
        <tbody style="gap:40px ;">
            <?php $i = 1;
            foreach ($siswa as $s) : ?>
                <tr style="border:1px solid silver;">
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $i++; ?></td>
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $s->no_induk; ?></td>
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $s->nama; ?></td>
                    <?php $db = db_connect();
                    $data = $db->table('nilai_mapel_siswa')->select('nilai_mapel_siswa.*')->where('id_siswa', $s->id)->where('id_nilai', $nilaiRataRata->id)->get()->getResultObject();
                    ?>
                    <?php if ($data) : ?>
                        <?php foreach ($data as $d) : ?>
                            <td style="padding: 5px;border:1px solid silver;text-align: center;font-weight: bold;"><?= $d->nilai; ?></td>
                            <td style="padding: 5px;border:1px solid silver;text-align: center;">
                                <?php $b = $nilaiRataRata->nilai_rata_rata + 5;
                                $bPlus = $nilaiRataRata->nilai_rata_rata + 15;
                                ?>
                                <?php if ($d->nilai >= 95) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:greenyellow;">A+</p>
                                <?php elseif ($d->nilai >= 90) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:greenyellow;">A</p>
                                <?php elseif ($d->nilai >= $bPlus) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:skyblue;">B+</p>
                                <?php elseif ($d->nilai >=  $b) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:skyblue;">B</p>
                                <?php elseif ($d->nilai >  $nilaiRataRata->nilai_rata_rata) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:orange;">C+</p>
                                <?php elseif ($d->nilai ==  $nilaiRataRata->nilai_rata_rata) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:orange;">C</p>
                                <?php elseif ($d->nilai <  $nilaiRataRata->nilai_rata_rata) : ?>
                                    <p style="font-size: 16px;font-weight: bold;color:red;">D</p>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <td style="padding: 5px;border:1px solid silver;text-align: center;">-</td>
                        <td style="padding: 5px;border:1px solid silver;text-align: center;">-</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div style="text-align: right;margin-top:20px;margin-right:50px;">
        <p style="font-size: 14px;">Biak, <?= Date('d M Y'); ?></p>
    </div>
    <div class="ttd">
        <div class="ttd1">
            <div class="title-ttd">
                <h5>Kepala Sekolah</h5>
            </div>
            <p><?= $sekolah->kepala_sekolah; ?></p>
            <hr class="line-ttd">
            <p class="nip"><?= $sekolah->nip_kepsek; ?></p>
        </div>
        <div class="gap-ttd"></div>
        <div class="ttd2">
            <div class="title-ttd">
                <h5>Wali Kelas</h5>
            </div>
            <p><?= $wali->nama ?></p>
            <hr class="line-ttd">
            <p class="nip"><?= $wali->nip; ?></p>
        </div>
    </div>


</body>

</html>