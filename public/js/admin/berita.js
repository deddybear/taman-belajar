$(document).ready(function () {

    var method;
    var html;
    var urlTemp;
    var id;


    $('.siswa').hide();
    $('#teks_artikel').summernote({
        height: 300,
        placeholder: 'Silahkan artikel apa yang anda ingin posting',
        popover: {
            table: [
              ['custom', ['mergeCell', 'mergeRow']],
              ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
              ['delete', ['deleteRow', 'deleteCol', 'deleteTable']]
            ],
        },
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  
    $('#kategori').on('change', function(){
        var value = this.value;
        if (value == "A1") {

            $('.for').html('Untuk Sekolahan ?');
            $('.siswa').show();
        
        } else if (value == "A2"){
        
            $('.for').html('Untuk Siswa ?');
            $('.siswa').show();
            
        } else {

            $('.siswa').hide();

        }
    });

    getData();
    
    //TODO: Read Data 
    function getData() {
        var table = $('#dataTable').DataTable();
        table.destroy();
        $.ajax({
            url:url + 'admin/berita/get-data',
            type: 'GET',
            async: true,
            dataType: 'json',
            beforeSend : function (){
                $('#loader-wrapper').show();
            },
            complete : function (){
                $('#loader-wrapper').hide();
            },
            success : function(data){
   
                var nomer = 1;
                html = '';

                $.each(data, function(index, row) {
                                 
                    html += '<tr>'
                    html += '<td>'+ nomer++ +'</td>'
                    html += '<td>'+ row.judul_berita +'</td>'
                    html += '<td>'+ row.nama +'</td>'
                    html += '<td>'+ row.type_berita +'</td>'
                    html += '<td>'+ moment(row.created_at).toString() +'</td>'
                    html += '<td>'+ moment(row.updated_at).toString() +'</td>'
                    html += '<td>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-primary edit_data" data="'+row.id_berita+'">Edit</a>'
                    html += ' <a href="javascript:;" class="btn btn-xs btn-danger hapus_data" data="'+row.id_berita+'">Hapus</a>'
                    html +='</td> </tr>'
                });

                $('#show_data').html(html);
                $('#dataTable').DataTable();

            },
            error: function(jqXHR, textStatus, error){
                alert('Error : Read Data Berita ' + jqXHR + textStatus + error);
                location.reload();
            }
        })
    }

    $('#tambahdata').click(function(){
        $('.modal-title').html("Posting Artikel");
        $('#form')[0].reset();
        $('.siswa').hide();
        method = "tambah";
        $("#teks_artikel").summernote("reset");
    });    

    //TODO : untuk Add dan Update Data
    $('#form').on('submit', function(e) {
        e.preventDefault();

        if (method == "tambah") {
            
            urlTemp = url + "admin/berita/add-berita";

        } else if (method == "update"){

            urlTemp = url + "admin/berita/update-berita/" + id;
        }

        $.ajax({
            url: urlTemp,
            type: 'POST',
            dataType: 'JSON',
            data:$('#form').serialize(),
            beforeSend: function(){
                // Show image container loading
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
                    $('#teks_artikel').summernote('reset');
                    $('#result').html(html);
                    $('#modal_form').modal('hide');

                } else if (data.sukses){
                    
                    html = '<div class="alert alert-success">' + data.sukses + '</div>';
                    $('#teks_artikel').summernote('reset');
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
    });

    // TODO: Select Data dan ditampilkan
    $('#show_data').on('click', '.edit_data', function(){
        $('#form')[0].reset();
        $('.siswa').hide();
        $('#teks_artikel').summernote({
            placeholder: 'Silahkan artikel apa yang anda ingin posting',
        });
        method = "update";        
        id = $(this).attr('data');

        $.ajax({
            type: 'GET',
            url: url + "admin/berita/select-berita/" + id,
            dataType: 'JSON',
            beforeSend: function(){
                $('#loader-wrapper').show();
            },
            complete: function(){
                $('#loader-wrapper').hide();
            },
            success: function(data){ 
                $("#teks_artikel").summernote("reset");
                $('#modal_form').modal('show');
                $('.modal-title').text("Edit Artikel : " + data[0].judul_berita);
            
            },
            error: function name (paramsjqXHR, textStatus, error) {
                alert('Error : ' + paramsjqXHR + textStatus + error);
               
            }
        });
    })
    
    // TODO: Delete Data Berita
    $('#dataTable').on('click', '.hapus_data', function () {
        var idItem = $(this).attr('data');
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
                url: url + "admin/berita/delete-berita/" + idItem,
                dataType: "json",
                beforeSend: function(){
                    // Show image container
                    $('#loader-wrapper').show();
                },
                complete: function(){
                    $('#loader-wrapper').hide();
                },
                success:function(data){
                  swal({
                    icon: "success",
                    text: data.sukses, 
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
             swal("Your imaginary file is safe!");
         }
     });
    })
});
