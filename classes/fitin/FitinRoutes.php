<?php
namespace Fitin;

class FitinRoutes implements \Ninja\Routes {
    private $usersTable;
    private $groupsTable;
    private $authentication;

    public function __construct() {
        include __DIR__ . '/../../includes/DatabaseConnection.php';

        $this->groupsTable = new \Ninja\DatabaseTable($pdo, 'group', 'id');
		$this->usersTable = new \Ninja\DatabaseTable($pdo, 'user', 'id');
		$this->activitiesTable = new \Ninja\DatabaseTable($pdo, 'activity', 'id');
		$this->membershipsTable = new \Ninja\DatabaseTable($pdo, 'membership', 'groupid');
		$this->categoriesTable = new \Ninja\DatabaseTable($pdo, 'category', 'id');
		$this->eventUserTable = new \Ninja\DatabaseTable($pdo, 'event_user', 'id');
		$this->authentication = new \Ninja\Authentication($this->usersTable, 'email', 'password');
    }

    public function getRoutes(): array {
		$homeController = new \Fitin\Controllers\Home();
		$adminHomeController = new \Fitin\Controllers\Admin\Home();
		$adminGroupController = new \Fitin\Controllers\Admin\Group($this->groupsTable, $this->usersTable, $this->authentication, $this->categoriesTable);
		$adminUserController = new \Fitin\Controllers\Admin\User($this->usersTable, $this->groupsTable, $this->authentication);
		$adminActivityController = new \Fitin\Controllers\Admin\Activity($this->activitiesTable, $this->groupsTable, $this->usersTable, $this->authentication);
		$groupController = new \Fitin\Controllers\Group($this->groupsTable, $this->usersTable, $this->membershipsTable, $this->categoriesTable, $this->activitiesTable, $this->authentication);
		$userController = new \Fitin\Controllers\Register($this->usersTable, $this->groupsTable, $this->membershipsTable, $this->authentication);
		$activityController = new \Fitin\Controllers\Activity($this->activitiesTable, $this->groupsTable, $this->usersTable, $this->eventUserTable, $this->authentication);
		$loginController = new \Fitin\Controllers\Login($this->authentication);

		$routes = [
			// ==========================================================================
			// REGISTER USER
			// ==========================================================================
			'user/register' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $userController,
					'action' => 'registerUser'
				],
				'template' => 'form_layout.html.php'
			],
			// 2021-06-15 OG NEW - **********NOT USED 
			'user/success' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'success'
				],
				'template' => 'registersuccess.html.php'
			],

			// ==========================================================================
			// ADMIN
			// ==========================================================================
			'admin' => [
				'GET' => [
					'controller' => $adminHomeController,
					'action' => 'show'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
			],

			// ==========================================================================
			// ADMIN - GROUPS
			// ==========================================================================
			// 5/23/21 OG NEW - This is the GET route that displays the admin groups list
			//					Access requieres the user to be logged in
			'admin/groups' => [
				'GET' => [
					'controller' => $adminGroupController,
					'action' => 'list'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
			],
			'group/create' => [
				'POST' => [
					'controller' => $adminGroupController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $adminGroupController,
					'action' => 'showForm'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
			],
			// 5/23/21 OG NEW - Admin create group route
			// 				  - POST and GET call the same controller and method
			'group/edit' => [
				'POST' => [
					'controller' => $adminGroupController,
					'action' => 'edit'
				],
				'GET' => [
					'controller' => $adminGroupController,
					'action' => 'edit'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
				
			],
			// 5/23/21 OG MOD - changed from joke/delete to group/delete, and the controller to groupController
			'group/delete' => [
				'POST' => [
					'controller' => $adminGroupController,
					'action' => 'delete'
				],
				'login' => true,
				'admin' => true
			],

			// ==========================================================================
			// ADMIN - USERS
			// ==========================================================================
			'admin/users' => [
				'GET' => [
					'controller' => $adminUserController,
					'action' => 'list'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
			],
			'user/save' => [
				'POST' => [
					'controller' => $userController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $userController,
					'action' => 'edit'
				],
				'login' => true
				
			],
			'user/edit' => [
				'POST' => [
					'controller' => $adminUserController,
					'action' => 'edit'
				],
				'GET' => [
					'controller' => $adminUserController,
					'action' => 'edit'
				],
				'login' => true
				
			],
			'user/delete' => [
				'POST' => [
					'controller' => $adminUserController,
					'action' => 'delete'
				],
				'login' => true,
				'admin' => true
			],
			
			// ==========================================================================
			// ADMIN - ACTIVITIES
			// ==========================================================================
			'admin/activities' => [
				'GET' => [
					'controller' => $adminActivityController,
					'action' => 'list'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
			],
			'activity/create' => [
				'POST' => [
					'controller' => $adminActivityController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $adminActivityController,
					'action' => 'showForm'
				],
				'template' => 'admin_layout.html.php',
				'login' => true,
				'admin' => true
			],
			'activity/edit' => [
				'POST' => [
					'controller' => $adminActivityController,
					'action' => 'edit'
				],
				'GET' => [
					'controller' => $adminActivityController,
					'action' => 'edit'
				],
				'login' => true,
				'admin' => true
			],
			'activity/delete' => [
				'POST' => [
					'controller' => $adminActivityController,
					'action' => 'delete'
				],
				'login' => true,
				'admin' => true
			],
			// ==========================================================================
			// LOGIN
			// ==========================================================================
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				],
				'template' => 'form_layout.html.php'
			],
			'login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginForm'
				],
				'POST' => [
					'controller' => $loginController,
					'action' => 'processLogin'
				],
				'template' => 'form_layout.html.php'
			],
			
			// ==========================================================================
			// MAIN - GROUPS
			// ==========================================================================
			// 2021-07-01 OG NEW - This is a get route that sets up the template but the rest of the content
			// 					   is provided via AJAX call in the map.js script.
			'group/list' => [
				'GET' => [
					'controller' => $groupController,
					'action' => 'list'
				],
				'template' => 'layout.html.php'
			],
			// 2021-07-01 OG NEW - This is a POST route that uses a zipcode parameter to get groups within
			// 					   that area. 
			'group/jsonlist' => [
				'POST' => [
					'controller' => $groupController,
					'action' => 'jsonlist'
				]
			],
			// 5/23/21 OG NEW - This is the POST route that creates the many-to-many relationship between
			// 					the user and the group. It calls the join method in the group controller.
			'group/join' => [
				'POST' => [
					'controller' => $groupController,
					'action' => 'join'
				],
				'login' => true
			],
			// 5/23/21 OG NEW - This is the POST route that breaks the many-to-many relationship between
			// 					the user and the group. It calls the leave method in the group controller.
			'group/leave' => [
				'POST' => [
					'controller' => $groupController,
					'action' => 'leave'
				],
				'login' => true
			],
			'group' => [
				'GET' => [
					'controller' => $groupController,
					'action' => 'show'
				],
				'template' => 'layout.html.php'
			],
			
			'admin/profile' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'profile'
				],
				'login' => true
			],
			// ==========================================================================
			// ACTIVITY
			// ==========================================================================
			'activity' => [
				'GET' => [
					'controller' => $activityController,
					'action' => 'show'
				],
				'template' => 'layout.html.php'
			],
			// 5/23/21 OG NEW - This is the POST route that creates the many-to-many relationship between
			// 					the user and the group. It calls the join method in the group controller.
			'activity/join' => [
				'POST' => [
					'controller' => $activityController,
					'action' => 'join'
				],
				'login' => true
			],
			// 5/23/21 OG NEW - This is the POST route that breaks the many-to-many relationship between
			// 					the user and the group. It calls the leave method in the group controller.
			'activity/leave' => [
				'POST' => [
					'controller' => $activityController,
					'action' => 'leave'
				],
				'login' => true
			],
			// ==========================================================================
			// STATIC PAGES
			// ==========================================================================
			'about' => [
				'GET' => [
					'controller' => $groupController,
					'action' => 'about'
				]
			],
			'' => [
				'GET' => [
					'controller' => $homeController,
					'action' => 'show'
				],
				'template' => 'layout.html.php'
			]
		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}
}