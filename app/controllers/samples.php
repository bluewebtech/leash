<?php

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-27
 * Date Updated: 2013-07-09
 * Framework Samples.
 */

class SamplesController {

	public function index() {
		$title = 'Samples';
		title( $title );
		$values = array( 'title' => $title );
		View::render( 'index', $values );
	}

	/*
	 * Created by: Peter Morrison
	 * Date Created: 2013-02-27
	 * Date Updated: not yet
	 * CSRF sample.
	 */
	public function csrf() {
		$title = 'CSRF Sample';
		title( $title );
		$post = post();
		$values = array(
			'title' => $title, 
			'name' => $post->name, 
			'csrf_token' => $post->csrf_token, 
			'process' => $post->process
		);

		View::render( 'csrf', $values );
	}

	public function database() {
		$title = 'Database Sample';
		title( $title );
		View::render( 'database' );
	}

	/*
	 * Created by: Peter Morrison
	 * Date Created: 2013-07-09
	 * Date Updated: not yet
	 * Emcrypt sample.
	 */
	public function encrypt() {
		$title = 'Encrypt Sample';
		title( $title );
		$post = post();
		$values = array(
			'title' => $title, 
			'password' => $post->password, 
			'process' => $post->process
		);

		View::render( 'encrypt', $values );
	}

	public function form() {
		$title = 'Form Sample';
		title( $title );
		$post = post();
		$values = array(
			'title' => $title, 
			'post'  => $post
		);

		View::render( 'form', $values );
	}

	/*
	 * Created by: Peter Morrison
	 * Date Created: 2013-07-01
	 * Date Updated: not yet
	 * Simple HTML sample.
	 */
	public function html() {
		$title = 'HTML Samples';
		title( $title );
		$values = array( 'title' => $title );
		View::render( 'html', $values );
	}

	/*
	 * Created by: Peter Morrison
	 * Date Created: 2013-07-30
	 * Date Updated: not yet
	 * Simple HTML sample.
	 */
	public function orm() {
		$title = 'ORM Samples';
		title( $title );
		$values = array( 'title' => $title );
		View::render( 'orm', $values );
	}

	/*
	 * Created by: Peter Morrison
	 * Date Created: 2013-02-27
	 * Date Updated: not yet
	 * Simple PDF sample.
	 */
	public function pdf() {
		$names = array(
			'Bob Barker', 
			'Bob Saget', 
			'Bob Seger', 
			'Bob Dylan', 
			'Bob Evans', 
			'Bob Hope'
		);

		$content = '';
		$content .= h1( 'FAMOUS BOBS!' );

		foreach( $names as $key => $value ) {
			$content .= $value . "<br />\n";
		}

		pdf( $content, 'famous-bobs' );
	}

	/*
	 * Created by: Peter Morrison
	 * Date Created: 2013-02-27
	 * Date Updated: not yet
	 * Upload sample.
	 */
	public function upload() {
		$title = 'Upload Sample';
		title( $title );
		$post = post();
		$values = array(
			'title' => $title, 
			'files' => files(), 
			'process' => $post->process
		);

		View::render( 'upload', $values );
	}

	public function mongo() {
		$dsn = dataSource( 'MongoDB' );
		dump( $dsn );
		dump( $dsn->db->listDBs() );
	}

//$band = Leash\ORM::all( $dsn = 'Sample', $table = 'bands', $order = 'band', $sort = 'asc', $sql = true );
//$band = Leash\ORM::all( 'Sample', 'bands', 'band', 'desc', true );
//$band = Leash\ORM::where( $dsn = 'Sample', $table = 'bands', $column = 'band', $cond = '=', $item = 'Slayer', $order = 'band', $sort = 'desc', $sql = true );
//$band = Leash\ORM::where( 'Sample', 'bands', 'band', 'like', '%p%', 'band', 'asc', true );
//$band = Leash\ORM::equal( 'Sample', 'bands', 'id', 2, 'band', '', '', true );
//$band = Leash\ORM::not_equal( 'Sample', 'bands', 'band', 'Slayer', 'band', '', '', true );
//$band = Leash\ORM::greater( 'Sample', 'bands', 'id', 5, 'id', 'asc', true );
//$band = Leash\ORM::greater_or_equal( 'Sample', 'bands', 'id', 5, 'id', 'asc', true );
//$band = Leash\ORM::less( 'Sample', 'bands', 'id', 5, 'id', 'asc', true );
//$band = Leash\ORM::less_or_equal( 'Sample', 'bands', 'id', 5, 'id', 'asc', true );
//$band = Leash\ORM::like( 'Sample', 'bands', 'band', '%s%', 'band', 'asc', true );
//$band = Leash\ORM::delete( 'Sample', 'bands', 'id', 8, true );

/*
$columns = array( 'date_created', 'band' );
$values = array( date( 'Y-m-d' ), 'Morbid Angel' );
$band = Leash\ORM::insert( 'Sample', 'bands', $columns, $values, true );
*/

/*
$columns = array( 'date_updated', 'band', 'id' );
$values = array( date( 'Y-m-d' ), 'Morbid Angel', 34 );
$band = Leash\ORM::update( 'Sample', 'bands', $columns, $values, true );
*/

}
