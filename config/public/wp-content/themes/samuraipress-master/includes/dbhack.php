<?

/**
 * this is a hack which sets up the Db class to connect to our DB inside wordpress' header.
 * we have to do this without using DB_NAME, because that define has already been set by wordpress
 * by the time this code executes
 */
require_once(ABSPATH . 'samuraiEnv.php');
$user = getStagingUser();
$db_settings = get_db_settings($user);
$link = Db::connectOther(
	$db_settings['DB_HOST'], 
	$db_settings['DB_USER'], 
	$db_settings['DB_PASSWORD'],
	$db_settings['DB_NAME']
);

$oldLink = Db::switchConnection($link);

$user = Auth::getUser();
$realUser = Auth::getRealUser();

?>
