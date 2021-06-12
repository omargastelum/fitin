<div class="container">
<h1>Users</h1>
<p>Total users created: <?=$totalUsers?>
<table class="table table-sm table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Permissions</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <td><?=$user['id']?></td>
      <td><?=$user['firstname']?></td>
      <td><?=$user['lastname']?></td>
      <td><?=$user['email']?></td>
      <td><?=$user['permissions']?></td>
      <td class="td-buttons">
        <form action="index.php?user/edit?id=<?=$user['id']?>" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <input type="submit" value="Edit">
        </form>
        <form action="index.php?user/delete" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>