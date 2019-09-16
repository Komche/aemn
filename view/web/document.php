<?php 
    $title = "AEMN| Documentation";
    ob_start();
?>
<main>
    <div class="article">
        <div class="row">
            <div class="container">
                <h3 align="center">Documentation</h3>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="liste">
                            <thead>
                                <tr>
                                    <th width="15%">#</th>
                                    <th width="15%">Label</th>
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                    $datas = getDocument();
                                    foreach ($datas as $data)
                                    { ?>
                                        <tr>
                                            <td width="15%"><?php echo $data['id_folder'];?></td>
                                            <td width="15%"><?php echo $data['label'];?></td>
                                            <td width="10%">
                                                <a href="index.php?action=Print&id=<?php echo $data['id_folder'];?>" class="btn btn-success"><i class="fas fa-print"></i></a>
                                                <a href="index.php?action=Download&id=<?php echo $data['id_folder'];?>" class="btn btn-info"><i class="fas fa-download"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>                     
            </div>
        </div>
    </div>
</main>
<?php
    $content = ob_get_clean();
    require('template.php');
?>