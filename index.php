<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2013-12-01
 * Time: 下午3:19
 * 系统路由入口
 */

define('ROOT_PATH', dirname(__FILE__) . '/');
define('MODEL_PATH', ROOT_PATH . 'model/');
define('HANDLER_PATH', ROOT_PATH . 'handler/');
define('SMARTY_PATH', ROOT_PATH . 'framework/lib/smarty/libs/');
define('TEMPLATE_PATH', ROOT_PATH . 'template/');
define('TEMPLATE_C_PATH', ROOT_PATH . 'template_c/');
define('SMARTY_TEMPLATE_MODULE_PATH', TEMPLATE_PATH. 'lib/modules/');
define('SMARTY_PLUGINS_DIR', SMARTY_PATH . 'plugins/');
define('SMARTY_CONFIG_PATH', TEMPLATE_PATH . 'config/');
define('WIDGET_PATH', TEMPLATE_PATH. 'lib/widget/');

// request url
$request_url = $_SERVER['REQUEST_URI'];

// action的url映射规则
$action_config = array (
	// 联系我们
	'/^\/contact\.html/' => array (
   		'path' => HANDLER_PATH . 'ContactAction.class.php'
    ),
	// 钢琴知识
	'/^\/know(_[0-9]+)?\.html/' => array (
   		'path' => HANDLER_PATH . 'KnowAction.class.php'
    ),
	// 教学环境
	'/^\/env\.html/' => array (
   		'path' => HANDLER_PATH . 'EnvAction.class.php'
    ),
	// 获奖情况
    '/^\/prize\.html/' => array (
   		'path' => HANDLER_PATH . 'PrizeAction.class.php'
    ),
	// 师资力量
    '/^\/teacher\.html/' => array (
   		'path' => HANDLER_PATH . 'TeacherAction.class.php'
    ),
	// 学生风采
    '/^\/student\.html/' => array (
   		'path' => HANDLER_PATH . 'StudentAction.class.php'
    ),
	// 首页
    '/^\/?$/' => array (
	    'path' => HANDLER_PATH . 'AboutAction.class.php'
    )
);

// 跳转到404页面
function to404 () {
    require_once('/static/html/40x.html');
    header("HTTP/1.1 404 Not Found");
    header("Status: 404 Not Found");
    exit;
}

// 进行路由转发
$hasMatched = false;
foreach ($action_config as $key => $value) {
    if (preg_match($key, $request_url, $matches)) {
        // 导入BaseAction和url对应的php类文件
        include_by_path(HANDLER_PATH . 'BaseAction.class.php');
		// 导入依赖包
	    include_by_path(MODEL_PATH);
	    // 导入url映射的action类
	    include_by_path($value['path']);
		$tokens = explode('/', $value['path']);
		$classPath = $tokens[count($tokens)-1];
		$cls = substr($classPath, 0, strpos($classPath, '.'));
		$ins = new $cls();
        $ins->execute($matches);
	    $hasMatched = true;
        break;
    }
}
// 没有匹配到相应的action，路由到404页面
if ($hasMatched == false) {
    to404();
}

/**
 * 根据路径导入php文件
 * @name include_by_path
 * @function
 * @param   {string}   path   目录名
 */
function include_by_path ($path) {
    if (is_dir($path)) {
        if ($dh = opendir($path)) {
            while (false !== ($file = readdir($dh))) {
                if (file_exists($path. $file)) {
                    if (get_file_extend($file) == 'php') {
                        require_once($path . $file);
                    }
                } else {
                    echo "read from dir, $file is not exist!!!";
                }
            }
            closedir($dh);
        }
    } else {
        if (file_exists($path)) {
            require_once($path);
        } else {
            echo "read from file, $path is not exist!!!";
        }
    }
}
/**
 * 获得文件的后缀名
 * @name get_file_extend
 * @function
 * @param   {string}   file_name   文件名
 *
 * @returns {string}   extend   后缀名
 */
function get_file_extend ($file_name) {
    $extend = pathinfo($file_name);
    $extend = strtolower($extend["extension"]);
    return $extend;
}