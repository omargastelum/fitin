<section id="body">
    <div class="container">
        <input type="hidden" name="type" id="type" value="user">
        <h1>Users</h1>
        <p>Total Users: <?=$totalUsers?>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Action</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Email</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td scope="row"><?=$user['id']?></td>
                            <td scope="row"><button id="deleteBtn-<?=$user['id']?>" class="deleteBtn btn btn-danger btn-sm">Delete</button></td>
                            <td><div contenteditable="true" class="edit" id="firstname-<?=$user['id']?>"><?=$user['firstname']?></div></td>
                            <td><div contenteditable="true" class="edit" id="lastname-<?=$user['id']?>"><?=$user['lastname']?></div></td>
                            <td><div contenteditable="true" class="edit" id="email-<?=$user['id']?>"><?=$user['email']?></div></td>
                            <td><div contenteditable="true" class="edit" id="zipcode-<?=$user['id']?>"><?=$user['zipcode']?></div></td>
                            <td><div contenteditable="true" class="edit" id="permissions-<?=$user['id']?>"><?=$user['permissions']?></div></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>