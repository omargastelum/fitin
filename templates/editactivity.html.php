<section id="body">
    <div class="container">
        <h1>Activities</h1>
        <?php if (empty($group['id']) || $userId == $group['userId'] || $permissions == 3): ?>

            <form action="index.php?activity/create" method="post">
                <div class="form-group">
                    <label for="name">Activity Name</label>
                    <input type="text" class="form-control" id="name" name="activity[name]" placeholder="Enter activity name">
                </div>
                <div class="form-group">
                    <label for="desctiption">Description</label>
                    <textarea class="form-control" id="description" name="activity[description]" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Group</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="activity[groupId]">
                        <option>Choose a group:</option>
                        <?php foreach ($groups as $group): ?>
                            <option value="<?=$group['id']?>"><?=$group['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Activity Date:</label><br>
                    <input type="date" id="date" name="activity[date]">
                </div>
                <div class="form-group">
                    <label for="time">Activity Date:</label><br>
                    <input type="time" id="time" name="activity[time]">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <?php else: ?>

        <p>You may only edit groups that you posted.</p>

        <?php endif; ?>
    </div>
</section>