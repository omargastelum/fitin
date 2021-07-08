<?php
    namespace Fitin\Controllers\Admin;

    use Ninja\DatabaseTable;
    use \Ninja\Authentication;

    class Activity {
        public function __construct(DatabaseTable $activitiesTable, DatabaseTable $groupsTable, DatabaseTable $usersTable, Authentication $authentication) {
            $this->activitiesTable = $activitiesTable;
            $this->groupsTable = $groupsTable;
            $this->usersTable = $usersTable;
            $this->authentication = $authentication;
        }

        public function list() {
            $results = $this->activitiesTable->findAll();
            $activeUser = $this->authentication->getUser();
            $totalActivities = 0;

            $activities = [];
            foreach ($results as $activity) {
                $group = $this->groupsTable->findById($activity['groupId']);
                $user = $this->usersTable->findById($group['userId']);


                $activities[] = [
                    'id' => $activity['id'],
                    'name' => $activity['name'],
                    'description' => $activity['description'],
                    'date' => $activity['date'],
                    'userId' => $activity['userId'],
                    'group_name' => $group['name'],
                    'creator' => $user['firstname'] .' '. $user['lastname']
                ];

                // 5/23/21 OG NEW - Count the activities that belong to the active user
                if ($activeUser['id'] == $activity['userId']) {
                    $totalActivities++;
                }
            }

            $title = 'Activities';

            if ($activeUser['permissions'] > 2) {
                $totalActivities = $this->activitiesTable->total();
            }

            return ['template' => 'admin_activities.html.php', 
                    'title' => $title, 
                    'variables' => [
                            'totalActivities' => $totalActivities,
                            'activities' => $activities,
                            'userId' => $activeUser['id'] ?? null,
                            'permissions' => $activeUser['permissions'] ?? null,
                            'loggedIn' => $this->authentication->isLoggedIn()
                        ]
                    ];
        }

        public function showForm() {
            $user = $this->authentication->getUser();

            $groups = $this->groupsTable->find('userId', $user['id']);

            $title = 'Create Activity';
            return ['template' => 'editactivity.html.php',
                    'title' => $title,
                    'variables' => [
                        'userId' => $user['id'] ?? null,
                        'groups' => $groups,
                        'permissions' => $user['permissions'] ?? null,
                        'loggedIn' => $this->authentication->isLoggedIn()
                    ]
            ];  
        }

        public function saveEdit() {
            $activeUser = $this->authentication->getUser();
    
            if (isset($_GET['id'])) {
                $activity = $this->activitiesTable->findById($_GET['id']);
    
                if ($activity['userId'] != $activeUser['id']) {
                    return;
                }
            }
    
            $activity = $_POST['activity'];
            $activity['date'] = $activity['date'] . ' ' . $activity['time'];
            unset($activity['time']);
            $activity['userId'] = $activeUser['id'];
    
            $this->activitiesTable->save($activity);
            //header('location: /group/list'); 5/25/18 JG DEL1L  org
            header('location: index.php?admin/activities');  //5/25/18 JG NEW1L  
        }

        public function edit() {
            $updated = [
                'id' => $_POST['id'],
                $_POST['field'] => $_POST['value']
            ];
    
            $this->activitiesTable->save($updated);
        }

        public function delete() {
            // 5/23/21 OG NEW - Get active user
            $activeUser = $this->authentication->getUser();
            // 5/23/21 OG NEW - Find the activity that needs to be deleted
            $activity = $this->activitiesTable->findById($_POST['id']);
            // 5/23/21 OG NEW - If the active user is not the creator and does not have rights then do not proceed to delete
            if ($activity['userId'] != $activeUser['id'] && $activeUser['permissions'] < 3) {
                return;
            }
            
            // 5/23/21 OG NEW - else delete the activity and redirect to admin activities page
            $this->activitiesTable->delete($_POST['id']);
            header('location: index.php?admin/activities');  // 5/25/18 JG NEW1L  		
        }
    }