<?php

// This file contains all SQL that deals with groups.

function g_get_groups_with_name($db, $name)
{
	$name = $db->escape($name);
	$q	= <<<EOQ
		SELECT id FROM groups WHERE
		groupname="$name" OR title="$name"
		LIMIT 1
EOQ;

	return $db->query($q, FALSE);
}

?>
