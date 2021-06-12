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
		$this->membershipsTable = new \Ninja\DatabaseTable($pdo, 'membership', 'groupid');
		$this->authentication = new \Ninja\Authentication($this->usersTable, 'email', 'password');
    }

    public function getRoutes(): array {
		$homeController = new \Fitin\Controllers\Home();
		$adminHomeController = new \Fitin\Controllers\Admin\Home();
		$groupController = new \Fitin\Controllers\Group($this->groupsTable, $this->usersTable, $this->membershipsTable, $this->authentication);
		$userController = new \Fitin\Controllers\Register($this->usersTable, $this->groupsTable, $this->membershipsTable, $this->authentication);
		$loginController = new \Fitin\Controllers\Login($this->authentication);

		$routes = [
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
			'user/success' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'success'
				]
			],
			'group/save' => [
				'POST' => [
					'controller' => $groupController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $groupController,
					'action' => 'edit'
				],
				'login' => true
				
			],
			// 5/23/21 OG NEW - Admin create group route
			// 				  - POST and GET call the same controller and method
			'group/edit' => [
				'POST' => [
					'controller' => $groupController,
					'action' => 'edit'
				],
				'GET' => [
					'controller' => $groupController,
					'action' => 'edit'
				],
				'login' => true
				
			],
			// 5/23/21 OG MOD - changed from joke/delete to group/delete, and the controller to groupController
			'group/delete' => [
				'POST' => [
					'controller' => $groupController,
					'action' => 'delete'
				],
				'login' => true
			],
			'group/list' => [
				'GET' => [
					'controller' => $groupController,
					'action' => 'list'
				]
			],
			'login/error' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
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
			// 5/23/21 OG NEW - This is the GET route that displays the admin groups list
			//					Access requieres the user to be logged in
			'admin/groups' => [
				'GET' => [
					'controller' => $groupController,
					'action' => 'adminGroupList'
				],
				'login' => true
			],
			'admin/users' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'list'
				],
				'login' => true
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
					'controller' => $userController,
					'action' => 'edit'
				],
				'GET' => [
					'controller' => $userController,
					'action' => 'edit'
				],
				'login' => true
				
			],
			'user/delete' => [
				'POST' => [
					'controller' => $userController,
					'action' => 'delete'
				],
				'login' => true
			],
			'admin/profile' => [
				'GET' => [
					'controller' => $userController,
					'action' => 'profile'
				],
				'login' => true
			],
			'admin' => [
				'GET' => [
					'controller' => $adminHomeController,
					'action' => 'show'
				],
				'template' => 'admin_layout.html.php'
			],
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