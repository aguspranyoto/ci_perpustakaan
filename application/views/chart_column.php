<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $judul?></title>
</head>
<body>


<div id="container"></div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perbandingan jumlah_stok Antar buku'
    },
    xAxis: {
        categories: [
            'buku',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'jumlah_stok'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
    			<?php foreach($data_buku as $buku):?>
    			{
			        name: '<?php echo $buku['judul'];?>',
			        data: [<?php echo $buku['jumlah_stok'];?>]
				},
				<?php endforeach?>
		    ]
            //format data original
            /*[{
                name: 'Tokyo',
                data: [49]

            }, {
                name: 'New York',
                data: [83]

            }, {
                name: 'London',
                data: [48]

            }, {
                name: 'Berlin',
                data: [42]

            }]*/
});
</script>

</body>
</html>