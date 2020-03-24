<?php
require './ressources/composants/templatePage.php';
?>
<div class="modal-add"></div>
<div class="container w-full mx-auto pt-20">
    <?php
        if ($_SESSION['Level'] == 2 || $_SESSION['Level'] == 3) {
            ?>
            <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
                <a href="note-add" name="form-note-add" class="modal-open cursor-pointer bg-orange-400 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded">
                    Ajouter notes
                </a>
            </div>
            <?php
        }
    ?>

    <div class="container mx-auto pt-10 sm:px-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Notes</h2>
        </div>
        <div class="py-5">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8  overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="text-left w-full">
                        <thead class="bg-blue flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <?php
                            if ($_SESSION['Level'] == 2 || $_SESSION['Level'] == 3) {
                                ?>
                                <th class="p-4 w-1/4">Nom & Prénom</th>
                                <?php
                            }
                            ?>
                            <th class="p-4 w-1/4">Classes</th>
                            <th class="p-4 w-1/4">Matière</th>
                            <th class="p-4 w-1/4">Note</th>
                            <?php
                                if ($_SESSION['Level'] == 2 || $_SESSION['Level'] == 3) {
                                    ?>
                                    <th class="p-4 w-1/4">Actions</th>
                                    <?php
                                }
                            ?>
                        </tr>
                        </thead>
                        <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                        <?php
                            foreach ($listeNotes as $note) {
                                ?>

                                <tr  <?php if ($note['Note'] < 8 ) { ?> class="bg-red-500 hover:bg-red-400 text-white flex w-full mb-4" <?php } elseif ($note['Note'] > 8 && $note['Note'] < 12) { ?> class="bg-orange-400 hover:bg-orange-300 text-white flex w-full mb-4" <?php } else { ?> class="flex hover:bg-gray-200 w-full mb-4" <?php } ?> >

                                    <?php
                                    if ($_SESSION['Level'] == 2 || $_SESSION['Level'] == 3) {
                                        ?>
                                        <td class="p-4 w-1/4"> <?php echo((isset($note['Last_name']) && $note['Last_name'] <> "" && $note['Last_name'] <> NULL) ? $note['Last_name'] : "") ?> <?php echo((isset($note['First_name']) && $note['First_name'] <> "" && $note['First_name'] <> NULL) ? $note['First_name'] : "-") ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td class="p-4 w-1/4"> <?php echo((isset($note['Name']) && $note['Name'] <> "" && $note['Name'] <> NULL) ? $note['Name'] : "-") ?></td>
                                    <td class="p-4 w-1/4"> <?php echo((isset($note['Matter']) && $note['Matter'] <> "" && $note['Matter'] <> NULL) ? $note['Matter'] : "-") ?></td>
                                    <?php
                                        if ($note['Note'] < 8 ) {
                                            ?>
                                            <td class="p-4 w-1/4"> D </td>
                                            <?php
                                        } elseif ($note['Note'] > 8 && $note['Note'] < 12) {
                                            ?>
                                            <td class="p-4 w-1/4"> C </td>
                                            <?php
                                        } elseif ($note['Note'] > 12 && $note['Note'] < 16) {
                                            ?>
                                            <td class="p-4 w-1/4"> B </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td class="p-4 w-1/4"> A </td>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                    if ($_SESSION['Level'] == 2 || $_SESSION['Level'] == 3) {
                                        ?>
                                        <td class="p-4 w-1/4">
                                            <a name="form-note-edit" id="" class="cursor-pointer bg-orange-400 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"> Edit </a>
                                            <a name="form-note-delete" id="" class="cursor-pointer bg-red-400 hover:bg-red-400 shadow-xl px-5 py-2 inline-block text-red-100 hover:text-white rounded"> Supprimer </a>
                                        </td>
                                        <?php
                                    }
                                    ?>
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


<script src="./ressources/js/notes.js"></script>