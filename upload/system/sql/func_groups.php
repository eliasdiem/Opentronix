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

function g_get_group($db, $gid)
{
	$q = "SELECT * FROM groups WHERE id='$gid' LIMIT 1";

	return $db->query($q, FALSE);
}

function g_get_nonpublic_groups($db)
{
	$q = 'SELECT id FROM groups WHERE is_public=0';

	return $db->query($q);
}

?>
