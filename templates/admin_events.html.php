<section id="body">
    <div class="container">
        <input type="hidden" name="type" id="type" value="event">
        <h1>Events</h1>
        <!-- 5/23/21 OG NEW - Display the number of groups calculated in the controller -->
        <p>Total events created: <?=$totalEvents?>
        <!-- 5/23/21 OG NEW - if the user has author rights then display the create group button -->
        <?php if ($loggedIn && $permissions >= 2): ?>
            <div id="create-button-div" class="container">
                <a href="index.php?event/create" id="create-group-button">Create an event</a>
            </div>
        <?php endif; ?>
        <!-- 5/23/21 OG NEW - If the total amount of groups is greater than 0, display the table -->
        <?php if ($totalEvents > 0): ?>
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
                <?php foreach($events as $event): ?>
                    <!-- 5/23/21 OG NEW - If user has admin rights, display all groups else only show only those that they created -->
                    <?php if (($permissions > 2 || $loggedIn && $userId == $event['userId'])): ?>
                        <tr>
                        <td scope="row"><?=$event['id']?></td>
                        <td scope="row"><button id="deleteBtn-<?=$event['id']?>" class="deleteBtn btn btn-danger btn-sm">Delete</button></td>
                        <td><div contenteditable="true" class="edit" id="name-<?=$event['id']?>"><?=$event['name']?></div></td>
                        <td><div contenteditable="true" class="edit" id="description-<?=$event['id']?>"><?=$event['description']?></div></th>
                        <td><div><?=$event['group_name']?></div></th>
                        <td><div><?=$event['creator']?></div></th>
                        <td><?=$event['date']?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
            </table>
        <?php endif; ?>
    </div>
</section>