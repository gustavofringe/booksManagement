<h2 class="mt-5 text-center">Enregistrer un nouveau livre</h2>
<div class="row">
    <!--form create account-->
    <div class="col-md-12">
        <?php
        App\Form::open('mb-5');
        App\Form::input('title', 'Titre', ['classDiv' => 'form-group', 'class' => 'form-control']);
        App\Form::input('author', 'Auteur', ['classDiv' => 'form-group', 'class' => 'form-control']);

?>

        <label for="date">Date d'édition</label>
        <div class="form-group date input-group" id="datepicker" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            <input type="text" class="form-control" id="date" name="releaseDate" readonly>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
        <?php
        App\Form::input('categoryID', 'Choisissez votre compte', ['select' => 'form-control', 'classDiv' => 'form-group', 'class' => '', 'options' => [
            '1' => 'Roman',
            '2' => 'Policier',
            '3' => 'Bande-dessinée',
            '4' => 'Fantastique',
            '5' => 'Science-fiction'
        ]]);
        App\Form::input('resume', 'Résumé', ['classDiv' => 'form-group', 'type'=>'textarea','row'=>10,'col'=>10, 'class' => 'form-control']);

        App\Form::button(['type' => 'submit', 'class' => 'btn btn-primary mb-5', 'name' => 'Enregistrer']);
        App\Form::close();
        ?>
    </div>
</div>
