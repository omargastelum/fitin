<!-- ===================================================================
        | YOUR GROUPS SECTION
        =================================================================== -->
        <section id="profile">
            <div class="container">
                
                <div class="card card-large">
                    <div class="container">
                        <img src="images/hero/bootcamp.jpg" height="100px" width="100px" alt="">
                        <h1><?=$activity['name']?> | <?=$group['name']?></h1>
                        <div class="card-details">
                            <p><?=strtoupper($activity['dayOfWeek'])?>, <?=strtoupper($activity['month'])?> <?=strtoupper($activity['day'])?> @ <?=$activity['hour']?>:<?=$activity['minutes']?> <?=$activity['meridiem']?></p>
                        </div>
                        <div class="card-description">
                            <h4>ACTIVITY</h4>
                            <p><?=$activity['description']?></p>
                        </div>
                        <?php if ($attending): ?>
                            <button id="<?=$activity['id']?>" value="Leave" class="btn btn-complementary btn-action">Leave</button>
                        <?php else: ?>
                            <button id="<?=$activity['id']?>" value="Join" class="btn btn-complementary btn-action">Join</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="members" class="card card-large">
                    <div class="container">
                        <h4>GOING</h4>
                        <div class="row">
                            <?php foreach($attendees as $attendee): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card card-flat">
                                        <div class="row">
                                            <img src="images/users/<?=$attendee['image']?>" height="50px" width="50px" alt="">
                                            <a href="profile.html"><?=$attendee['firstname']?> <?=$attendee['lastname']?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/eventUser.js"></script>