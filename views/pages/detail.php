<h2 class="mb-5 mt-5">Détail des emprunts</h2>
<!--detail borrowers-->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <!--start table-->
            <table id="table" class="table table-bordered table-hover mb-5">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Numéro de membre</th>
                    <th>Date d'emprunt</th>
                    <th>Titre du livre</th>
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
    <!--go back-->
<a class="btn btn-secondary" href="<?php echo $_SERVER["HTTP_REFERER"];?>">Retour</a>