<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran <?= $kelas['kelas']; ?> <?= $jurusan['jurusan']; ?></title>
    <link rel="shortcut icon" href="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo"  type="image/x-icon">
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
            padding: 0 50px;
            text-align: center;
        }

        .ttd1 {
            width: 35%;
            float: left;
        }

        .ttd2 {
            width: 35%;
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
            <h4>Jadwal Mata Pelajaran</h4>
            <h4>SMK XXXX XXXXXX XXXX</h4>
            <h6>Jl. xxxx xxxxxxxxx xxxx xxxxxx. Telp. 0981 27246</h6>
        </div>
    </div>
    <hr class="line">
    <div style="text-align: center;">
        <h4> Kelas <?= $kelas['kelas']; ?> <?= $jurusan['jurusan']; ?></h4>
    </div>
    <div style="text-align: right;margin-right:50px;font-size: 12px;">
        <p>Biak, <?= Date('d M Y'); ?></p>
    </div>
    <?php
    foreach ($mapel as $m) : ?>
        <h6 style="text-align: center;"><?= $m->hari; ?></h6>
        <table style="padding: 40px; border-collapse: collapse;width: 100%;font-size: 12px;">
            <thead>
                <tr style="border:1px solid silver;">
                    <th style="padding: 10px;border:1px solid silver;">#</th>

                    <th style="padding: 10px;border:1px solid silver;">Mapel</th>
                    <th style="padding: 10px;border:1px solid silver;">Waktu</th>
                    <th style="padding: 10px;border:1px solid silver;">Guru Pengampu</th>

                </tr>
            </thead>
            <tbody style="gap:40px ;">
                <?php $db = db_connect();
                $jadwal = $db->table('mapel')->select('mapel.*,guru.nama')->join('guru', 'guru.id=mapel.guru_id')->where('hari', $m->hari)->where('kelas_id', $kelas['id'])->orderBy('waktu', 'ASC')->get()->getResultObject(); ?>
                <?php $i = 1;
                foreach ($jadwal as $j) : ?>
                    <tr style="border:1px solid silver;">
                        <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $i++; ?></td>
                        <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $j->nama_mapel; ?></td>
                        <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $j->waktu; ?></td>
                        <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $j->nama; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
</body>

</html>