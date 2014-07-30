<?php

// This file contains all SQL that deals with groups.
//
// Note that the functions in this file all start with the prefix 'g_'.

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

function g_query_for_name($db, $name, $gid)
{
	$name = $db->escape($name);
	$q = <<<EOQ
		SELECT id FROM groups WHERE
		(groupname="$name" OR title="$name") AND id<>"$gid"
		LIMIT 1
EOQ;

	// do not return a result.
	$db->query($q);
}

function g_fetch_count($db, $not_in_groups)
{
	$q = 'SELECT COUNT(id) FROM groups WHERE 1 '.$not_in_groups;

	return $db->fetch_field($q);
}

function g_query_for_groups($db, $not_in_groups, $from, $num_groups)
{
	$q = <<<EOQ
		SELECT id FROM groups WHERE 1 $not_in_groups
		ORDER BY title ASC, id ASC
		LIMIT $from , $num_groups
EOQ;

	// do not return a result.
	$db->query($q);
}

?>
