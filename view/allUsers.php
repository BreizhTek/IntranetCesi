<table>
<?php
    foreach ($row as $allUsers){
    ?>
        <tr>
            <td>
                <a href="user/<?php echo $allUsers['Id'] ?>">lien de modification</a>
            </td><td>
                <?php echo ((isset($allUsers['Id']) && $allUsers['Id'] <> "" && $allUsers['Id'] <> NULL) ? $allUsers['Id'] : "-" )?>
            </td><td>
                <?php echo ((isset($allUsers['Post']) && $allUsers['Post'] <> "" && $allUsers['Post'] <> NULL) ? $allUsers['Post'] : "-" )?>
            </td><td>
                <?php echo ((isset($allUsers['First_name']) && $allUsers['First_name'] <> "" && $allUsers['First_name'] <> NULL) ? $allUsers['First_name'] : "-" )?>
            </td><td>
                <?php echo ((isset($allUsers['Last_name']) && $allUsers['Last_name'] <> "" && $allUsers['Last_name'] <> NULL) ? $allUsers['Last_name'] : "-" )?>
            </td><td>
                <?php echo ((isset($allUsers['Phone']) && $allUsers['Phone'] <> "" && $allUsers['Phone'] <> NULL) ? $allUsers['Phone'] : "-" )?>
            </td><td>
                <?php echo ((isset($allUsers['Mail']) && $allUsers['Mail'] <> "" && $allUsers['Mail'] <> NULL) ? $allUsers['Mail'] : "-" )?>
            </td>
        </tr>
    <?php
    }
?>
</table>