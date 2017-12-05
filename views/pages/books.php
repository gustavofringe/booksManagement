<h2 class="mt-3 mb-3">Les livres</h2>
<!--cards books-->
<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 card-content" id="card">
            <div class="card" style="width: 20rem;height:35rem">
                <img class="card-img-top" src="<?php echo BASE_URL; ?>/public/img/book.jpg" alt="livre">
                <div class="card-block" id="card-block">
                    <h4 class="card-title"><?php echo $book->getTitle(); ?></h4>
                    <p>categorie: <?php echo $book->getName(); ?></p>
                    <p class="card-text"><?php echo substr($book->getResume(), 0, 200); ?>...</p>
                </div>
                    <div class="card-block mb-5" id="card-bottom">
                        <a href="<?php echo BASE_URL;?>/pages/view/<?php echo $book->getBookID();?>" class="btn btn-primary">Lire la suite</a>
                        <a href="<?php echo BASE_URL;?>/posts/edit/<?php echo $book->getBookID();?>" class="btn btn-primary">Emprunts</a>
                        <p>
                            <?php if ($book->getAvailable() == false): ?>
                        <p class="btn btn-danger"> Non disponible</p>
                        <?php else: ?>
                            <p class="btn btn-success">Disponible</p>
                        <?php endif; ?>
                        </p>
                    </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php if(!isset($_POST['category'])):?>
    <!--pagination-->
<nav class="mb-5" aria-label="...">
    <ul class="pagination pagination-sm">
            <?php for ($i=1;$i<=$nbPage;$i++):?>
        <li class="page-item">
        <a class="page-link" href="<?php echo BASE_URL;?>/pages/books/<?php echo $i;?>"><?php echo $i;?></a>
        </li>
            <?php endfor;?>
    </ul>
</nav>
<?php endif;?>

<div class="pagination mb-5">

</div>