<?php
namespace Department;

require_once './User.php';

class Department {
	private User\User $user;

	public function __construct() {
		$this->user = new User\User(); // @todo fixme
	}

	public function setDb($db) {
		if (!$db || $db->isClosed()) {
			return false;
		}

		if ($db->debug) {
			$db->setGeneralLog('on');
			error_log($db);
		}

		if ($db->profiling) {
			$db->setSlowLog('on');
		}

		$this->db = $db;
	}
}
?>