<?php
/**
 * Plugin Name:     Fix on WP
 * Plugin URI:      https://github.com/edinaldohvieira/fix-on-wp
 * Description:     Adiciona ou modifica recursos em uma instalação do WordPress
 * Author:          Edinaldo H Vieira
 * Author URI:      https://github.com/edinaldohvieira
 * Text Domain:     fix-on-wp
 * Domain Path:     /languages
 * Version:         0.1.1
 * Referencia:      fix158235
 *
 * @package         Fix_On_Wp
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function fix158235_dir_to_array($directory, $recursive = true, $listDirs = false, $listFiles = true, $exclude = '') {
    $arrayItems = array();
    $skipByExclude = false;
    $handle = opendir($directory);
    if ($handle) {
        while (false !== ($file = readdir($handle))) {
        preg_match("/(^(([\.]){1,2})$|(\.(svn|git|md))|(Thumbs\.db|\.DS_STORE))$/iu", $file, $skip);
        if($exclude){
            preg_match($exclude, $file, $skipByExclude);
        }
        if (!$skip && !$skipByExclude) {
            if (is_dir($directory. DIRECTORY_SEPARATOR . $file)) {
                if($recursive) {
                    $arrayItems = array_merge($arrayItems, fix158235_dir_to_array($directory. DIRECTORY_SEPARATOR . $file, $recursive, $listDirs, $listFiles, $exclude));
                }
                if($listDirs){
                    $file = $directory . DIRECTORY_SEPARATOR . $file;
                    $arrayItems[] = $file;
                }
            } else {
                if($listFiles){
                    $file = $directory . DIRECTORY_SEPARATOR . $file;
                    $arrayItems[] = $file;
                }
            }
        }
    }
    closedir($handle);
    }
    return $arrayItems;
}

$path_modules = plugin_dir_path( __FILE__ )."add-in";
$dire = fix158235_dir_to_array($path_modules);
sort($dire);
foreach ($dire as $key => $value) {
	$extensao = substr($value, -4) ;
	if($extensao=='.php') require_once($value);;
}

function fix158235__file__(){
	return __FILE__;
}

function fix158235_plugin_file(){
	//return __FILE__.$path;
	return plugin_dir_path( __FILE__ );
}

/*
 * Plugin Update Checker
 * 
 * Note: If you're using the Composer autoloader, you don't need to explicitly require the library.
 * @link https://github.com/YahnisElsts/plugin-update-checker
 */

require_once 'plugin-update-checker-4.9/plugin-update-checker.php';

/*
 * Plugin Update Checker Setting
 *
 * @see https://github.com/YahnisElsts/plugin-update-checker for more details.
 */
function fix158235_update_checker_setting() {
	if ( ! is_admin() || ! class_exists( 'Puc_v4_Factory' ) ) {
		return;
	}

	$fixUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/edinaldohvieira/fix-on-wp/',
		__FILE__,
		'fix-on-wp'
	);
	
	// (Opcional) If you're using a private repository, specify the access token like this:
	//$fixUpdateChecker->setAuthentication('your-token-here');

	// (Opcional) Set the branch that contains the stable release.
	//$fixUpdateChecker->setBranch('stable-branch-name');
}

add_action( 'admin_init', 'fix158235_update_checker_setting' );