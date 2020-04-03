<?php $db = new \base\DataBase()?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php foreach($db->show(null, 'gallery', null, null) as $key => $images) :?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key?>" class=""></li>
        <?php endforeach;?>
    </ol>
    <div class="carousel-inner">
        <?php foreach($db->show(['name', 'path', 'signature'], 'gallery', null, null) as $images) :?>
        <div class="carousel-item">
            <img class="d-block w-100 sld-ctm" src="../../src/<?=$images['path'],$images['name']?>" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <a href="#find-tickets"><button class="btn btn-success bt-reg">Получить билеты</button></a>
                <h3 class="signature"><span><?=$images['signature']?></span></h3>
            </div>
        </div>

        <?php endforeach;?>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>