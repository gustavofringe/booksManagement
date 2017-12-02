<h2>Emprunts</h2>

<!--card-->
<div class="card mb-5">
    <div class="card-header">
        Carte d'emprunt
    </div>
    <div class="card-block">
        <h3 class="card-title"><?php echo $book->getTitle();?></h3>
        <p class="card-text"><?php echo substr($book->getResume(),0,1000);?></p>
        <form action="" method="post" name="borrower" class="mt-5">
            <div class="form-group">
                <label for="select">Changer d'emprunteur: </label>
                <select id="select" class="custom-select" name="borrower" onchange="document.forms.borrower.submit();">
                    <option selected>Liste de emprunteurs</option>
                    <?php foreach ($borrowers as $borrower): ?>
                        <option value="<?php echo $borrower->getMemberID(); ?>"><?php echo $borrower->getName(); ?> / <?php echo $borrower->getMemberID();?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
        <form action="" method="post" class="mt-5">
            <span>Rendre le livre disponible: </span>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="available">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Disponible</span>
            </label>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>