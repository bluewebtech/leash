<?php

/*
	Create-UnitTest.php
	Created: 2013-01-22 - Peter Rjabanedelia 3rd
	Updated: not yet
	Description: Creates a new unit test for a specific class. The class must obvoiously 
	exist for the unit test to be generated. create-unit-test takes two params, ex below:
	
	ex:
	create-unit-test controller index

	Available testing class types (2nd param) are: controller, dao, domain, service

	The create-unit-test command will generate a generic sample test and provide a URL 
	where the unit-test can be viewed within the browser.
*/

class CreateUnitTest {

	public function __construct( $command ) {
		$this->command = $command;
	}

	/*
		type() returns the second param of the create-unit-test command which is the class type
	*/
	public function type() {
		return $this->command[1];
	}

	/*
		name() returns the third param of the create-unit-test command which is the class name
	*/
	public function name() {
		return $this->command[2];
	}

	/*
		testName() returns the name of the unit test
	*/
	public function testName( $name ) {
		return $name . 'Test';
	}

	/*
		testNameExt() returns the name of the unit test
	*/
	public function addExt( $name ) {
		return $name . '.php';
	}

	/*
		testPath() returns the complete path of the unit test
	*/
	public function testPath( $name ) {
		return str_replace(WEBROOT, APPROOT, $_SERVER["DOCUMENT_ROOT"]) . 'unit-test/' . $name;
	}

	/*
		testTypes() returns an array of class types available
	*/
	public function testTypes() {
		return array('controller', 'dao', 'domain', 'service');
	}

	/*
		testTypesListed() returns the testTypes() array converted to a list
	*/
	public function testTypesListed( $types ) {
		return implode( ', ', $types );
	}

	/*
		testTypeExists() checks whether the specified class type exists in the testTypes() array
	*/
	public function testTypeExists( $type, $types ) {
		return in_array( $type, $types );
	}

	/*
		getClassType() returns the file and name of the specified class
	*/
	public function getClassType( $type, $name ) {
		$name = ucwords( $name );

		switch( $type ) {
			case 'controller':
				return $name . 'Controller';
			break;

			case 'dao':
				return $name . 'DAO';
			break;

			case 'domain':
			case 'service':
				return $name;
			break;
		}
	}

	/*
		getClassPath() returns the complete path of the class
	*/
	public function getClassPath( $type, $name ) {
		switch( $type ) {
			case 'controller': $path = 'controllers';
			break;

			case 'dao': $path = 'dao';
			break;

			case 'service': $path = 'services';
			break;

			case 'domain': $path = 'domain';
			break;
		}

		return str_replace(WEBROOT, APPROOT, $_SERVER["DOCUMENT_ROOT"]) . $path . '/' . $name;
	}

	/*
		classExists() checks whether the class specified exists
	*/
	public function classExists( $name ) {
		return file_exists( $name );
	}

	/*
		testFileContents() returns the generated contents of the unit test file
	*/
	public function testFileContents( $name ) {
		$date = date("Y-m-d");
		$nameExt = $this->addExt( $name );
		$testName = $this->testName( $name );
		$testNameExt = $this->addExt( $testName );

		$testGenerate = <<<TEST
<?php

/*
	Filename: $testNameExt
	Date Created: $date
*/

/*  
	READ ME!!! 
	BUT FEEL FREE TO REMOVE THIS BLOCK AS IT IS ONLY FOR 
	CREDIT AND BASIC REFERNCE.

	The incorporated unit-testing plugin is Testify.
	Get it https://github.com/marco-fiset/Testify.php or 
	       http://tutorialzine.com/projects/testify/

	Available testing methods are:
	assert( \$cond )
	assertFalse( \$cond )
	assertEqual( \$exp1, \$exp2 )
	assertIdentical( \$exp1, \$exp2 )
	assertInArray( \$needle, Array \$heystack )
	assertNotInArray( \$needle, Array \$heystack )
	pass( )
	fail( )
*/

include('../' . APPROOT . '/controllers/$nameExt');

class Person {

	public \$firstName;

	public function __construct( \$firstName ) {
		\$this->firstName = \$firstName;
	}

	public function getFirstName() {
		return \$this->firstName;
	}

}

\$test = new Testify( '$name' );
\$test->test('Test IndexController', function( \$test ) {
	\$obj = new Person( 'Bob' );
	\$test->assertEqual( \$obj->getFirstName(), 'Bob' );
});

\$test->run();

?>
TEST;
		
		return $testGenerate;
	}

	/*
		Generate the unit-test file and populate it with sample testing contents
	*/
	public function testMake( $path, $contents ) {
		$fp = fopen($path, 'w');
		fwrite( $fp, $contents );
		fclose($fp);
	}

	/*
		Do all the important checks and generation
	*/
	public function createUnitTest() {
		// All logic checks for failures first then proceeds to successes
		// Make sure the user specified a class type and name
		if( !array_key_exists(1, $this->command) || !array_key_exists(2, $this->command) ) {
			print 'A unit-test type and name must be provided ex: <span class="command">create-unit-test controller index</span>.';
		} else {

			$types = $this->testTypes();
			$typesList = $this->testTypesListed( $types );
			$type = $this->type();

			// Check if the specified class type is valid
			if( !$this->testTypeExists( $type, $types ) ) {
				print '<span class="command">' . $type . '</span> is not a valid type. Available types are: <span class="command">' . $typesList . '</span>.';
			} else {

				$name = $this->name();
				$getClassType = $this->getClassType( $type, $name );
				$getClassExt = $this->addExt( $getClassType );
				$getClassPath = $this->getClassPath( $type, $getClassExt );
				$classExists = $this->classExists( $getClassPath );

				// Make sure the class file exists
				if( !$classExists ) {
					print '<span class="command">' . $getClassType . '</span> class does not exist.';
				} else {
					
					$testName = $this->testName( $getClassType );
					$testNameExt = $this->addExt( $testName );
					$testPath = $this->testPath( $testNameExt );
					$testExists = $this->classExists( $testPath );
					
					// Check whether the specified unit-test does not already exist
					if( !$testExists ) {

						// Get the content of the unit-test
						$contents = $this->testFileContents( $getClassType );

						// Generate the unit-test file and fill it with sample contents
						$this->testMake( $testPath, $contents );

						// Display the success message
						print 'Test <span class="command">' . $testName . '</span> has been generated successfully and can be viewed <a href="http://' . $_SERVER['SERVER_NAME'] . '/unit-test/' . $testName . '" target="_blank">here</a>.';

					} else {
						print 'Test <span class="command">' . $testName . '</span> already exists and cannot be generated.';
					}

				}

			}

		}
	}

}

?>
