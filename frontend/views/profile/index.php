<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="col-md-12">


            <div id="chart-container" style="height: 350px; width: 100%;"></div>
            <div class="clearfix"></div>
            <div class="my-result-graph">
                <h2>Latest available exams</h2>
                 <?php foreach ($quizes as $quiz): ?>
                <?php //<pre>   <?php print_r($quiz);</pre>?>
                <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $quiz->quiz_name; ?> <span class="label label-info"><?= ($quiz->test_type == 0) ? 'Free' : 'Paid'; ?></span></h3>
                    </div>
                    <div class="panel-body">
                        <p class="quz-des italic">Duration: <b><?= $quiz->duration; ?>min</b></p>
                        <p class="quz-des italic">Max. Marks: <b><?= $quiz->correct_score; ?></b></p>
                        <p class="quz-des italic">Negative Marking: <b><?= ($quiz->duration == 0) ? 'No' : 'Yes'; ?></b></p>
                        <p class="quz-des"><?= substr(strip_tags($quiz->description), 0, 110); ?><?php echo strlen($quiz->description) > 100 ? '...' : '';?> </p>
                    </div>
                    <div class="panel-footer">
                        <a class="attempt-btn pull-right"  href="<?= BASE_URL ?>quiz-info/<?= $quiz->quid ?>">Detail
                            <span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                            <div class="clearfix"></div>
                    </div>
                </div>
                </div>
                <?php endforeach;?>
                
                <div class="clearfix"></div>

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
                text: 'My Results Statitics'
            },
            subtitle: {
                //text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        //fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Results (Percentage)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Score Percentage: <b>{point.y:.1f}%</b>'
            },
            series: [{
                    name: 'Population',
                    data: [<?php 
                    foreach($chart_data as $data){
                        echo '[';
                        echo "'".$data['quiz_code']."',".($data['percentage'] < 0 ? 0 : $data['percentage']);
                        echo '],';
                    }
                    ?>],
                    dataLabels: {
                        enabled: false,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        //y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '11px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
        });
    }

</script>

