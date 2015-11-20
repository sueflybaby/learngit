	<?php

	$sql_update = "UPDATE personalinformation_records SET `check` = '{$_GET['value']}' WHERE `id` = {$_GET["id"]}";

	$mysql = new SaeMysql();

	$do = $mysql->runSql($sql_update);

	echo '<script language="javascript">

    				 window.location.href="admin.php";
			</script>';

	$mysql->closeDb();
