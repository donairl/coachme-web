<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Video';
$xurl = '';
?>



<div class="page">
    <div class="row">
        <div class="col-lg-2">
            <div class="white-box menu-overlay">
                <?php if (count($model) > 0) { ?>
                    <h4 id="xtitle"><?= $deptname ?></h4>
                    <hr>
                    <h6>Sub Kategori</h6>
                    <div class="list-group">
                        <?php foreach ($model as $r) {
                            $xurl = Url::to(['site/product', 'catid' => $r->category_code]); ?>
                            <a href="#" data-url="<?= $xurl ?>" data-name="<?= $r->category_name ?>" class="list-group-item cat-list">
                                <?= $r->category_name ?>&nbsp;&nbsp;<span class="badge badge-info">
                                    <?= $r->countproduct ?></span></a>
                        <?php } ?>

                    </div>
                <?php
                } else {
                    echo "Tak ada Data";
                }
                ?>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="white-box overlay">
                <div class="row">
                    <div class="col-lg-8">

                        <hr>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="txtSearch" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-dark" type="button" id="btnGo">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
                <div id="product">
                </div>


            </div>


        </div>


    </div>

</div>

<?php
$vid_url = Url::to(['site/video', 'deptid' => $deptid]);

$js = <<<JS
   
  $('#product').load('$vid_url');

  $('.cat-list').click(
    function(){
      var xurl=$(this).data('url');
      var xname=$(this).data('name');
      $('#product').load(xurl);
      $('#xtitle').html(xname);
    }
  );

  $('#btnGo').click(
    function(){
      var xcari=$('#txtSearch').val();
      $('#product').load('$vid_url?search='+xcari);
      $('#xtitle').html('Pencarian "'+xcari+'"');

    }
  );

  $('body').on('click','.buythis',
      function(){
    var prdid=$(this).data('prdid');
    //alert(prdid);
    location.href=prdid;

  });

JS;

$this->registerJs($js);
?>