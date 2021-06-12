<div class="container">
<?php if (empty($group['id']) || $userId == $group['userId'] || $permissions == 3): ?>
<form action="index.php?group/save" method="post">
	<input type="hidden" name="group[id]" value="<?=$group['id'] ?? ''?>">
    <div class="mb-3">
        <label for="name" class="form-label">Type your group here:</label>
        <textarea id="name" name="group[name]" rows="3" cols="40" class="form-control"><?=$group['name'] ?? ''?></textarea>
    </div>
    <input type="submit" name="submit" value="Save">
</form>
<?php else: ?>

<p>You may only edit groups that you posted.</p>

<?php endif; ?>
</div>