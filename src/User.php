<?php
namespace User;

class User {
	private $db;

	public function getUsersByIds($ids) {
		$users = [];

		$ids = implode(',', $ids);

		$users = $this->db->q("SELECT username FROM user WHERE id IN ($ids)");

		return $users;
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