<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa/Siswi Kelas <?= $kelas['kelas'];?> <?= $jurusan['jurusan'];?></title>
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
            <h4>Daftar Murid Kelas <?= $kelas['kelas']; ?> <?= $jurusan['jurusan']; ?></h4>
            <h4>SMK XXXX XXXXXX XXXX</h4>
            <h6>Jl. xxxx xxxxxxxxx xxxx xxxxxx. Telp. 0981 27246</h6>
        </div>
    </div>
    <hr class="line">

    <div style="text-align: right;margin-bottom:20px;">
        <p>Selaku Wali Kelas : <b><?= $guru['nama']; ?></b></p>
    </div>
    <table style="padding: 40px; border-collapse: collapse;width: 100%;">
        <thead>
            <tr style="border:1px solid silver;">
                <th style="padding: 10px;border:1px solid silver;">#</th>
                <th style="padding: 10px;border:1px solid silver;">No Induk</th>
                <th style="padding: 10px;border:1px solid silver;">Nama</th>
                <th style="padding: 10px;border:1px solid silver;">Jenis Kelamin</th>
                <th style="padding: 10px;border:1px solid silver;">No Handphone</th>

            </tr>
        </thead>
        <tbody style="gap:40px ;">
            <?php $i = 1;
            foreach ($siswa as $s) : ?>
                <tr style="border:1px solid silver;">
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $i++; ?></td>
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $s->no_induk; ?></td>
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $s->nama; ?></td>
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $s->jenis_kelamin; ?></td>
                    <td style="padding: 5px;border:1px solid silver;text-align: center;"><?= $s->no_hp; ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div style="text-align: right;margin-top:20px;margin-right:50px;">
        <p>Biak, <?= Date('d M Y');?></p>
    </div>
    <div class="ttd">
        <div class="ttd1">
            <div class="title-ttd">
                <h5>Kepala Sekolah</h5>
            </div>
            <p>xxxxx xxxxx xxxx</p>
            <hr class="line-ttd">
            <p class="nip">xxxxx xxx xxxx</p>
        </div>
        <div class="ttd2">
            <div class="title-ttd">
                <h5>Wali Kelas</h5>
            </div>
            <p><?= $guru['nama']; ?></p>
            <hr class="line-ttd">
            <p class="nip"><?= $guru['nip']; ?></p>
        </div>
    </div>


</body>

</html>