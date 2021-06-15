<!-- ===================================================================
| GROUPS MAP
=================================================================== -->
<section id="groups-map">
    <div class="container">
        <div class="title">
            <h3>Groups Map</h3>
        </div>
        <div class="search-groups">
            <form id="search-groups-form" class="form-inline">
                <label for="search-groups">Change location: </label>
                <input type="text" id="search-groups" placeholder="Enter address">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
        <div id="map"></div>
    </div>
</section>
<section id="your-groups-section" class="groups">
    <div class="container">
        <div class="title">
            <h3>Groups</h3>
        </div>
        <p>Your Groups: 2, All Groups: 30</p>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-small">
                    <div class="card-image"><img src="images/hero/meditation.jpg" alt=""></div>
                    <div class="card-details">
                        <div class="card-title">
                            <h4 class="card-title"><a href="group.html">Olivedale Meditation</a></h4>
                        </div>
                        <div class="card-info">
                            <p>Last activity: 8 days ago</p>
                            <p>10 Members</p>
                            <p hidden>meditation</p>
                            <p hidden>236 Sultana Ave</p>
                            <p>Upland CA</p>
                        </div>
                        <div class="card-description">
                            <p>A group for those intersted in Mindful Meditation.</p>
                        </div>
                    </div>
                    <div class="card-button active">
                        <a href="#">Leave</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-small">
                    <div class="card-image"><img src="images/hero/bootcamp.jpg" alt=""></div>
                    <div class="card-details">
                        <div class="card-title">
                            <h4 class="card-title"><a href="#">Red Hill Bootcamp</a></h4>
                        </div>
                        <div class="card-info">
                            <p>Last activity: 8 days ago</p>
                            <p>10 Members</p>
                            <p hidden>bootcamp</p>
                            <p hidden>7484 Vineyard Ave</p>
                            <p>Rancho Cucamonga CA</p>
                        </div>
                        <div class="card-description">
                            <p>A group for those intersted in Mindful Meditation.</p>
                        </div>
                    </div>
                    <div class="card-button active">
                        <a href="#">Leave</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-small">
                    <div class="card-image"><img src="images/hero/yoga.jpg" alt=""></div>
                    <div class="card-details">
                        <div class="card-title">
                            <h4 class="card-title"><a href="#">Memorial Yoga</a></h4>
                        </div>
                        <div class="card-info">
                            <p>Last activity: 8 days ago</p>
                            <p>10 Members</p>
                            <p hidden>yoga</p>
                            <p hidden>1072 N Grove Ave</p>
                            <p>Ontario CA</p>
                        </div>
                        <div class="card-description">
                            <p>A group for those intersted in Mindful Meditation.</p>
                        </div>
                    </div>
                    <div class="card-button">
                        <a href="#">Join</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-small">
                    <div class="card-image"><img src="images/hero/yoga.jpg" alt=""></div>
                    <div class="card-details">
                        <div class="card-title">
                            <h4 class="card-title"><a href="#">La Verne Yoga</a></h4>
                        </div>
                        <div class="card-info">
                            <p>Last activity: 8 days ago</p>
                            <p>10 Members</p>
                            <p hidden>yoga</p>
                            <p hidden>1950 3rd St</p>
                            <p><span class="address">La Verne CA</span></p>
                        </div>
                        <div class="card-description">
                            <p>A group for those intersted in Mindful Meditation.</p>
                        </div>
                    </div>
                    <div class="card-button">
                        <a href="#">Join</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
    </div>
</section>
