<?php

$_config = array();

// ----------------------------  CONFIG DB  ------------------------------- //
// ----------------------------  数据库相关设置---------------------------- //

/**
 * 数据库主服务器设置, 支持多组服务器设置, 当设置多组服务器时, 则会根据分布式策略使用某个服务器
 * @example
 * $_config['db']['1']['dbhost'] = 'localhost'; // 服务器地址
 * $_config['db']['1']['dbuser'] = 'root'; // 用户
 * $_config['db']['1']['dbpw'] = 'root';// 密码
 * $_config['db']['1']['dbcharset'] = 'gbk';// 字符集
 * $_config['db']['1']['pconnect'] = '0';// 是否持续连接
 * $_config['db']['1']['dbname'] = 'x1';// 数据库
 * $_config['db']['1']['tablepre'] = 'pre_';// 表名前缀
 *
 * $_config['db']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
$_config['db'][1]['dbhost']  		= 'localhost';		// 服务器地址
$_config['db'][1]['dbuser']  		= 'sql';		// 用户
$_config['db'][1]['dbpw'] 	 	= 'discuzexp2012';		// 密码
$_config['db'][1]['dbcharset'] 		= 'utf8';		// 字符集
$_config['db'][1]['pconnect'] 		= 0;			// 是否持续连接
$_config['db'][1]['dbname']  		= 'sql_conn';		// 数据库
$_config['db'][1]['tablepre'] 		= 'conn_';		// 表名前缀

/**
 * 数据库从服务器设置( slave, 只读 ), 支持多组服务器设置, 当设置多组服务器时, 系统每次随机使用
 * @example
 * $_config['db']['slave']['1']['dbhost'] = 'localhost';
 * $_config['db']['slave']['1']['dbuser'] = 'root';
 * $_config['db']['slave']['1']['dbpw'] = 'root';
 * $_config['db']['slave']['1']['dbcharset'] = 'gbk';
 * $_config['db']['slave']['1']['pconnect'] = '0';
 * $_config['db']['slave']['1']['dbname'] = 'x1';
 * $_config['db']['slave']['1']['tablepre'] = 'pre_';
 *
 * $_config['db']['slave']['2']['dbhost'] = 'localhost';
 * ...
 * 
 */
$_config['db']['slave'] = array();

/**
 * 数据库 分布部署策略设置
 *
 * @example 将 common_member 部署到第二服务器, common_session 部署在第三服务器, 则设置为
 * $_config['db']['map']['common_member'] = 2;
 * $_config['db']['map']['common_session'] = 3;
 *
 * 对于没有明确声明服务器的表, 则一律默认部署在第一服务器上
 *
 */
$_config['db']['map'] = array();

/**
 * 数据库 公共设置, 此类设置通常对针对每个部署的服务器
 */
$_config['db']['common'] = array();

/**
 *  禁用从数据库的数据表, 表名字之间使用逗号分割
 *
 * @example common_session, common_member 这两个表仅从主服务器读写, 不使用从服务器
 * $_config['db']['common']['slave_except_table'] = 'common_session, common_member';
 *
 */
$_config['db']['common']['slave_except_table'] = '';

// 服务器相关设置
$_config['server']['id']		= 1;			// 服务器编号，多webserver的时候，用于标识当前服务器的ID

// 页面输出设置
$_config['output']['charset'] 			= 'UTF-8';	// 页面字符集
$_config['output']['forceheader']		= 1;		// 强制输出页面字符集，用于避免某些环境乱码
$_config['output']['gzip'] 			= 1;		// 是否采用 Gzip 压缩输出
$_config['output']['language'] 			= 'zh_cn';	// 页面语言 zh_cn/zh_tw/en
$_config['output']['staticurl'] 		= '/';	// 站点静态文件路径，“/”结尾
$_config['output']['ajaxvalidate']		= 0;		// 是否严格验证 Ajax 页面的真实性 0=关闭，1=打开
$_config['output']['tplrefresh'] = 1;

// COOKIE 设置
$_config['cookie']['cookiepre'] 		= 'conn_'; 	// COOKIE前缀
$_config['cookie']['cookiedomain'] 		= ''; 		// COOKIE作用域
$_config['cookie']['cookiepath'] 		= '/'; 		// COOKIE作用路径

// 站点安全设置
$_config['security']['authkey']			= '968B6CDC1A';	// 站点加密密钥
$_config['security']['urlxssdefend']		= true;		// 自身 URL XSS 防御
$_config['security']['attackevasive']		= 0;		// CC 攻击防御 1|2|4|8
$_config['security']['allowedentrance'] = 'index.php';//允许的入口文件名，可用数组定义。字符串表示时若有多个请用英文半角逗号隔开

$_config['security']['querysafe']['status']	= 1;		// 是否开启SQL安全检测，可自动预防SQL注入攻击
$_config['security']['querysafe']['dfunction']	= array('load_file','hex','substring','if','ord','char');
$_config['security']['querysafe']['daction']	= array('@','intooutfile','intodumpfile','unionselect','(select', 'unionall', 'uniondistinct');
$_config['security']['querysafe']['dnote']	= array('/*','*/','#','--','"');
$_config['security']['querysafe']['dlikehex']	= 1;
$_config['security']['querysafe']['afullnote']	= 0;

$_config['admincp']['admins']			= '1,11';		// 设置允许登录后台的用户
														// 只能使用UID，多个创始人之间请使用英文半角逗号",”分开;
// DEBUG 模式设置
$_config['debug'] = 3;	// 1: 开启普通 DEBUG 模式
												// 2: 错误级别 E_ALL
												// 3: 错误级别 E_ALL(除E_NOTICE)
												// 4: 错误级别 E_ERROR
												// 字符串: 当且仅当 $_GET, $_POST 等 REQUEST 对象中的 debug==字符串 时启用 DEBUG 模式

$_config['trace_disabled'] = array('seccode');//强制禁用调试的ACTION

// UCenter 接口信息设置
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost:6033');
define('UC_DBUSER', 'sql');
define('UC_DBPW', 'discuzexp2012');
define('UC_DBNAME', 'sql_uc');
define('UC_DBCHARSET', 'gbk');
define('UC_DBTABLEPRE', '`sql_uc`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '5143Z0JOVPuaLjnV6ooD3M3ehOmStAJ15hlEYpk');
define('UC_API', 'http://192.168.1.100/uc');
define('UC_CHARSET', 'gbk');
define('UC_IP', '');
define('UC_APPID', '9');
define('UC_PPP', '20');
