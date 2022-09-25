$(document).ready(function () {
  
    getData();

    var method;
    var html;
    var urlTemp;
    var id;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // TODO: Read Data
    function getData() {
        var table = $('#dataTable').DataTable();
        table.destroy();
        $.ajax({
            url: url + 'admin/struktural/data/' + idSekolah,
            type: 'GET',
            async: true,
            dataType: 'json',
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function(data) {
                
                var nomer = 1;
                html = '';

                $.each(data, function (index, row) {
                    html += '<tr>'
                    html += '<td>'+ nomer++ +'</td>'
                    html += '<td>'+ row.nama +'</td>'
                    html += '<td>'+ row.nuptk+'</td>'
                    html += '<td>'+ row.jabatan +'</td>'
                    html += '<td>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-primary edit_data" data="'+row.id_struktural+'">Edit</a>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-danger hapus_data" data="'+row.id_struktural+'">Hapus</a>'
                    html += '</td> </tr>';
                });

                $('#show_data').html(html);
                $('#dataTable').DataTable();
            },
            error: function(jqXHR, textStatus, error){
                alert('Error : '+ method + ' Data ' + jqXHR + textStatus + error);
                location.reload();
            }
        });

    }

    $("#tambahdata").click(function(){
        $('.modal-title').html("Form Data Struktural");
        $('#form')[0].reset();
        method = "tambah";
    });

    //TODO : untuk Add dan Update Data
    $("#form").on('submit', function(e) {
        e.preventDefault();

        if (method == "tambah") {

            urlTemp = url + "admin/struktural/add/" + idSekolah + "/" + slug;

        } else if (method == "update"){

            urlTemp = url + "admin/struktural/update/"+ id;

        }

        $.ajax({
            url:urlTemp,
            type: 'POST',
            dataType: 'JSON',
            data:$('#form').serialize(),
            beforeSend: function(){
                // Show image container
              $('#loader-wrapper').show();
            },
            complete: function(){
              $('#loader-wrapper').hide();
            },
            success: function(data){
                if (data.error) {
                    
                    html = '<div class="alert alert-danger">';
                    for (let index = 0; index < data.error.length; index++) {
                        html += '<p>' + data.error[index] + '</p>';
                    }
                    html += '</div>';
                    $('#result').html(html);
                    getData();

                } else if (data.sukses) {

                    html = '<div class="alert alert-success">' + data.sukses + '</div>';
                    $('#form')[0].reset();
                    $('#result').html(html);
                    $('#modal_form').modal('hide');
                    getData();

                }
            },
            error: function(jqXHR, textStatus, error){
                alert('Error : '+ method + ' Data ' + jqXHR + textStatus + error);
                location.reload();
            }
        });
    })

    // TODO: Select Data dan ditampilkan
    $('#show_data').on('click', '.edit_data', function(){
        $('#form')[0].reset();
        method = "update";

        id = $(this).attr('data');
    
        $.ajax({
            type: 'GET',
            url: url + "admin/struktural/select/" + id,
            dataType: 'JSON',
            beforeSend: function(){
                $('#loader-wrapper').show();
            },
            complete: function(){
                $('#loader-wrapper').hide();
            },
            success: function(data){ 

                $.each(data, function(index, row){
                    $('#nama').val(row.nama);
                    $('#nuptk').val(row.nuptk);
                    $('#jabatan').val(row.jabatan);
                });

                $('#modal_form').modal('show');
                $('.modal-title').text("Edit Data Siswa");

            },
            error: function name (paramsjqXHR, textStatus, error) {
                alert('Error : ' + paramsjqXHR + textStatus + error);
               
            }
        })
    });

    //TODO: Untuk Menghapus Data
    $('#dataTable').on('click', '.hapus_data', function () {
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
                    url: url + "admin/struktural/delete/" + id,
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
                        html = '<div class="alert alert-warning">' + data.sukses + '</div>';
                        $('#result').html(html);
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
})
