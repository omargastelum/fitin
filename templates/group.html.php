<!-- ===================================================================
| YOUR GROUPS SECTION
=================================================================== -->
<section id="group">
    <div class="container">
        <div class="card card-large">
            <div class="container">
                <h1><?=$group['name']?></h1>
                <div class="group-info">
                    <p>Last activity: 8 days ago</p>
                    <p><?=$groupMemberCount?> Members</p>
                </div>
                <p class="description"><?=$group['description']?></p>
                <p>Group Administrator: <a href="profile.html"><?=$user['firstname']?> <?=$user['lastname']?></a></p>
                <?php if ($member): ?>
                    <button id="<?=$group['id']?>" value="Leave" class="btn btn-complementary btn-action">Leave</button>
                <?php else: ?>
                    <button id="<?=$group['id']?>" value="Join" class="btn btn-complementary btn-action">Join</button>
                <?php endif; ?>
            </div>
        </div>
        <div id="activities" class="card card-large">
            <div class="container">
                <h4>UPCOMING ACTIVITIES</h4>
                <div class="card card-flat card-wide">
                    <div class="row">
                        <img src="images/hero/bootcamp.jpg" alt="">
                        <div class="card-details">
                            <p class="card-heading">THURSDAY, JUNE 10 @ 4:00 PM</p>
                            <p><a href="activity.html">Cardio Focused Circuit</a></p>
                            <p>Olivedale Bootcamp - Upland CA</p>
                        </div>
                    </div>
                </div>
                <div class="card card-flat card-wide">
                    <div class="row">
                        <img src="images/hero/bootcamp.jpg" alt="">
                        <div class="card-details">
                            <p class="card-heading">THURSDAY, JUNE 10 @ 4:00 PM</p>
                            <p><a href="activity.html">Cardio Focused Circuit</a></p>
                            <p>Olivedale Bootcamp - Upland CA</p>
                        </div>
                    </div>
                </div>
                <div class="card card-flat card-wide">
                    <div class="row">
                        <img src="images/hero/bootcamp.jpg" alt="">
                        <div class="card-details">
                            <p class="card-heading">THURSDAY, JUNE 10 @ 4:00 PM</p>
                            <p><a href="activity.html">Cardio Focused Circuit</a></p>
                            <p>Olivedale Bootcamp - Upland CA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($groupMemberCount > 0): ?>
        <div id="members" class="card card-large">
            <div class="container">
                <h4>MEMBERS</h4>
                <div class="row">
                    <?php foreach ($groupMembers as $groupMember): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-flat">
                            <div class="row">
                                <img src="images/users/<?=$groupMember['image']?>" height="50px" width="50px" alt="">
                                <a href="profile.html"><?=$groupMember['firstname']?> <?=$groupMember['lastname']?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<script src="js/membership.js"></script>