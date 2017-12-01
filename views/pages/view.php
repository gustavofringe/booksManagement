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
    <p class="btn btn-secondary">Non disponible</p>
    <?php else:?>
    <p class="btn btn-info">Disponible</p>
    <?php endif;?>
    <p><a class="btn btn-primary" href="<?php echo BASE_URL;?>/pages/detail/<?php echo $book->getBookID();?>">Détail des emprunts</a></p>
</div>