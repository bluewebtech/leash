<?php

/*
	Example: 
	PHP Code:
	$data1 = array(
		'Oct' => 5, 
		'Nov' => 10, 
		'Dec' => 46, 
		'Jan' => 61, 
		'Feb' => 9, 
		'Mar' => 22, 
		'Apr' => 31, 
		'May' => 36, 
		'Jun' => 14, 
		'Jul' => 56, 
		'Aug' => 70, 
		'Sep' => 1
	);

	$bar = array(
		'type' => 'bar', 
		'data' => $data, 
		'width' => 800, 
		'height' => 300, 
		'title' => 'Stuff Totals', 
		'titleColor' => '#E02900', 
		'titleAlign' => 'left', 
		'gradient' => array('#DE8100', '#FF9500'), 
		'borderColor' => '#E02900', 
		'legend' => true, 
		'legendTitle' => 'FY-13', 
		'textColor' => '#E02900'
	);
	$image = chart($bar);
	
	HTML Code:
	<img src="<?php $image ?>" />
*/

class Chart {

	public $params;

	public function __construct( $params ) {
		$this->params = $params;
	}

	public function chartTypes() {
		$types = array( 'bar', 'line', 'stacked', 'pie' );
		return $types;
	}

	public function chartType() {
		if( array_key_exists( 'type', $this->params ) ) {

			if( strlen( $this->params[ 'type' ] ) > 0 )  {
			
				if( in_array($this->params['type'], $this->chartTypes() ) ) {
					return $this->params['type'];
				} else {
					echo 'Chart type (' . $this->params['type'] . ') not supported';
					return false;
				}

			} else {
				echo 'Chart type defined but no type provided!';
				return false;
			}

		} else {
			echo 'Chart type not provided!';
			return false;
		}
	}

	public function chartData() {
		if( array_key_exists('data', $this->params) ) {

			if( is_array($this->params['data']) ) {
				
				if( !empty($this->params['data']) ) {
					return $this->params['data'];
				} else {
					return 'Chart data defined but no data provided!';
				}

			} else {
				return 'Chart data is not an array!';
			}

		} else {
			return 'Chart data not provided!';
		}
	}

	public function chartValues() {
		$default = false;

		if( array_key_exists('values', $this->params) ) {

			if( !empty($this->params['values']) ) {
				return $this->params['values'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartWidth() {
		if( array_key_exists('width', $this->params) ) {

			if( !empty($this->params['width']) ) {
				return $this->params['width'];
			} else {
				return 500;
			}

		} else {
			return 500;
		}
	}

	public function chartHeight() {
		if( array_key_exists('height', $this->params) ) {

			if( !empty($this->params['height']) ) {
				return $this->params['height'];
			} else {
				return 300;
			}

		} else {
			return 300;
		}
	}

	public function chartTitle() {
		if( array_key_exists('title', $this->params) ) {

			if( !empty($this->params['title']) ) {
				return $this->params['title'];
			} else {
				return 'Chart title defined but no title provided!';
			}

		} else {
			return 'Chart title not provided!';
		}
	}

	public function chartTitleColor() {
		$default = '#000000';

		if( array_key_exists('titleColor', $this->params) ) {

			if( !empty($this->params['titleColor']) ) {
				return $this->params['titleColor'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartTitleAlign() {
		$default = 'center';

		if( array_key_exists('titleAlign', $this->params) ) {

			if( !empty($this->params['titleAlign']) ) {
				return $this->params['titleAlign'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartImageName() {
		$title = $this->chartTitle();
		$titleScrub = preg_replace('/[^A-Za-z0-9]/', '', $title);
		return hash('SHA1', strtolower($titleScrub) ) . '.png';
	}

	public function chartBarColor() {
		$default = '#003366';

		if( array_key_exists('color', $this->params) ) {

			if( !empty($this->params['color']) ) {
				return $this->params['color'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartGrid() {
		$default = true;

		if( array_key_exists('grid', $this->params) ) {
			return $this->params['grid'];
		} else {
			return $default;
		}
	}

	public function chartBackgroundColor() {
		$default = '#ffffff';

		if( array_key_exists('backgroundColor', $this->params) ) {

			if( !empty($this->params['backgroundColor']) ) {
				return $this->params['backgroundColor'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartBorderColor() {
		$default = '#000000';

		if( array_key_exists('borderColor', $this->params) ) {

			if( !empty($this->params['borderColor']) ) {
				return $this->params['borderColor'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartGradient() {
		if( array_key_exists('gradient', $this->params) ) {

			if( !empty($this->params['gradient']) ) {
				return $this->params['gradient'];
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	public function chartLegend() {
		if( array_key_exists('legend', $this->params) ) {

			if( !empty($this->params['legend']) ) {

				if( is_bool($this->params['legend']) ) {
					return $this->params['legend'];
				} else {
					return false;
				}
				
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	public function chartLegendTitle() {
		$default = '';

		if( array_key_exists('legendTitle', $this->params) ) {

			if( !empty($this->params['legendTitle']) ) {
				return $this->params['legendTitle'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartTextColor() {
		$default = '#000000';

		if( array_key_exists('textColor', $this->params) ) {

			if( !empty($this->params['textColor']) ) {
				return $this->params['textColor'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartDataPoints() {
		$default = false;

		if( array_key_exists('points', $this->params) ) {

			if( !empty($this->params['points']) ) {
				return $this->params['points'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartDataPointsColor() {
		$default = '#000000';

		if( array_key_exists('pointsColor', $this->params) ) {

			if( !empty($this->params['pointsColor']) ) {
				return $this->params['pointsColor'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartDataLines() {
		$default = false;

		if( array_key_exists('lines', $this->params) ) {

			if( !empty($this->params['lines']) ) {
				return $this->params['lines'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	public function chartDataLineColor() {
		$default = '#000000';

		if( array_key_exists('lineColor', $this->params) ) {

			if( !empty($this->params['lineColor']) ) {
				return $this->params['lineColor'];
			} else {
				return $default;
			}

		} else {
			return $default;
		}
	}

	/*
		Bar, line, and stacked chart generator method.
	*/
	public function bar(){
		$type = $this->chartType();
		$width = $this->chartWidth();
		$height = $this->chartHeight();
		$image = $this->chartImageName();
		$file = str_replace('/', '', ASSETS_PATH) . '/files/charts/' . $image;
		$data = $this->chartData();
		$values = $this->chartValues();
		$title = $this->chartTitle();
		$titleColor = $this->chartTitleColor();
		$titleAlign = $this->chartTitleAlign();
		$color = $this->chartBarColor();
		$grid = $this->chartGrid();
		$backgroundColor = $this->chartBackgroundColor();
		$borderColor = $this->chartBorderColor();
		$gradient = $this->chartGradient();
		$legend = $this->chartLegend();
		$legendTitle = $this->chartLegendTitle();
		$textColor = $this->chartTextColor();
		$dataPoints = $this->chartDataPoints();
		$dataPointsColor = $this->chartDataPointsColor();
		$dataLines = $this->chartDataLines();
		$dataLineColor = $this->chartDataLineColor();

		if($type == 'stacked') {
			$graph = new PHPGraphLibStacked($width, $height, $file);
		} else {
			$graph = new PHPGraphLib($width, $height, $file);
		}
		
		$graph->setDataValues($values);

		if( array_key_exists(4, $data) ) {
			$graph->addData($data[0], $data[1], $data[2], $data[3], $data[4]);
		} elseif( array_key_exists(3, $data) ) {
			$graph->addData($data[0], $data[1], $data[2], $data[3]);
		} elseif( array_key_exists(2, $data) ) {
			$graph->addData($data[0], $data[1], $data[2]);
		} elseif( array_key_exists(1, $data) ) {
			$graph->addData($data[0], $data[1]);
		} else {
			$graph->addData($data);
		}

		if($type != 'line') {
			if( is_array($legendTitle) ) {
				
				if( array_key_exists(4, $legendTitle) ) {
					$graph->setLegendTitle($legendTitle[0], $legendTitle[1], $legendTitle[2], $legendTitle[3], $legendTitle[4]);
				} elseif( array_key_exists(3, $legendTitle) ) {
					$graph->setLegendTitle($legendTitle[0], $legendTitle[1], $legendTitle[2], $legendTitle[3]);
				} elseif( array_key_exists(2, $legendTitle) ) {
					$graph->setLegendTitle($legendTitle[0], $legendTitle[1], $legendTitle[2]);
				} elseif( array_key_exists(1, $legendTitle) ) {
					$graph->setLegendTitle($legendTitle[0], $legendTitle[1]);
				}

			} else {
				$graph->setLegendTitle($legendTitle);
			}
		}

		if( is_array($color) ) {
			if( array_key_exists(4, $color) ) {
				$graph->setBarColor($color[0], $color[1], $color[2], $color[3], $color[4]);
			} elseif( array_key_exists(3, $color) ) {
				$graph->setBarColor($color[0], $color[1], $color[2], $color[3]);
			} elseif( array_key_exists(2, $color) ) {
				$graph->setBarColor($color[0], $color[1], $color[2]);
			} elseif( array_key_exists(1, $color) ) {
				$graph->setBarColor($color[0], $color[1]);
			} else {
				$graph->setBarColor($color);
			}
		} else {
			$graph->setBarColor($color);
		}

		if( is_array($gradient) && count($gradient) == 2 ) {
			$graph->setGradient($gradient[0], $gradient[1]);
		}

		$graph->setTitle($title);
		$graph->setTitleColor($titleColor);
		$graph->setTitleLocation($titleAlign);
		$graph->setLegend($legend);
		$graph->setGrid($grid);
		$graph->setBackgroundColor($backgroundColor);
		$graph->setBarOutlineColor($borderColor);
		$graph->setTextColor($textColor);
		$graph->setDataPoints($dataPoints);
		$graph->setDataPointColor($dataPointsColor);
		$graph->setLine($dataLines);
		$graph->setLineColor($dataLineColor);

		if($type == 'line') {
			$graph->setLine(true);
			$graph->setBars(false);
		}

		if($type == 'stacked') {
			$graph->setXValuesHorizontal(true);
		}

		$graph->createGraph();

		return $image;
	}

	/*
		Pie chart generator method.
	*/
	public function pie(){
		$width = $this->chartWidth();
		$height = $this->chartHeight();
		$image = $this->chartImageName();
		$file = str_replace('/', '', ASSETS_PATH) . '/files/charts/' . $image;
		$data = $this->chartData();
		$title = $this->chartTitle();

		$graph = new PHPGraphLibPie($width, $height, $file);
		$graph->addData($data);
		$graph->setTitle($title);
		$graph->setLabelTextColor('50,50,50');
		$graph->setLegendTextColor('50,50,50');
		$graph->createGraph();

		return $image;
	}

	/*
		Return charts image folder complete path.
	*/
	public function imageFolder() {
		$assets = str_replace('/', '', ASSETS_PATH);
		$path = $_SERVER["DOCUMENT_ROOT"] . $assets . '/files/charts/';
		return $path;
	}

	/*
		Check if charts image folder exists and return a boolean based on result.
	*/
	public function imageFolderExists() {
		if( is_dir( $this->imageFolder() ) ) {
			return true;
		} else {
			return false;
		}
	}

	/*
		Create charts image folder if it does not exist.
	*/
	public function createImageFolder() {
		if( !$this->imageFolderExists() ) {
			mkdir($this->imageFolder());
			chmod( $this->imageFolder(), 0777 );
		}
	}

	/*
		Main class execution method.
	*/
	public function chart() {
		require_once 'phpgraphlib.php';

		$this->createImageFolder();

		switch( $this->chartType() ) {
			case 'bar':
				return $this->bar();
			break;

			case 'line':
				//return $this->line();
				return $this->bar();
			break;

			case 'stacked':
				require_once('phpgraphlib_stacked.php');
				return $this->bar();
			break;

			case 'pie':
				require_once('phpgraphlib_pie.php');
				return $this->pie();
			break;
		}
	}

}

function chart($params) {
	$chart = new Chart($params);
	return ASSETS_PATH . '/files/charts/' . $chart->chart();
}

/*
$data1 = array(
	'Oct' => 5, 
	'Nov' => 10, 
	'Dec' => 46, 
	'Jan' => 61, 
	'Feb' => 9, 
	'Mar' => 22, 
	'Apr' => 31, 
	'May' => 36, 
	'Jun' => 14, 
	'Jul' => 56, 
	'Aug' => 70, 
	'Sep' => 1
);

$data2 = array(
	'Oct' => 10, 
	'Nov' => 14, 
	'Dec' => 56, 
	'Jan' => 81, 
	'Feb' => 2, 
	'Mar' => 42, 
	'Apr' => 37, 
	'May' => 30, 
	'Jun' => 7, 
	'Jul' => 16, 
	'Aug' => 40, 
	'Sep' => 88
);

$data3 = array(
	'Oct' => 33, 
	'Nov' => 87, 
	'Dec' => 44, 
	'Jan' => 9, 
	'Feb' => 24, 
	'Mar' => 67, 
	'Apr' => 15, 
	'May' => 23, 
	'Jun' => 72, 
	'Jul' => 31, 
	'Aug' => 40, 
	'Sep' => 100
);

$bar1 = array(
	'type' => 'bar', 
	'data' => $data1, 
	'width' => 800, 
	'height' => 300, 
	'title' => 'FY-12 Task Request Totals', 
	'color' => '#333333', 
	'legend' => true, 
	'legendTitle' => 'FY-12'
);
$image1 = chart($bar1);

$bar2 = array(
	'type' => 'bar', 
	'data' => $data2, 
	'values' => true, 
	'width' => 800, 
	'height' => 300, 
	'title' => 'Stuff Totals', 
	'titleColor' => '#E02900', 
	'titleAlign' => 'left', 
	'gradient' => array('#DE8100', '#FF9500'), 
	'borderColor' => '#E02900', 
	'grid' => false, 
	'legend' => true, 
	'legendTitle' => 'FY-13', 
	'textColor' => '#E02900', 
	'points' => true, 
	'pointsColor' => '#730050', 
	'lines' => true, 
	'lineColor' => '#730050'
);
$image2 = chart($bar2);

$bar3 = array(
	'type' => 'bar', 
	'data' => array($data1, $data2), 
	'width' => 800, 
	'height' => 300, 
	'color' => array('#085400', '#003366'), 
	'title' => 'Stuff Comparison Totals', 
	'legend' => true, 
	'legendTitle' => array('FY-12', 'FY-13')
);
$image3 = chart($bar3);

$bar4 = array(
	'type' => 'bar', 
	'data' => array($data1, $data2, $data3), 
	'width' => 800, 
	'height' => 300, 
	'color' => array('#999999', '#666666', '#333333'), 
	'title' => 'Other Stuff Comparison Totals', 
	'legend' => true, 
	'legendTitle' => array('FY-11', 'FY-12', 'FY-13')
);
$image4 = chart($bar4);

$line1 = array(
	'type' => 'line', 
	'data' => $data1, 
	'width' => 800, 
	'height' => 300, 
	'points' => true, 
	'pointsColor' => '#730050', 
	'lines' => true, 
	'lineColor' => '#730050', 
	'title' => 'Stuff Line Comparison Totals'
);
$image5 = chart($line1);

$pie1 = array(
	'type' => 'pie', 
	'data' => $data1, 
	'width' => 600, 
	'height' => 500,
	'title' => 'Stuff Pie Comparison Totals'
);
$image6 = chart($pie1);

$stacked1 = array(
	'type' => 'stacked', 
	'data' => array($data1, $data2, $data3), 
	'width' => 800, 
	'height' => 300, 
	'color' => array('#085400', '#003366', '#590049'), 
	'title' => 'Stuff Stacked Comparison Totals', 
	'legend' => true, 
	'legendTitle' => array('FY-11', 'FY-12', 'FY-13')
);
$image7 = chart($stacked1);

$image = array(
	$image1, 
	$image2, 
	$image3, 
	$image4, 
	$image5, 
	$image6, 
	$image7
);

foreach ($image as $key => $value) {
	echo '<img src="' . $value . '" />' . "<br />\n";
}
*/

?>
