<?php
    namespace Fitin\Controllers\Admin;

    use Ninja\DatabaseTable;
    use \Ninja\Authentication;

    class Group {
        public function __construct(DatabaseTable $groupsTable, DatabaseTable $usersTable, Authentication $authentication) {
            $this->groupsTable = $groupsTable;
            $this->usersTable = $usersTable;
            $this->authentication = $authentication;
        }

        public function list() {
            $result = $this->groupsTable->findAll();
    
            $groups = [];
            foreach ($result as $group) {
    
                $groups[] = [
                    'id' => $group['id'],
                    'name' => $group['name'],
                    'description' => $group['description'],
                    'street' => $group['street'],
                    'city' => $group['city'],
                    'state' => $group['state'],
                    'country' => $group['country'],
                    'zipcode' => $group['zipcode'],
                    'date' => $group['date']
                ];
    
            }
    
            $title = 'Groups';
    
            $totalGroups = $this->groupsTable->total();
    
            $user = $this->authentication->getUser();
    
            return ['template' => 'admin_groups.html.php', 
                    'title' => $title, 
                    'variables' => [
                            'totalGroups' => $totalGroups,
                            'groups' => $groups,
                            'userId' => $user['id'] ?? null,
                            'permissions' => $user['permissions'] ?? null,
                            'loggedIn' => $this->authentication->isLoggedIn()
                        ]
                    ];
        }

        public function showForm() {
            $user = $this->authentication->getUser();
            $title = 'Create Group';
            return ['template' => 'editgroup.html.php',
                    'title' => $title,
                    'variables' => [
                        'userId' => $user['id'] ?? null,
                        'permissions' => $user['permissions'] ?? null,
                        'loggedIn' => $this->authentication->isLoggedIn()
                    ]
            ];  
        }

        public function saveEdit() {
            $activeUser = $this->authentication->getUser();
    
            if (isset($_GET['id'])) {
                $group = $this->groupsTable->findById($_GET['id']);
    
                if ($group['userId'] != $activeUser['id']) {
                    return;
                }
            }
    
            $group = $_POST['group'];
            $group['date'] = new \DateTime();
            $group['userId'] = $activeUser['id'];
    
            $this->groupsTable->save($group);
            //header('location: /group/list'); 5/25/18 JG DEL1L  org
            header('location: index.php?admin/groups');  //5/25/18 JG NEW1L  
        }

        public function edit() {
            $updatedGroup = [
                'id' => $_POST['id'],
                $_POST['field'] => $_POST['value']
            ];
    
            $this->groupsTable->save($updatedGroup);
        }
    }