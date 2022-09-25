$(document).ready(function(){
    $("#form").on('click', '.show_data', function(){    
        var data = $('form').serializeArray();
        var isi = {};
        $.each(data, function(i, input){
            isi[input.name] = input.value;
            
        });
        Swal.fire({
            title: '<strong>Mohon dicheck ulang !</strong>',
            icon: 'info',
            html:'<p style="text-align:left;">'+
              '<strong>A. Data Calon Peserta Didik</strong> <br>'+
              'Nama Lengkap : '+isi.nama_siswa+'<br>' +
              'Jenis Kelamin : '+isi.kelamin_siswa+'<br>' +
              'NISN : '+isi.nisn_siswa+'<br>'+
              'NIK : '+isi.nik_siswa+'<br>'+
              'Tempat Tanggal Lahir : '+isi.tempat_lahir_siswa+', '+isi.tanggal_lahir_siswa+'<br>'+
              'Agama : '+isi.agama_siswa+'<br>'+
              'Alamat Lengkap : '+isi.alamat_lengkap_siswa+'<br>'+
              'Tempat Tinggal : '+isi.tempat_tinggal_siswa+'<br>'+
              'Transportasi : '+isi.transport_siswa+'<br>'+
              'No Telp / HP : '+isi.nomer_siswa+'<br>'+
              'No. KPS / KKS : '+isi.nomer_kps_siswa+'<br>'+
              'Asal Sekolah : '+isi.asal_sekolah_siswa+'<br><br><br>'+
              '<strong>B. Keterangan Orang Tua Kandung</strong> <br>'+
              'Nama Ayah : '+isi.nama_ayah+'<br>'+
              'Nama Ibu : '+isi.nama_ibu+'<br>'+
              'Tempat Tanggal Lahir Ayah : '+isi.tempat_lahir_ayah+', '+isi.tanggal_lahir_ayah+'<br>'+
              'Tempat Tanggal Lahir Ibu : '+isi.tempat_lahir_ibu+', '+isi.tanggal_lahir_ibu+'<br>'+
              'Pekerjaan Ayah : '+isi.pekerjaan_ayah+'<br>'+
              'Pekerjaan Ibu : '+isi.pekerjaan_ibu+'<br>'+
              'Pendidikan Terakhir Ayah : '+isi.pendidikan_ayah+'<br>'+
              'Pendidikan Terakhir Ibu : '+isi.pendidikan_ibu+'<br>'+
              'Agama Ayah : '+isi.agama_ayah+'<br>'+
              'Agama Ibu : '+isi.agama_ibu+'<br>'+
              'No. Hp/Telp Ayah : '+isi.nomer_ayah+'<br>'+
              'No. Hp/Telp Ibu : '+isi.nomer_ibu+'<br>'+
              'Alamat Tempat Tinggal : '+isi.alamat_tempat_ortu+'<br>'+
              'Penghasilan Ayah : '+isi.penghasilan_ayah+'<br>'+
              'Penghasilan Ibu : '+isi.penghasilan_ibu+'<br>'+
              'Keterangan Ayah : '+isi.keterangan_ayah+'<br>'+
              'Keterangan Ibu : '+isi.keterangan_ibu+'<br><br><br>'+
              '<strong>C. Data Periodik Calon Peserta Didik</strong><br>'+
              'Tinggi : '+isi.tinggi_calon+'CM <br>'+
              'Berat Badan : '+isi.bb_calon+'KG <br>'+
              'Jarak Ke Sekolah : '+isi.jarak_rmh+'KM <br>'+
              'Waktu Tempuh : '+isi.jam+' Jam '+isi.menit+' Menit <br>'+
              'Anak-Ke '+isi.anakke+'<br>'+
              '</p>'
              ,
            showCloseButton: true,
            showDenyButton: true,
            focusConfirm: false,
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Betul!',
            denyButtonText:
              'Ingin Memperbaiki',
        }).then((result) => {

            if (result.isConfirmed){
                $('#button-show').html(
                    '<button id="btn-submit" class="btn btn-success col-12 m-1" type="submit">Submit Data Pendaftaran</button>'
                );
              
            } else if (result.isDenied){
               $('#btn-submit').remove();
            }

        })
    });


$("#form").on('click', '.show_data_sd', function(){  
    var data = $('form').serializeArray();
    var isi = {};
    $.each(data, function(i, input){
        isi[input.name] = input.value;    
    });

    Swal.fire({
        title: '<strong>Mohon dicheck ulang !</strong>',
        icon: 'info',
        html:'<p style="text-align:left;">'+
          '<strong>A. Data Calon Peserta Didik</strong> <br>'+
          'Nama Lengkap : '+isi.nama_siswa+'<br>' +
          'Jenis Kelamin : '+isi.kelamin+'<br>' +
          'Tempat Tanggal Lahir : '+isi.tempat_lahir_siswa+', '+isi.tanggal_lahir_siswa+'<br>'+
          'Agama : '+isi.agama_siswa+'<br>'+
          'Anak-Ke '+isi.anak_ke+'<br>'+
          'Jumlah Saudara '+isi.jumlah_saudara+'<br>'+
          'Alamat Lengkap : '+isi.alamat_lengkap+'<br><br><br>'+
          '<strong>B. Keterangan Orang Tua Kandung</strong> <br>'+
          'Nama Ayah : '+isi.nama_ayah+'<br>'+
          'Nama Ibu : '+isi.nama_ibu+'<br>'+
          'Tempat Tanggal Lahir Ayah : '+isi.tempat_lahir_ayah+', '+isi.tanggal_lahir_ayah+'<br>'+
          'Tempat Tanggal Lahir Ibu : '+isi.tempat_lahir_ibu+', '+isi.tanggal_lahir_ibu+'<br>'+
          'Pekerjaan Ayah : '+isi.pekerjaan_ayah+'<br>'+
          'Pekerjaan Ibu : '+isi.pekerjaan_ibu+'<br>'+
          'Pendidikan Terakhir Ayah : '+isi.pendidikan_ayah+'<br>'+
          'Pendidikan Terakhir Ibu : '+isi.pendidikan_ibu+'<br>'+
          'Agama Ayah : '+isi.agama_ayah+'<br>'+
          'Agama Ibu : '+isi.agama_ibu+'<br>'+
          'No. Hp/Telp Ayah : '+isi.nomer_ayah+'<br>'+
          'No. Hp/Telp Ibu : '+isi.nomer_ibu+'<br>'+
          'Alamat Tempat Tinggal : '+isi.alamat_tempat_ortu+'<br>'+
          'Penghasilan Ayah : '+isi.penghasilan_ayah+'<br>'+
          'Penghasilan Ibu : '+isi.penghasilan_ibu+'<br>'+
          'Keterangan Ayah : '+isi.keterangan_ayah+'<br>'+
          'Keterangan Ibu : '+isi.keterangan_ibu+'<br><br><br>'+
          '<strong>C. Data Orang Wali</strong><br>'+
          'Nama : '+isi.nama_wali+'<br>'+
          'Tempat Tanggal Lahir : '+isi.tempat_lahir_wali+', '+isi.tanggal_lahir_wali+'<br>'+
          'Pendidikan Terakhir : '+isi.pendidikan_wali+'<br>'+
          'Agama : '+isi.agama_wali+'<br>'+
          'Pekerjaan : '+isi.pekerjaan_wali+'<br>'+
          'No. Hp/Telp: '+isi.nomer_wali+'<br>'+
          '</p>'
          ,
        showCloseButton: true,
        showDenyButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Betul!',
        denyButtonText:
          'Ingin Memperbaiki',
    }).then((result) => {

        if (result.isConfirmed){
            $('#button-show').html(
                '<button id="btn-submit" class="btn btn-success col-12 m-1" type="submit">Submit Data Pendaftaran</button>'
            );
          
        } else if (result.isDenied){
           $('#btn-submit').remove();
        }

    })
});

});