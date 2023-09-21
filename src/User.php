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

	public function getBiggerEmployessDepartment() 
	{
		$department = $this->db->q("SELECT COUNT(user) as total_users, department FROM user_department GROUP BY department ORDER BY total_users DESC LIMIT 1");

		return $department->row;
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