
<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Quick Menu';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-4">
        <div class="white-box padding-20">
            <h3 class="box-title">Member Baru</h3>
            <ul class="list-inline two-part">
                <li><i class="fa fa-user text-purple"></i></li>
                <li class="text-right"><span class="counter"><?=$member?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-4">
        <div class="white-box padding-20">
            <h3 class="box-title">Video</h3>
            <ul class="list-inline two-part">
                <li><i class="fa fa-film text-success"></i></li>
                <li class="text-right"><span class="counter"><?=$totalvideo?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-4">
        <div class="white-box padding-20">
            <h3 class="box-title">Jumlah Tonton</h3>
            <ul class="list-inline two-part">
                <li><i class="fa fa-bell text-primary"></i></li>
                <li class="text-right"><span class="counter"><?=$totalview?></span></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-sm-12"><p>&nbsp;</p></div>
</div>
<!--
<div class="row">
    <div class="col-lg-6">
        <div class="white-box">
            <h3 class="box-title">Income</h3>
            <div>
                <canvas id="chart1" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="white-box">
            <h3 class="box-title">Traffic</h3>
            <div>
                <canvas id="chart2" height="250"></canvas>
            </div>
        </div>
    </div>
</div>
-->
<div class="row site-admin">

    <div class="col-lg-12 info-box">
        <h2 class="title-info mx-auto">
            <?= Html::encode($this->title) ?>
            <hr>
        </h2>



        <div class="row">

            <div class="col-lg-3 col-sm-12">
                <?= Html::a('<i class="fas fa-film"></i> Video Baru', ['video/create'], ['class' => 'btn-lg btn-primary']) ?>
            </div>
            <div class="col-lg-3 col-sm-12">
                <?= Html::a('<i class="fa fa-money" aria-hidden="true"></i> Payment', ['admin/listpo'], ['class' => 'btn-lg btn-primary']) ?>
            </div>
            <div class="col-lg-3 col-sm-12">
                <?= Html::a('<i class="fas fa-paperclip"></i> Kelas Baru', ['topcat/create'], ['class' => 'btn-lg btn-primary']) ?>
            </div>
            <div class="col-lg-3">
                <?= Html::a('<i class="fas fa-tasks"></i> Kategori Baru', ['category/create'], ['class' => 'btn-lg btn-primary']) ?>
            </div>

        </div> 
        <div class="row">
            <div class="col-lg-4 col-sm-12">&nbsp;</div>
        </div>




    </div>
</div>


<?php

$url=Url::to("@web/background/bg1.jpg");

$css= <<<CSS

.site-admin .btn-lg {
width:240px;
display: inline-block;
}
.site-admin .info-box {
background-image:  url("$url");
background-repeat:  repeat;
}


CSS;

$this->registerCss($css);

/*
$js= <<<JS
   var ctx1 = document.getElementById("chart2").getContext("2d");
    var data1 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Traffic In",
                fillColor: "rgba(243,24,24,0.9)",
                strokeColor: "rgba(243,24,24,0.9)",
                pointColor: "rgba(243,245,246,0.9)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(243,245,246,0.9)",
                data: [28, 11, 88, 19, 86, 27, 20]
            },
            {
                label: "Traffic Out",
                fillColor: "rgba(44,171,227,0.8)",
                strokeColor: "rgba(44,171,227,0.8)",
                pointColor: "rgba(44,171,227,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(44,171,227,1)",
                data: [0, 55, 20, 58, 20, 55, 40]
            }
            
        ]
    };
    
    var chart1 = new Chart(ctx1).Line(data1, {
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.005)",
        scaleGridLineWidth : 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        bezierCurve : true,
        bezierCurveTension : 0.4,
        pointDot : true,
        pointDotRadius : 4,
        pointDotStrokeWidth : 1,
        pointHitDetectionRadius : 2,
        datasetStroke : true,
		tooltipCornerRadius: 2,
        datasetStrokeWidth : 2,
        datasetFill : true,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });       

 var ctx2 = document.getElementById("chart1").getContext("2d");
    var data2 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(255,118,118,0.8)",
                strokeColor: "rgba(255,118,118,0.8)",
                highlightFill: "rgba(255,118,118,1)",
                highlightStroke: "rgba(255,118,118,1)",
                data: [10, 30, 80, 61, 26, 75, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(180,193,215,0.8)",
                strokeColor: "rgba(180,193,215,0.8)",
                highlightFill: "rgba(180,193,215,1)",
                highlightStroke: "rgba(180,193,215,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };
    
    var chart2 = new Chart(ctx2).Bar(data2, {
        scaleBeginAtZero : true,
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.005)",
        scaleGridLineWidth : 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke : true,
        barStrokeWidth : 0,
		tooltipCornerRadius: 2,
        barDatasetSpacing : 3,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
JS;
 * */
 
//$this->registerJsFile("@web/js/chart.min.js");
//$this->registerJs($js);

?>