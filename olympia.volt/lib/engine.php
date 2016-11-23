<?

namespace Olympia\Volt;

use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\DI;
use Bitrix\Main\Event;
use Bitrix\Main\EventManager;

class Engine 
{
	static $_view = null;

	static function initialize ()
	{
		global $arCustomTemplateEngines;

		$arCustomTemplateEngines["volt"] = [
			"templateExt" => ["volt"],
			"function"    => "renderVoltTemplate"
		];

		$di = new DI\FactoryDefault();

		self::$_view = new \Phalcon\Mvc\View\Simple();
		self::$_view->setDi($di);
		self::$_view->setViewsDir($_SERVER['DOCUMENT_ROOT']);

		$volt = new Volt(self::$_view, $di);

		if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/bitrix/cache/volt'))
			mkdir($_SERVER['DOCUMENT_ROOT'].'/bitrix/cache/volt');

		$volt->setOptions([
			'compiledPath'		=> $_SERVER['DOCUMENT_ROOT'].'/bitrix/cache/volt/',
			'compiledSeparator'	=> '-',
			'compiledExtension'	=> '.cache',
			'compileAlways'		=> true
		]);

		$event = new Event('olympia.volt', 'afterEngineRegister', ['volt' => $volt]);
		$event->send();

		self::$_view->registerEngines(['.volt' => $volt]);
	}
}
