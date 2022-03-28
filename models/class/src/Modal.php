<?php
/**
 * Classe modal pour les soumissions de formulaire
 *                                    
 */
namespace App\src;

use App\src\Form;


class Modal
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}
    
    public function createModalForm(string $modal_header_color, string $modal_header_text, Form $form)
    {?>

        <div id=<?=$this->id?> class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header <?=$modal_header_color?>">
                        <h4 class="container text-white text-center"><?=$modal_header_text?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid"></div>
                        <?php
                            $form->showForm(
                                null,
                                "form-group"
                            );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php    
    }


    
}