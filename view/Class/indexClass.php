<?php
require './ressources/composants/templatePage.php';
?>

<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Promos</h5>
                </div>
                <div class="p-5">
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Nom </th>
                            <th class="px-4 py-2">Etablissement</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listeClass as $class) {
                            ?>
                            <tr>
                                <td class="border px-4 py-2"> <?php echo $class['Name'] ?>  <?php echo $class['Y_begin'] ?>-<?php echo $class['Y_end'] ?></td>
                                <td class="border px-4 py-2"> <?php echo $class['etablishment'] ?></td>
                                <td class="border px-4 py-2"> <a href="note-add/<?php echo $class['Id'] ?>" class="cursor-pointer bg-orange-400 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"> Ajouter note </a>  </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full p-3">
            <!--Table Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Notes</h5>
                </div>
                <div class="p-5">
                    <table class="text-left w-full">
                        <thead class="bg-blue flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Nom & Prénom</th>
                            <th class="p-4 w-1/4">Classes</th>
                            <th class="p-4 w-1/4">Matière</th>
                            <th class="p-4 w-1/4">Note</th>
                            <th class="p-4 w-1/4">Actions</th>

                        </tr>
                        </thead>
                        <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                        <?php
                        foreach ($listeNotes as $note) {
                            ?>

                            <tr  <?php if ($note['Note'] < 8 ) { ?> class="bg-red-500 hover:bg-red-400 text-white flex w-full mb-4" <?php } elseif ($note['Note'] > 8 && $note['Note'] < 12) { ?> class="bg-orange-400 hover:bg-orange-300 text-white flex w-full mb-4" <?php } else { ?> class="flex hover:bg-gray-200 w-full mb-4" <?php } ?> >


                                <td class="p-4 w-1/4"> <?php echo((isset($note['Last_name']) && $note['Last_name'] <> "" && $note['Last_name'] <> NULL) ? $note['Last_name'] : "") ?> <?php echo((isset($note['First_name']) && $note['First_name'] <> "" && $note['First_name'] <> NULL) ? $note['First_name'] : "-") ?></td>

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

                                <td class="p-4 w-1/4">
                                    <a name="form-note-edit" id="" class="cursor-pointer bg-orange-400 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"> Edit </a>
                                    <a name="form-note-delete" id="" class="cursor-pointer bg-red-400 hover:bg-red-400 shadow-xl px-5 py-2 inline-block text-red-100 hover:text-white rounded"> Supprimer </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!--/table Card-->
        </div>


        <div class="w-full p-3">
            <!--Table Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Moyennes</h5>
                </div>
                <div class="p-5">
                    <table class="text-left w-full">
                        <thead class="bg-blue flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Nom & Prénom</th>
                            <th class="p-4 w-1/4">Classes</th>
                            <th class="p-4 w-1/4">Matière</th>
                            <th class="p-4 w-1/4">Note</th>
                            <th class="p-4 w-1/4">Actions</th>

                        </tr>
                        </thead>
                        <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 30vh;">
                        <?php
                        foreach ($listeAVG as $note) {
                            ?>

                            <tr  <?php if ($note['Note'] < 8 ) { ?> class="bg-red-500 hover:bg-red-400 text-white flex w-full mb-4" <?php } elseif ($note['Note'] > 8 && $note['Note'] < 12) { ?> class="bg-orange-400 hover:bg-orange-300 text-white flex w-full mb-4" <?php } else { ?> class="flex hover:bg-gray-200 w-full mb-4" <?php } ?> >


                                <td class="p-4 w-1/4"> <?php echo((isset($note['Last_name']) && $note['Last_name'] <> "" && $note['Last_name'] <> NULL) ? $note['Last_name'] : "") ?> <?php echo((isset($note['First_name']) && $note['First_name'] <> "" && $note['First_name'] <> NULL) ? $note['First_name'] : "-") ?></td>

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

                                <td class="p-4 w-1/4">
                                    <a name="form-note-show" id="" class="cursor-pointer bg-orange-400 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded"> Détails </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!--/table Card-->
        </div>



    </div>
</div>