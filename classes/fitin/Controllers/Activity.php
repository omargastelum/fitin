<?php
    namespace Fitin\Controllers;

    use \Ninja\DatabaseTable;
    use \Ninja\Authentication;

    class Activity {
        public function __construct(DatabaseTable $activitiesTable, DatabaseTable $groupsTable, DatabaseTable $usersTable, DatabaseTable $eventUserTable, Authentication $authentication) {
            $this->activitiesTable = $activitiesTable;
            $this->groupsTable = $groupsTable;
            $this->usersTable = $usersTable;
            $this->eventUserTable = $eventUserTable;
            $this->authentication = $authentication;
        }

        public function show() {
            $activeUser = $this->authentication->getUser();
            $activity = $this->activitiesTable->findById($_GET['id']);
            $group = $this->groupsTable->findById($activity['groupId']);
            $date = date_create($activity['date']);
            $attendees = [];
            $attending = false;

            $activity['dayOfWeek'] = date_format($date, 'l');
            $activity['month'] = date_format($date, 'F');
            $activity['day'] = date_format($date, 'd');
            $activity['hour'] = date_format($date, 'g');
            $activity['minutes'] = date_format($date, 'i');
            $activity['meridiem'] = date_format($date, 'A');

            $eventAttendees = $this->eventUserTable->find('activityid', $activity['id']);

            foreach ($eventAttendees as $eventAttendee) {
                $attendee = $this->usersTable->findById($eventAttendee['userid']);
                $attendees[] = $attendee;

                if ($attendee['id'] == $activeUser['id']) {
                    $attending = true;
                }
            }

            return [
                'template' => 'activity.html.php',
                'title' => 'Activity',
                'variables' => [
                    'activity' => $activity,
                    'group' => $group,
                    'attendees' => $attendees,
                    'attending' => $attending
                ]
            ];
        }

        // 5/23/21 OG NEW - Joins a user to a group
        public function join() {
            // Get current active user
            $activeUser = $this->authentication->getUser();
            // Get the group id from the groups page
            $activity = $_POST['id'];

            // Set the memberships array that will build the relationship between the group and the user
            $eventUser['userid'] = $activeUser['id'];
            $eventUser['activityid'] = $activity;

            // save it and redirect to group list
            $this->eventUserTable->save($eventUser);

            

            echo header('location: index.php?group/list');
        }

        // 5/23/21 OG NEW - Removes the retalationship between the user and the group
        public function leave() {
            // Get current active user
            $activeUser = $this->authentication->getUser();

            // Get the group that was clicked on
            $activity = $this->activitiesTable->findById($_POST['id']);

            // Delete the relationship from the membership table and redirect to group list
            $this->eventUserTable->deleteFromLookup('activityid', 'userid', $activity['id'], $activeUser['id']);

            echo header('location: index.php?group/list');
        }
    }