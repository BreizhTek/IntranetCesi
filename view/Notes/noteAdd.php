<?php
require './ressources/composants/templatePage.php';
?>

<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="note-add">

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="IdUsers"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Nom & Prenom : </label>
                    <select>
                        <?php
                        foreach ($listeUser as $user) {
                            ?>
                            <option value="<?php $user['Id'] ?>" id="IdClasses" name="users"><?php echo((isset($user['Last_name']) && $user['Last_name'] <> "" && $user['Last_name'] <> NULL) ? $user['Last_name'] : "") ?> <?php echo((isset($user['First_name']) && $user['First_name'] <> "" && $user['First_name'] <> NULL) ? $user['First_name'] : "-") ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="IdClasses"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Cours : </label>
                    <select>
                        <?php
                        foreach ($listeClasses as $classes) {
                            ?>
                            <option value="<?php $classes['Id'] ?>" id="IdClasses" name="classes"> <?php echo $classes['Matter'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="IdNotes"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Note : </label>
                    <input name="notes" id="IdNotes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="note" type="text" placeholder="Saisir note">
                </div>
            </div>



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