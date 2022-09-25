$(document).ready(function () {
    var tahun = new Date();
    var dataPPDB = [];
    var dataSiswa = [];
    // The Calender
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
    getDataSiswa();
    getDataPPDB();
  
    function getDataSiswa() {
      $.ajax({
        url:url + 'admin/siswa/get-data',
        type: 'GET',
        async: true,
        dataType: 'JSON',
        beforeSend : function (){
          $('#loader-wrapper').show();
        },
        success : function(data){
          for(var i in data){
            dataSiswa.push(data[i]);
          }
          console.log(dataSiswa);
        },
        error: function(jqXHR, textStatus, error){
          alert('Error : Read Data PPDB SD-SMP ' + jqXHR + textStatus + error);
          location.reload();
        }
      });
    }


    function getDataPPDB() {
      $.ajax({
        url:url + 'admin/ppdb/get-data',
        type: 'GET',
        async: false,
        dataType: 'JSON',
        complete : function (){
          $('#loader-wrapper').hide();
        },
        success : function(data){
          for(var i in data){
            dataPPDB.push(data[i]);
          }
          console.log(dataPPDB);
        },
        error: function(jqXHR, textStatus, error){
          alert('Error : Read Data PPDB SD-SMP ' + jqXHR + textStatus + error);
          location.reload();
        }
      });
    }

    var donutData = {
        labels: [
            'Siswa SD',
            'Siswa SMP',
        ],
        datasets: [{
            data: dataSiswa,
            backgroundColor: ['#f56954', '#00c0ef'],
        }]
    }

    
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = donutData;
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    })

    var areaChartData = {
      labels  : [tahun.getFullYear() - 5, tahun.getFullYear() - 4, tahun.getFullYear() - 3, tahun.getFullYear() - 2, tahun.getFullYear() - 1, tahun.getFullYear()],
      datasets: [
        {
          label               : 'SD - SMP',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : dataPPDB
        },
      ]
    }

    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, areaChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
})
