$(document).ready(function() {
    
 
    $('#teks_artikel').summernote({
        toolbar: [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['picture']]
        ],
        popover: {
            table: [
              ['custom', ['mergeCell', 'mergeRow']],
              ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
              ['delete', ['deleteRow', 'deleteCol', 'deleteTable']]
            ],
        },
        height: 300,
        placeholder: 'Silahkan Pengumuman apa yang anda ingin posting',
    });
    $('#teks_artikel').summernote('reset');
    getData();

    var id;
    var html;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // TODO : READ DATA
    function getData() {
        //get data status ppdb-sd
        var table = $('#dataTable').DataTable();
        table.destroy();
        $.ajax({
            url: url +'admin/ppdb-sd/status',
            type: 'GET',
            async: true,
            dataType : 'json',
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            success: function (data) {
         
                if (data.status_ppdb_sd == 1) {
                    $('#buka').attr("checked", true);
                } else {
                    $('#tutup').attr("checked", true);
                }
            },
            error: function (jqXHR, textStatus, error) {
                alert('Error : Read Status Calon PPDB-SD' + jqXHR + textStatus + error);
                location.reload();
            }
        });
        //get data calon pendaftar-sd
        $.ajax({
            url: url + 'admin/ppdb-sd/get-data',
            type: 'GET',
            async: true,
            dataType: 'json',
            success: function(data) {

                var nomer = 1;
                html = '';

                $.each(data, function(index, row){
                    html += '<tr>'
                    html += '<td>' + nomer++ + '</td>'
                    html += '<td class="text-sm">'+ row.id_calon +'</td>'
                    html += '<td class="text-sm">'+ row.tahun_daftar +'</td>'
                    if (row.keterima == 0) {
                        
                        html += '<td><a class="btn btn-xs btn-danger rounded change-status" href="javascript:;" data="'+row.id_calon+'">Belum Keterima</a></td>'

                    } else if(row.keterima == 1){

                        html += '<td><a class="btn btn-xs btn-success rounded change-status" href="javascript:;" data="'+row.id_calon+'">Keterima</a></td>'
                    
                    }
                    html += '<td class="text-sm">'+ row.nama_calon +'</td>'
                    html += '<td class="text-sm">'+ row.ttl +'</td>'
                    html += '<td class="text-sm">'+ row.alamat_lengkap +'</td>'
                    html += '<td class="text-sm">'+ row.nama_ayah +'</td>'
                    html += '<td class="text-sm">'+ row.nama_ibu +'</td>'
                    html += '<td><a class="btn btn-xs btn-success rounded" href="'+ url +'file_ppdb/sd/'+ row.id_calon +'/'+ row.file_akte +'" download>Download</a></td>'
                    html += '<td><a class="btn btn-xs btn-success rounded" href="'+ url +'file_ppdb/sd/'+ row.id_calon +'/'+ row.file_kk +'" download>Download</a></td>'
                    html += '<td><a class="btn btn-xs btn-success rounded" href="'+ url +'file_ppdb/sd/'+ row.id_calon +'/'+ row.file_foto +'" download>Download</a></td>'
                    if (row.file_kip != 'null') {
                        
                        html += '<td><a class="btn btn-xs btn-success rounded" href="'+ url +'file_ppdb/sd/'+ row.id_calon +'/'+ row.file_kip +'" download>Download</a></td>'

                    
                    } else {

                        html += '<td> Tidak Ada </td>'
                    
                    }                    
                    html += '<td>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-primary download_data" data="'+row.id_calon+'">Download</a>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-danger hapus_data" data="'+row.id_calon+'">Hapus</a>'
                    html += '</td> </tr>';
                });

                $('#show_data').html(html);
                $('#dataTable').DataTable();

            },
            error: function(jqXHR, textStatus, error){
                alert('Error : Read Data Calon PPDB SD' + jqXHR + textStatus + error);
                location.reload();
            }
        });

        //get data berita ppdb-sd
        $.ajax({
            url: url + 'admin/ppdb-sd/get-pengumuman',
            type: 'GET',
            async: true,
            dataType: 'json',
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function (data) {
                $('#judul').html(data.judul_berita);
                $('#time').html('<i class="far fa-clock"></i> ' + new Date(data.updated_at));
                $('#author').html('<i class="fas fa-user"></i> ' + data.nama);
                $('#news').html(data.isi_berita);
                
            },
            error: function (jqXHR, textStatus, error) {
                alert('Error : Get-Data Berita Pengumuman PPDB SMP' + jqXHR + textStatus + error);
                location.reload();
            }
        });
    }

     //TODO : CHANGE STATUS HALAMAN FORM PPDB-SD (BUKA)
     $('#buka').click(function(){
        var status = $(this).attr('value');
     
        swal({
            title: "Apakah anda yakin ?",
            text: "untuk membuka Pendaftaran Peserta didik baru",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + "admin/ppdb-sd/buka",
                    type: 'POST',
                    data:{status},
                    dataType: "JSON",
                    beforeSend: function(){
                        // Show image container
                        $('#loader-wrapper').show();
                    },
                    complete: function(){
                        $('#loader-wrapper').hide();
                    },
                    success: function(data){
                        swal(data.sukses, {
                            icon: "success",
                        });
                    },
                    error: function name(paramsjqXHR, textStatus, error) {
                        alert('Error : ' +paramsjqXHR + textStatus + error);
                    }
                });
            }
        });
    });

     //TODO : CHANGE STATUS HALAMAN FORM PPDB-SD(TUTUP) 
     $('#tutup').click(function(){
        var status = $(this).attr('value');
     
        swal({
            title: "Apakah anda yakin merubah status?",
            text: "Apakah anda yakin untuk menutup Pendaftaran Peserta didik baru",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + "admin/ppdb-sd/tutup",
                    type: 'POST',
                    data:{status},
                    dataType: "JSON",
                    beforeSend: function(){
                        // Show image container
                        $('#loader-wrapper').show();
                    },
                    complete: function(){
                        $('#loader-wrapper').hide();
                    },
                    success: function(data){
                        swal(data.sukses, {
                            icon: "success",
                        });
                    },
                    error: function name(paramsjqXHR, textStatus, error) {
                        alert('Error : ' +paramsjqXHR + textStatus + error);
                    }
                });
            }
        });
    });


    //TODO : CHANGE STATUS CALON PENDAFTARAN SD
    $('#show_data').on('click', '.change-status', function(){
        id = $(this).attr('data');

        swal({
            title: "Apakah anda yakin merubah status?",
            text: "Mengubah status keterima dari calon peserta didik",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: url + "admin/ppdb-sd/change/" +id,
                    dataType: "JSON",
                    beforeSend: function(){
                        // Show image container
                        $('#loader-wrapper').show();
                    },
                    complete: function(){
                        $('#loader-wrapper').hide();
                    },
                    success: function(data){
                        swal(data.sukses, {
                                icon: "success",
                        });
                    
                        getData();
                    },
                    error: function name(paramsjqXHR, textStatus, error) {
                        alert('Error : ' +paramsjqXHR + textStatus + error);
                    }
                });
            } else {
                swal("Ahh... Baiklah :(");
            }
        });
    });

    //TODO : EDIT POSTIGAN PENGUMUMAN
    $('#form').on('submit', function(e){
        e.preventDefault();

        swal({
            title: "Apakah anda yakin ?",
            text: "Untuk Mengupdate Pengumuman PPDB SD",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url + 'admin/ppdb-sd/update-pengumuman',
                    type: 'POST',
                    dataType: 'JSON',
                    data: $('#form').serialize(),
                    beforeSend: function () {
                        // Show image container
                        $('#loader-wrapper').show();
                    },
                    complete: function () {
                        $('#loader-wrapper').hide();
                    },
                    success: function(data) {
                        if(data.sukses) {
                            swal({
                                icon: "success",
                                text: "Berhasil Update Pengumuman PPDB"
                            });
                            html = '<div class="alert alert-warning mx-auto col-6">' + data.sukses + '</div>';
                            $('#result').html(html);
                            $('#teks_artikel').summernote('reset');
                            getData();
                        } else if (data.error) {
                            swal({
                                icon: "warning",
                                text: "Gagal Update Pengumuman PPDB: " +data.error
                            });
                            html = '<div class="alert alert-danger mx-auto col-6">' + data.error + '</div>';
                            $('#result').html(html);
                            getData();
                        }
                    },
                    error: function name(paramsjqXHR, textStatus, error) {
                        alert('Error : ' + paramsjqXHR + textStatus + error);
                    }
                });
            } else {
                swal("Update Dibatalkan !");
            }
        });
    });

    //TODO : CONVERT PDF
    $('#show_data').on('click', '.download_data', function(){
        id = $(this).attr('data');

        $(window).attr('location', url + 'ppdb/sd/download-data/' + id)
    });

    //TODO : DELETE DATA
    $('#show_data').on('click', '.hapus_data', function(){
        id = $(this).attr('data');
        
        swal({
            title: "Apakah anda yakin ?",
            text: "Jika anda menghapus data ini, anda tidak bisa mengembalikannya lagi!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: url + "admin/ppdb-sd/delete/" + id,
                    dataType: "json",
                    beforeSend: function(){
                        // Show image container
                        $('#loader-wrapper').show();
                    },
                    complete: function(){
                        $('#loader-wrapper').hide();
                    },
                    success: function(data){
                        swal(data.sukses, {
                                icon: "success",
                        });
                      
                        getData();
                    },
                    error: function name(paramsjqXHR, textStatus, error) {
                        alert('Error : ' +paramsjqXHR + textStatus + error);
                    }
                });
            } else {

                swal("Ahh... Baiklah :(");
                
            }
        });
    });
});