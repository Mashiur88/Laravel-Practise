@extends('layouts.application')

@section('content')
<style>
    #chart {
        max-width: 650px;
        margin: 35px auto;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <h1>Bar Chart</h1>
    </div>
    <div class="container-fluid">
        <div id ='chart'>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var options = {
            chart: {
                type: 'bar'
            },
            series: [
                {
                    name: 'Pending',
                    data: [
<?php
if (!empty($projectList)) {
    foreach ($projectList as $projectId => $project) {
        $noOfTask = !empty($statusWiseProjectArr['pending'][$projectId]) ? $statusWiseProjectArr['pending'][$projectId] : 0;
        echo $noOfTask . ', ';
    }
}
?>
                    ]
                },
                {
                    name: 'Completed',
                    data: [
<?php
if (!empty($projectList)) {
    foreach ($projectList as $projectId => $project) {
        $noOfTask = !empty($statusWiseProjectArr['completed'][$projectId]) ? $statusWiseProjectArr['completed'][$projectId] : 0;
        echo $noOfTask . ', ';
    }
}
?>
                    ]
                },
                {
                    name: 'In Progress',
                    data: [
<?php
if (!empty($projectList)) {
    foreach ($projectList as $projectId => $project) {
        $noOfTask = !empty($statusWiseProjectArr['In-Progress'][$projectId]) ? $statusWiseProjectArr['In-Progress'][$projectId] : 0;
        echo $noOfTask . ', ';
    }
}
?>]},
                {
                    name: 'Paused',
                    data: [
<?php
if (!empty($projectList)) {
    foreach ($projectList as $projectId => $project) {
        $noOfTask = !empty($statusWiseProjectArr['Paused'][$projectId]) ? $statusWiseProjectArr['Paused'][$projectId] : 0;
        echo $noOfTask . ', ';
    }
}
?>
                    ]
                }
            ],
//            series: [{
//
//                    data: [{
//
//                            x: 'Pending',
//                            y: [22, 45, 33]
//                        }, {
//                            x: 'In-Progress',
//                            y: 18
//                        }, {
//                            x: 'Completed',
//                            y: 13
//                        }, {
//                            x: 'Paused',
//                            y: 13
//                        }, {
//                            x: 'Cancelled',
//                            y: 13
//                        }]
//
//                }]
            xaxis: {
                categories: [
<?php
if (!empty($projectList)) {
    foreach ($projectList as $projectId => $project) {
        echo '"' . $project . '", ';
    }
}
?>
                ],
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>
@endsection
