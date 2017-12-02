<h2 class="mb-5 mt-5">Détail des emprunts</h2>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <!--start table-->
            <table id="table" class="table table-bordered table-hover mb-5">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Numéro de membre</th>
                    <th scope="col">Date d'emprunt</th>
                    <th scope="col">Titre du livre</th>
                </tr>
                </thead>
                <tbody>
                <!--get datas-->
                <?php foreach ($details as $detail) : ?>

                    <tr>
                        <th><?php echo $detail->getName(); ?></th>

                        <td>
                            <?php echo $detail->getMemberID(); ?>

                        </td>
                        <td>
                            <?php echo date('d/m/Y', strtotime( $detail->getDate()));?>
                        </td>
                        <td>
                            <?php echo $detail->getTitle(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<a class="btn btn-secondary" href="<?php echo $_SERVER["HTTP_REFERER"];?>">Retour</a>