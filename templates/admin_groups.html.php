<section id="body">
    <div class="container">
        <input type="hidden" name="type" id="type" value="group">
        <h1>Groups</h1>
        <!-- 5/23/21 OG NEW - Display the number of groups calculated in the controller -->
        <p>Total groups created: <?=$totalGroups?>
        <!-- 5/23/21 OG NEW - If the total amount of groups is greater than 0, display the table -->
        <?php if ($totalGroups > 0): ?>
            <table class="table table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Category</th>
                    <th scope="col">Street</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Zip Code</th>
                    <th scope="col">Date Created</th>
                </tr>
            </thead>
            <tbody>
                <!-- 5/23/21 OG NEW - For each group -->
                <?php foreach($groups as $group): ?>
                    <!-- 5/23/21 OG NEW - If user has admin rights, display all groups else only show only those that they created -->
                    <?php if (($permissions > 2 || $loggedIn && $userId == $group['userId'])): ?>
                        <tr>
                        <td scope="row"><?=$group['id']?></td>
                        <td scope="row"><button id="deleteBtn-<?=$group['id']?>" class="deleteBtn btn btn-danger btn-sm">Delete</button></td>
                        <td><div contenteditable="true" class="edit" id="name-<?=$group['id']?>"><?=$group['name']?></div></td>
                        <td><div contenteditable="true" class="edit" id="description-<?=$group['id']?>"><?=$group['description']?></div></th>
                        <td><div><?=$group['creator']?></div></th>
                        <td><div><?=$group['category']?></div></th>
                        <td><div contenteditable="true" class="edit" id="street-<?=$group['id']?>"><?=$group['street']?></div></th>
                        <td><div contenteditable="true" class="edit" id="city-<?=$group['id']?>"><?=$group['city']?></div></th>
                        <td><div contenteditable="true" class="edit" id="state-<?=$group['id']?>"><?=$group['state']?></div></th>
                        <td><div contenteditable="true" class="edit" id="country-<?=$group['id']?>"><?=$group['country']?></div></th>
                        <td><div contenteditable="true" class="edit" id="zipcode-<?=$group['id']?>"><?=$group['zipcode']?></div></th>
                        <td><?=$group['date']?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
            </table>
        <?php endif; ?>
        <!-- 5/23/21 OG NEW - if the user has author rights then display the create group button -->
        <?php if ($loggedIn && $permissions >= 2): ?>
            <div id="create-button-div" class="container">
                <a href="index.php?group/create" id="create-group-button">Create a Group</a>
            </div>
        <?php endif; ?>
    </div>
</section>
