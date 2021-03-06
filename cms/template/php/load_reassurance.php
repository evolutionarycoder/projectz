<?php
    /**
     * Created by PhpStorm.
     * User: evolutionarycoder
     * Date: 2/4/16
     * Time: 5:02 PM
     */

    use Backend\Database\Tables\Reassurance;
    use Backend\Helpers\TableBuilder;


    $table   = new Reassurance();
    $data    = $table->readAll();
    $builder = new TableBuilder();
    if ($data !== false) {
        for ($i = 0; $i < count($data); $i++) {
            $decoded = clone $data[$i];
            $table->stripAndDecode($decoded);
            $table->strip($data[$i]);

            $current = $data[$i];
            $builder->buildCell($decoded->getReassure())->buildCell($decoded->getSynced());
            $builder->addActionAttrs("reassure", $current->getReassure())->addActionAttrs("id", $current->getId());
            $builder->addRowAttr("id", $current->getId());
            echo $builder->buildRow();
        }
    }

?>