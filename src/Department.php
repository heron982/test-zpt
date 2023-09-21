<?php
namespace Department;

require_once './User.php';

use User;

class Department {
	private User\User $user;

	public function __construct() {
		$this->user = new User\User(); // Foi corrigido após inserir o namespace User no namespace Department. Estava sem o namespace User incluído.
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