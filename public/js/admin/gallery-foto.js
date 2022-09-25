$(document).ready(function () {
   
    getData();
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //TODO : get data foto
    function getData() {
        var table = $('#dataTable').DataTable();
        table.destroy();
        $.ajax({
            url: url + 'admin/foto/get-data',
            type:'GET',
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
                var html = '';
                
                $.each(data, function(index, row) {                    
                    html += '<tr>'
                    html += '<td>'+ nomer++ +'</td>'
                    html += '<td>'+ row.nama +'</td>'
                    html += '<td>'+ row.judul +'</td>'
                    html += '<td>'+ row.keterangan +'</td>'
                    html += '<td><img src="'+ '/images/gallery-photo/' + row.link +'" style="width: 100px;height: 100px;"></td>'
                    html += '<td>'+ moment(row.created_at).toString() +'</td>'
                    html += '<td>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-danger hapus_data" data="'+row.id_gallery+'">Hapus</a>'
                    html += '</td> </tr>';

                });

                $('#show_data').html(html);
                $('#dataTable').DataTable();
            }
        });
    }

    $("#tambahdata").click(function(){
        $('.modal-title').html("Upload Foto");
        $('#form')[0].reset();
    });

    $('#form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url:url + "admin/foto/upload-foto",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            beforeSend: function(){
                // Show image container
                $('#loader-wrapper').show();
            },
            complete: function(){
                $('#loader-wrapper').hide();
            },
            success:function(data){
                var html = '';
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
            }
        });
    });

    $('#dataTable').on('click', '.hapus_data', function () {
        var idItem = $(this).attr('data');
        var html;
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
                url: url + "admin/foto/delete-foto/" + idItem,
                dataType: "json",
                beforeSend: function(){
                    // Show image container
                    $('#loader-wrapper').show();
                },
                complete: function(){
                    $('#loader-wrapper').hide();
                },
                success:function(data){
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
    })
});
