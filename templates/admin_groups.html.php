<div class="container">
<h1>Groups</h1>
<!-- 5/23/21 OG NEW - Display the number of groups calculated in the controller -->
<p>Total groups created: <?=$totalGroups?>
<!-- 5/23/21 OG NEW - If the total amount of groups is greater than 0, display the table -->
<?php if ($totalGroups > 0): ?>
    <table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Host</th>
            <th scope="col">Date Created</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- 5/23/21 OG NEW - For each group -->
        <?php foreach($groups as $group): ?>
            <!-- 5/23/21 OG NEW - If user has admin rights, display all groups else only show only those that they created -->
            <?php if (($permissions > 2 || $loggedIn && $userId == $group['userId'])): ?>
                <tr>
                <td><?=$group['id']?></td>
                <td><?=$group['name']?></td>
                <td><?=$group['firstname']?> <?=$group['lastname']?></th>
                <td><?=$group['date']?></td>
                <td class="td-buttons">
                    <!-- 5/23/21 OG NEW - Display the edit group button -->
                    <form action="index.php?group/edit?id=<?=$group['id']?>" method="post">
                        <input type="hidden" name="id" value="<?=$group['id']?>">
                        <input type="submit" value="Edit">
                    </form>
                    <!-- 5/23/21 OG NEW - Display the delete group button -->
                    <form action="index.php?group/delete" method="post">
                        <input type="hidden" name="id" value="<?=$group['id']?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php endif; ?>
<!-- 5/23/21 OG NEW - if the user has author rights then display the create group button -->
<?php if ($loggedIn && $permissions >= 2): ?>
  <div id="create-button-div" class="container">
    <a href="index.php?group/edit" id="create-group-button">Create a Group</a>
  </div>
<?php endif; ?>
</div>
