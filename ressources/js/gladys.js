/**
 * Created by Phil&Gaelle on 18/08/2016.
 */

$(document).ready(function(){
    /**
     * reorder categorys
     */
    $("#list-categorys").sortable({ // initialisation de Sortable sur #list-photos
        placeholder: 'highlight', // classe à ajouter à l'élément fantome
        update: function() {  // callback quand l'ordre de la liste est changé
            var order = $('#list-categorys').sortable('serialize'); // récupération des données à envoyer
            $.post('?controller=categorys&action=validateorder',order); // appel ajax au fichier ajax.php avec l'ordre des photos
        }
    });
    $("#list-categorys").disableSelection(); // on désactive la possibilité au navigateur de faire des sélections

    /**
     * open popup to cnfirm delete
     */
    $(function() {
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');

            if (!$('#dataConfirmModal').length) {
                $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Merci de confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
            }
            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show:true});

            return false;
        });
    });

    $('select').select2();

});
