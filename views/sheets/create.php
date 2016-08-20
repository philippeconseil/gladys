<div class="row">
    <div class="col-sm-12 col-md-12 pull-right">
        <div class="navbar-collapse navbar-actions">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?controller=categorys&action=index" id="home" name="home" class="btn btn-success btn-action"><span class="icon icon-chevron-left" aria-hidden="true"></span> Retour à l'accueil</a></li>
            </ul>
        </div>
    </div>


    <?php if (isset($validate)){ ?>
        <div class="col-sm-12 col-md-12 col-paddingtop">
            <?php if ($validate){ ?>
                <div class="alert alert-success" role="alert">Fiche enregistrée</div>
            <?php }else{ ?>
                <div class="alert alert-warning" role="alert">Veuillez renseigner le nom, description et la catégorie de la fiche</div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="col-sm-12 col-md-12">
    <form name="create_sheet" id="create_sheet" class="form-horizontal" action="?controller=sheets&action=validate" method="post">
        <fieldset>

            <legend>
                <?=(isset($sheet) ? 'Vous souhaitez modifier la fiche : '.$sheet->label.' ?' : 'Vous souhaitez créer une nouvelle fiche ?') ?>
            </legend>

            <input name="id" id="id" type="hidden" value="<?=(isset($sheet) ? $sheet->id : '') ?>">

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Libellé *</label>
                <div class="col-md-4">
                    <input name="name" id="name" placeholder="nom..." required="required" class="form-control input-md" type="text" value="<?=(isset($sheet) ? $sheet->label : '') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="description">Descriptif *</label>
                <div class="col-md-4">
                    <textarea class="form-control input-md" required="required" name="description" id="description" rows="5"  placeholder="descriptif..."><?=(isset($sheet) ? $sheet->description : '') ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="categorys">Sélectionner la ou les catégories pour cette fiche *<br /><span class="info-form">(Vous pouvez en sélectionner plusieurs en maintenant CTRL)</span></label>
                <div class="col-md-4">
                    <!--form-control input-md-->
                    <select class="form-control input-md select-category" required="required" name="categorys[]" id="categorys" multiple>
                        <?php foreach($categorys as $key => $category) { ?>
                            <?php
                            $selected = '';
                            if (isset($sheetsCategorys)){
                                if (array_key_exists($key, $sheetsCategorys)) {
                                    $selected = 'selected';
                                }
                            }
                            if (isset($id_category)){
                                if ($id_category == $key){
                                    $selected = 'selected';
                                }
                            }
                            ?>

                            <option <?=$selected?> value="<?= $key ?>"><?= $category; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id"  class="btn btn-success"><span class="icon icon-check" aria-hidden="true"></span> Enregistrer</button>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <span class="info-fields-form">Les champs suivient d'un * sont obligatoires.</span>
                </div>
            </div>

        </fieldset>
    </form>
    </div>
</div>