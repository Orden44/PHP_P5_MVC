<?php
    /**
     * Template pour afficher une page admin avec les commentaires que l'on peut supprimer
     */
?>

<h2><?= $title ?></h2>

<div class="adminArticle">
    <table class="articleTable">
        <thead>
            <tr class="tableLine">
                <?php for ($i = 0; $i < count($columns); $i++) {    
                    // On affiche une flèche en haut ou en bas si la colonne est celle qui est triée
                    // ou deux flèches par défaut     
                    if ($columns[$i] == $sortColumn) {
                        $iconClass = $sortOrderQuery == 'ASC' ? 'fa-sort-up' : 'fa-sort-down';
                    } else {
                        $iconClass = 'fa-sort';
                    } ?>
                    <th>
                        <a href="index.php?action=commentsPage&column=<?= $columns[$i] ?>&order=<?= $sortOrderUrl?>">
                            <span><?= $columnTitles[$i] ?></span>
                            <i class="fa-solid <?= $iconClass ?>"></i>
                        </a>
                    </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentsSorted as $index => $comment) { ?>
                <tr class="tableLine">
                    <td class="title"><?= $comment->getTitle() ?></td>
                    <td><?= $comment->getPseudo() ?></td>
                    <td><?= $comment->getContent() ?></td>                    
                    <td><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></td>
                </tr>
            <?php } ?>        
        </tbody>
    </table>
</div>