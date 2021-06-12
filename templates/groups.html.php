<section id="groups">
<div class="container">
<h2 class="center">Groups</h2>
<p class="center"><?=$totalGroups?> groups available.</p>

<div id="group-div" class="grid-container">
<?php foreach($groups as $group): ?>

  <div class="card text-center">
      <img src="images/hero/yoga.jpg" alt="A group of people working out" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?=htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8')?></h5>

        <p class="card-text">Hosted by: <a href="mailto:<?=htmlspecialchars($group['email'], ENT_QUOTES, 'UTF-8'); ?>" class="card-link">
                                <?=htmlspecialchars($group['firstname'] . ' ' . $group['lastname'], ENT_QUOTES,
                                  'UTF-8'); ?></a>
        since  
        <?php
        $date = new DateTime($group['date']);

        echo $date->format('jS F Y');
        ?></p>
        <p><span id="result<?=$group['id']?>"></span></p>
      </div> 
      <?php if ($loggedIn): ?>
        <?php if ($group['member'] == true): ?>
          <button value="Leave" class="btn btn-primary btn-success btn-block" id="<?=$group['id']?>">Leave</button>
        <?php else: ?>
          <button value="Join" class="btn btn-primary btn-block" id="<?=$group['id']?>">Join</button>
        <?php endif; ?>
    
      <?php else: ?>
        <a href="index.php?user/register" class="card-link">Signin or Register</a>
      <?php endif; ?>
    <!-- </div> -->
  </div>
<?php endforeach; ?>
</div>
<?php if ($loggedIn && $permissions >= 2): ?>
  <div id="create-button-div" class="container">
    <a href="index.php?group/edit" id="create-group-button">Create a Group</a>
  </div>
<?php endif; ?>
</div>
</section>
