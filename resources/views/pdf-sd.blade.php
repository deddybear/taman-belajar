<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <style>
        .img-profile {
            height: 190px;
            width: 130px;

        }

    </style>
</head>

<body>

    <h1 style="text-align: center; font-weight: bold; font-size:25px"><b>Data Pendaftaran</b></h1>
    <div class="col-md-10 my-5 mx-auto">
        <p>
            <small><b>Wajib</b> didownload, untuk keperluan validasi</small>
        </p>
        <div class="card border-primary mb-2">
            <div class="card-header">A. Data Calon Peserta Didik</div>
            <div class="card-body text-dark">
                <p class="card-text">
                    <table>
                        <tr>
                            <th>
                                <p>ID Pendaftaran : {{ $id }}</p>
                                <p>Nama Lengkap : {{ $nama_siswa }}</p>
                                <p>Kelamin : {{ $kelamin }}</p>
                                <p>Tempat, Tanggal Lahir : {{ $ttl }} </p>
                                <p>Agama : {{ $agama_siswa }}</p>
                                <p>Anak Ke-{{ $anak_ke }} </p>
                                <p>Jumlah Saudara : {{ $jumlah_saudara }}</p>
                                <p>Alamat Lengkap : {{ $alamat_lengkap }}</p>
                            </th>
                            <th>
                                <div class="img-profile asu">
                                   
                                    <img style="height: 150px; width: 150px"
                                        src="file_ppdb/sd/{{ $id }}/{{ $file_foto }}">
                                </div>
                            </th>
                        </tr>
                    </table>
                </p>
            </div>
        </div>


        <div class="card border-danger mb-2">
            <div class="card-header">B. Keterangan Orang Tua Kandung</div>
            <div class="card-body text-dark">
                <p class="card-text">
                    <label><strong>Nama Lengkap</strong></label>
                    <div class="px-3">
                        <p>Nama Ayah : {{ $nama_ayah }}</p>
                        <p>Nama Ibu : {{ $nama_ibu }}</p>
                    </div>
                    <label><strong>Tempat, Tanggal Lahir</strong></label>
                    <div class="px-3">
                        <p>Ayah : {{ $ttl_ayah }} </p>
                        <p>Ibu : {{ $ttl_ibu }}</p>
                    </div>
                    <label>Pekerjaan</label>
                    <div class="px-3">
                        <p>Ayah : {{ $pekerjaan_ayah }}</p>
                        <p>Ibu : {{ $pekerjaan_ibu }}</p>
                    </div>
                    <label><strong>Pendidikan Terakhir</strong></label>
                    <div class="px-3">
                        <p>Ayah : {{ $pendidikan_ayah }}</p>
                        <p>Ibu : {{ $pendidikan_ibu }}</p>
                    </div>
                    <label><strong>Agama</strong></label>
                    <div class="px-3">
                        <p>Ayah : {{ $agama_ayah }}</p>
                        <p>Ibu : {{ $agama_ibu }}</p>
                    </div>
                    <label><strong>No. Telp / HP</strong></label>
                    <div class="px-3">
                        <p>Ayah : {{ $nomer_hub_ayah }}</p>
                        <p>Ibu : {{ $nomer_hub_ibu }}</p>
                    </div>
                    <label><strong>Penghasilan Orang Tua</strong></label>
                    <div class="px-3">
                        <p>Ayah : {{ $penghasilan_ayah }}</p>
                        <p>Ibu : {{ $penghasilan_ibu }} </p>
                    </div>
                    <label><strong>Keterangan</strong></label>
                    <div class="px-3">
                        <p>Ayah : {{ $keterangan_ayah }} </p>
                        <p>Ibu : {{ $keterangan_ibu }}</p>
                    </div>
                    <p>Alamat Tempat Tinggal : {{ $alamat_ortu }} </p>
                </p>
            </div>
        </div>

        <div class="card border-success mb-2">
            <div class="card-header">C. Data Orang Wali</div>
            <div class="card-body text-dark">
                <p class="card-text">
                    <p>Nama Wali : {{ $nama_wali }}</p>
                    <p>Tempat, Tanggal Lahir : {{ $ttl_wali }}</p>
                    <p>Pendidikan Terakhir : {{ $pendidikan_wali }}</p>
                    <p>Agama : {{ $agama_wali }}</p>
                    <p>Pekerjaan : {{ $pekerjaan_wali }}</p>
                    <p>No. Telp / HP : {{ $nomer_hub_wali }}</p>

                </p>
            </div>
        </div>
    </div>
</body>

</html>
