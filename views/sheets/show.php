<?php if(isset($statusDelete)){ ?>
    <?php if($statusDelete){ ?>
        <div class="col-sm-12 col-md-12">
            <div class="alert alert-info info-categorie" role="alert">La suppression de la fiche à bien été enregistrée.</div>
        </div>
        <div class="col-sm-12 col-md-12 pull-right">
            <div class="navbar-collapse navbar-actions">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="?controller=categorys&action=show&id=<?=$idCategory?>" id="indexsheet" name="indexsheet"  class="btn btn-info btn-action">Retour à la liste</a></li>
                </ul>
            </div>
        </div>
    <?php } ?>
<?php }else{ ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="alert alert-info info-categorie" role="alert">Fiche <?=$sheet->label; ?></div>
    </div>
    <div class="col-sm-12 col-md-12 pull-right">
        <div class="navbar-collapse navbar-actions">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="?controller=categorys&action=show&id=<?=$idCategory?>" id="indexsheet" name="indexsheet"  class="btn btn-info btn-action"><span class="icon icon-chevron-left" aria-hidden="true"></span> Retour à la liste</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?controller=sheets&action=create&id_sheet=<?=$sheet->id?>&id_category=<?=$idCategory?>" id="editsheet" name="editsheet"  class="btn btn-success btn-action"><span class="icon icon-pencil" aria-hidden="true"></span> Modifier</a></li>
                <li>&nbsp;</li>
                <li><a href="?controller=sheets&action=delete&id_sheet=<?=$sheet->id?>&id_category=<?=$idCategory?>" id="deletesheet" name="deletesheet"  class="btn btn-warning btn-action" data-confirm="Etes-vous sûr de vouloir supprimer cette fiche sur cette catégorie"><span class="icon icon-trash" aria-hidden="true"></span> Suppprimer</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row one-sheet">
    <div class="col-sm-offset-2 col-sm-8">
        <span class="description-sheet"><span class="icon icon-quote icon-3em" aria-hidden="true"></span> <?php echo nl2br($sheet->description); ?></span>
    </div>
</div>
<?php } ?>