<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<!-- Page content -->
<div id="page-content-wrapper">
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
        <div class="row">
            <div class="col-md-12">

                <div id="chart-container" style="height: 350px; width: 100%;"></div>

            </div>
        </div>
    </div>
</div>


<script>
    window.onload = function () {
        Highcharts.chart('chart-container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statitics of Students'
            },
            xAxis: {
                categories: ['Quiz 1', 'Quiz 2', 'Quiz 3', 'Quiz 4', 'Quiz 5']
            },
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Students'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'Total: ' + this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Pass',
                    data: [5, 3, 4, 7, 2],
                    stack: 'male',
                    color: '#00FF00'
                }, {
                    name: 'Failed',
                    data: [3, 4, 4, 2, 5],
                    stack: 'male',
                    color: '#FF0000'
                }, 
//                {
//                    name: 'Jane',
//                    data: [2, 5, 6, 2, 1],
//                    stack: 'female'
//                }, {
//                    name: 'Janet',
//                    data: [3, 0, 4, 4, 3],
//                    stack: 'female'
//                }
            ]
        });
    }
</script>