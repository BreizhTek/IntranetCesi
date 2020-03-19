
<div class="bg-blue w-1/4 mr-12 p-12 rounded-lg">
    <form>

        <label class="text-white font-bold">Ajouter un utilisateur</label>
        <input type="email" class="mt-4" name="newMember">
        <input type="hidden" name="channel" value="<?= $channelId ?>">
        
    </form>

    <button id="addUserToChannel" class="mt-2">Ajouter</button>
</div>

<script>
    
    $('addUserToChannel').click(function () {
        
    })
    
</script>

