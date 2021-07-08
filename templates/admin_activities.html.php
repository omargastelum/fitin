<section id="body">
    <div class="container">
        <input type="hidden" name="type" id="type" value="activity">
        <h1>Groups</h1>
        <!-- 5/23/21 OG NEW - Display the number of groups calculated in the controller -->
        <p>Total groups created: <?=$totalActivities?>
        <!-- 5/23/21 OG NEW - If the total amount of groups is greater than 0, display the table -->
        <?php if ($totalActivities > 0): ?>
            <table class="table table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">Group</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Event Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- 5/23/21 OG NEW - For each group -->
                <?php foreach($activities as $activity): ?>
                    <!-- 5/23/21 OG NEW - If user has admin rights, display all groups else only show only those that they created -->
                    <?php if (($permissions > 2 || $loggedIn && $userId == $activity['userId'])): ?>
                        <tr>
                        <td scope="row"><?=$activity['id']?></td>
                        <td scope="row"><button id="deleteBtn-<?=$activity['id']?>" class="deleteBtn btn btn-danger btn-sm">Delete</button></td>
                        <td><div contenteditable="true" class="edit" id="name-<?=$activity['id']?>"><?=$activity['name']?></div></td>
                        <td><div contenteditable="true" class="edit" id="description-<?=$activity['id']?>"><?=$activity['description']?></div></th>
                        <td><div><?=$activity['group_name']?></div></th>
                        <td><div><?=$activity['creator']?></div></th>
                        <td><?=$activity['date']?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
            </table>
        <?php endif; ?>
        <!-- 5/23/21 OG NEW - if the user has author rights then display the create group button -->
        <?php if ($loggedIn && $permissions >= 2): ?>
            <div id="create-button-div" class="container">
                <a href="index.php?activity/create" id="create-group-button">Create an activity</a>
            </div>
        <?php endif; ?>
    </div>
</section>