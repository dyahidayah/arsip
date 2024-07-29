<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Machine PT Parkland World Indonesia Jepara</title>
    <style>
        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th, td {
            padding: 15px;
        } 

        table tr th,
        table tr td {
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h4 style="text-align:center;" class="text-uppercase">
        <?php 
            if($data_surat == 'semua') {
                echo "LAPORAN SURAT MASUK DAN KELUAR SATHARMATTIM<br/> DARI TANGGAL " . $tanggal_awal  . " s/d " .  $tanggal_akhir ;
            } elseif($data_surat == "surat_masuk"){
                echo "LAPORAN SURAT MASUK <br/> DARI TANGGAL " . $tanggal_awal  . " s/d " .  $tanggal_akhir  ;
            } else {
                echo "LAPORAN SURAT KELUAR<br/> DARI TANGGAL " . $tanggal_awal  . " s/d " .  $tanggal_akhir ;
            }
        ?>
    </h4>
    <table autosize="2.4">
        <thead>
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Kategori Surat</th>
                <th>Jenis Surat</th>
                <th>Perihal</th>
                <?php if($data_surat == 'semua')  : ?>
                <th class="kolom_ds">Data Surat</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            if ($detail_surat) : 
                if ($data_surat != 'semua') {
            ?>
                
                <?php foreach ($detail_surat as $dm) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= ($dm->no_surat) ? $dm->no_surat : '-' ?></td>
                        <td class="text-center adibold"><?= ($dm->kategori) ? $dm->kategori : '-' ?></td>
                        <td class="text-center"><?= ($dm->jns_surat) ? $dm->jns_surat : '-' ?></td>
                        <td class="text-center"><?= ($dm->perihal) ? $dm->perihal : '-' ?></td>
                    </tr>
                <?php endforeach ?>
                
            <?php 
                } else { ?>
                <?php foreach ($detail_surat['masuk'] as $dm) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= ($dm->no_surat) ? $dm->no_surat : '-' ?></td>
                        <td class="text-center adibold"><?= ($dm->kategori) ? $dm->kategori : '-' ?></td>
                        <td class="text-center"><?= ($dm->jns_surat) ? $dm->jns_surat : '-' ?></td>
                        <td class="text-center"><?= ($dm->perihal) ? $dm->perihal : '-' ?></td>
                        <td class="text-center">Surat Masuk</td>
                    </tr>
                <?php endforeach ?>
                <?php foreach ($detail_surat['keluar'] as $dm) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= ($dm->no_surat) ? $dm->no_surat : '-' ?></td>
                        <td class="text-center adibold"><?= ($dm->kategori) ? $dm->kategori : '-' ?></td>
                        <td class="text-center"><?= ($dm->jns_surat) ? $dm->jns_surat : '-' ?></td>
                        <td class="text-center"><?= ($dm->perihal) ? $dm->perihal : '-' ?></td>
                        <td class="text-center">Surat Keluar</td>
                    </tr>
                <?php endforeach ?>
                    <?php
                }
            endif 
            ?>
        </tbody>
    </table>
</body>

</html>