<h2 class="mb-2 mt-2">Les emprunteurs</h2>
<div class="row mb-5">
    <div class="col-md-12">
        <div class="table-responsive">
            <!--start table-->
            <table id="table" class="table table-bordered table-hover mb-2">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Numéro de membre</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <!--get datas-->
                <?php foreach ($users as $user) : ?>

                    <tr>
                        <th><?php echo $user->getName(); ?></th>

                        <td>
                            <?php echo $user->getMemberID(); ?>

                        </td>
                        <td>
                            <?php echo $user->getEmail();?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-secondary mb-5" href="<?php echo $_SERVER["HTTP_REFERER"];?>">Retour</a>