<?php
require './ressources/composants/templatePage.php';
?>

<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="note-add">

            <table class="text-left w-full border-collapse">
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom Prénom</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Matière</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Note</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($listeUser as $user) {
                ?>
                <tr class="hover:bg-grey-lighter">
                    <td class="p-4 w-1/4" value="<?php $user['Id'] ?>" id="users" name="users"><?php echo((isset($user['Last_name']) && $user['Last_name'] <> "" && $user['Last_name'] <> NULL) ? $user['Last_name'] : "") ?> <?php echo((isset($user['First_name']) && $user['First_name'] <> "" && $user['First_name'] <> NULL) ? $user['First_name'] : "-") ?>
                    </td>


                    <td class="p-4 w-1/4">
                        <select>
                            <?php
                            foreach ($listeClasses as $classes) {
                                ?>
                                <option value="<?php $classes['Id'] ?>" id="classes" name="classes"> <?php echo $classes['Matter'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>


                    <td class="py-4 px-6 border-b border-grey-light"> <input name="notes" id="notes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="note" type="text" placeholder="Saisir note"> </td>
                </tr>
                    <?php
                }
                ?>

                </tbody>

            </table>
            <div >
                <button type="submit" class="cursor-pointer bg-blue hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded">
                    Enregistrer
                </button>
                <button class="cursor-pointer bg-red-600 hover:bg-orange-200 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>