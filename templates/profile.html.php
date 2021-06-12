<div class="container">
<h1 class="center">Profile</h1>
    <div class="d-flex justify-content-center">
        <div class="card text-center" style="width: 18rem;">
            <?php if ($user['gender'] == 1): ?>
                <img src="images/thumbnails/female_avatar.png" class="card-img-top">
            <?php else: ?>
                <img src="images/thumbnails/male_avatar.png" class="card-img-top">
            <?php endif; ?>
            <div class="card-body">
                
                <h5 class="card-title"><?=$user['firstname']?> <?=$user['lastname']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?=$user['email']?></h6>
                <p><a href="index.php?user/edit?id=<?=$user['id']?>" class="card-link">Edit</a></p>
                
                
            </div>
            <div class="card-header">
                Groups
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($groups as $group): ?>
                    <li class="list-group-item"><?=$group['name']?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>