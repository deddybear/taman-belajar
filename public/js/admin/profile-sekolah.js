$(document).ready(function() {

    $('#teks_profile').summernote({
        toolbar: [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']]
        ],
        height: 300,
        placeholder: 'Silahkan isi Profile Sekolah',
    });
    getData();
    var method;
    var html;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // TODO : Read Data
    function getData() {
        
        $.ajax({
            url: url + 'admin/data-profile/get-data/' + idProfile,
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

                html = '';
            $.each(data, function(index, row) {
                
                html += row.isi_profile ;
            });
                $('#show_data').html(html);
            },
       
        });
    }

    $('#editdata').click(function(){
        $('.modal-title').html("Edit Post Profile Sekolah");
        $("#teks_profile").summernote("reset");
    });

    //TODO : EDIT DATA
    $('#form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url:url + 'admin/data-profile/edit/' + idProfile,
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
                    $('#modal_form').modal('hide');

                } else if (data.sukses){
                    
                    html = '<div class="alert alert-success">' + data.sukses + '</div>';
                    $('#result').html(html);
                    $('#modal_form').modal('hide');
                    getData();

                }
            },
        });
    });
});