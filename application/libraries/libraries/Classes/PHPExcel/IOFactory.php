<?php



/**	PHPExcel root directory */
if (!defined('PHPEXCEL_ROOT')) {

	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}

class PHPExcel_IOFactory
{
	private static $_searchLocations = array(
		array( 'type' => 'IWriter', 'path' => 'PHPExcel/Writer/{0}.php', 'class' => 'PHPExcel_Writer_{0}' ),
		array( 'type' => 'IReader', 'path' => 'PHPExcel/Reader/{0}.php', 'class' => 'PHPExcel_Reader_{0}' )
	);

	private static $_autoResolveClasses = array(
		'Excel2007',
		'Excel5',
		'Excel2003XML',
		'OOCalc',
		'SYLK',
		'Gnumeric',
		'CSV',
	);

    private function __construct() { }
	public static function getSearchLocations() {
		return self::$_searchLocations;
	}	//	function getSearchLocations()

	public static function setSearchLocations($value) {
		if (is_array($value)) {
			self::$_searchLocations = $value;
		} else {
			throw new Exception('Invalid parameter passed.');
		}
	}	//	function setSearchLocations()
	public static function addSearchLocation($type = '', $location = '', $classname = '') {
		self::$_searchLocations[] = array( 'type' => $type, 'path' => $location, 'class' => $classname );
	}	//	function addSearchLocation()

	public static function createWriter(PHPExcel $phpExcel, $writerType = '') {
		$searchType = 'IWriter';
		foreach (self::$_searchLocations as $searchLocation) {
			if ($searchLocation['type'] == $searchType) {
				$className = str_replace('{0}', $writerType, $searchLocation['class']);
				$classFile = str_replace('{0}', $writerType, $searchLocation['path']);

				$instance = new $className($phpExcel);
				if (!is_null($instance)) {
					return $instance;
				}
			}
		}

		throw new Exception("No $searchType found for type $writerType");
	}	//	function createWriter()
	public static function createReader($readerType = '') {
		$searchType = 'IReader';

		foreach (self::$_searchLocations as $searchLocation) {
			if ($searchLocation['type'] == $searchType) {
				$className = str_replace('{0}', $readerType, $searchLocation['class']);
				$classFile = str_replace('{0}', $readerType, $searchLocation['path']);

				$instance = new $className();
				if (!is_null($instance)) {
					return $instance;
				}
			}
		}

		// Nothing found...
		throw new Exception("No $searchType found for type $readerType");
	}	//	function createReader()

	
	public static function load($pFilename) {
		#echo $pFilename.'<br><br><br>';
		$reader = self::createReaderForFile($pFilename);
		return $reader->load($pFilename);
	}	
	public static function identify($pFilename) {
		$reader = self::createReaderForFile($pFilename);
		$className = get_class($reader);
		$classType = explode('_',$className);
		unset($reader);
		return array_pop($classType);
	}	//	function identify()


	public static function createReaderForFile($pFilename) {

		// First, lucky guess by inspecting file extension
		$pathinfo = pathinfo($pFilename);

		if (isset($pathinfo['extension'])) {
			switch (strtolower($pathinfo['extension'])) {
				case 'xlsx':
					$reader = self::createReader('Excel2007');
					break;
				case 'xls':
					$reader = self::createReader('Excel5');
					break;
				case 'ods':
					$reader = self::createReader('OOCalc');
					break;
				case 'slk':
					$reader = self::createReader('SYLK');
					break;
				case 'xml':
					$reader = self::createReader('Excel2003XML');
					break;
				case 'gnumeric':
					$reader = self::createReader('Gnumeric');
					break;
				case 'csv':
					// Do nothing
					// We must not try to use CSV reader since it loads
					// all files including Excel files etc.
					break;
				default:
					break;
			}

			// Let's see if we are lucky
			if (isset($reader) && $reader->canRead($pFilename)) {
				return $reader;
			}

		}

		// If we reach here then "lucky guess" didn't give any result

		// Try loading using self::$_autoResolveClasses
		foreach (self::$_autoResolveClasses as $autoResolveClass) {
			$reader = self::createReader($autoResolveClass);
			if ($reader->canRead($pFilename)) {
				return $reader;
			}
		}

	}	//	function createReaderForFile()
	
}
?>
