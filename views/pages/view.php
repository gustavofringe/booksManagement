<h2 class="mt-3 mb-3">Detail du livre</h2>
<div class="card">
    <img class="card-img-top" src="<?php echo BASE_URL;?>/public/img/book.jpg" alt="Card image cap">
    <div class="card-block">
        <h3><?php echo $book->getTitle();?></h3>
        <p class="card-text"><?php echo substr($book->getResume(),0,1500);?></p>
        <p class="card-text">Date de parution: <?php echo date('d/m/Y', strtotime( $book->getReleaseDate()));?></p>
    </div>
</div>
<div class="check">
    <?php if($book->getAvailable()== true):?>
    <span>Non disponible</span>
    <?php else:?>
    <span>Disponible</span>
    <?php endif;?>
    <?php if($book->getName()):?>
    <span><?php echo $book->getName();?></span>
    <?php endif;?>
</div>