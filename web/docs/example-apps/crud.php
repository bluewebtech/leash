<?php include '../inc/head.php' ?>

<h1>Example Apps | CRUD Example</h1>
<p>
	By default, the framework comes with a sqlite database that is used by a simple CRUD 
	example. Below are explanations of what is actually happening.
</p>
<p>
	<span class="note">Note:</span> The CRUD example app is installed by default and can be 
	viewed by clicking <a href="/bands/" target="_blank">this</a>.
</p>

<h2>CRUD Bands Controller</h2>
<p>
	Below is sample controller code that handles simple CRUD actions that deal with the 
	example sqlite bands database that contain nothing more than a list of band names along 
	with create and update, dates.
</p>
<pre>
<code>
&lt;?php

class BandsController {

	public function index() {
		$bands  = BandsModel::getBands();
		$values = array(
			'bands' => $bands
		);

		view( 'index', $values );
	}

	public function create() {
		$values = array();
		$post   = post();

		if( isset( $post->process ) ) {
			$values[ 'band' ]         = $post->band;
			$values[ 'date_created' ] = date( 'Y-m-d' );
			$values[ 'process' ]      = $post->process;

			if( $post->process == 'Cancel' ) {
				BandsController::cancel();
			} else {
				BandsModel::createBand( $values );
			}
		}

		view( 'create', $values );
	}

	public function read() {
		$bands  = BandsModel::getBand( $GLOBALS[ 'params' ] );
		$post   = post();
		$values = array(
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => $bands[ 0 ]->date_updated
		);

		if( $post->process == 'Cancel' ) {
			BandsController::cancel();
		} else {
			view( 'read', $values );
		}
	}

	public function update() {
		$id     = $GLOBALS[ 'params' ];
		$bands  = BandsModel::getBand( $id );
		$post   = post();
		$values = array(
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => $bands[ 0 ]->date_updated
		);

		if( isset( $post->process ) ) {

			$values[ 'id' ]           = $id;
			$values[ 'band' ]         = $post->band;
			$values[ 'date_updated' ] = date( 'Y-m-d' );
			$values[ 'process' ]      = $post->process;

			if( $post->process == 'Cancel' ) {
				BandsController::cancel();
			} else {
				BandsModel::updateBand( $values );
			}

		}

		view( 'update', $values );
	}

	public function delete() {
		$id     = $GLOBALS[ 'params' ];
		$bands  = BandsModel::getBand( $id );
		$post   = post();
		$values = array(
			'id'   => $bands[ 0 ]->id, 
			'band' => $bands[ 0 ]->band
		);

		if( $post->process == 'Yes' ) {
			BandsModel::deleteBand( $id );
		}

		if( empty( $post->process ) || $post->process == 'Yes' ) {
			view( 'delete', $values );
		} else {
			BandsController::cancel();
		}
	}

	public static function cancel() {
		redirect( '/bands/' );
	}

}
</code>
</pre>

<h2>CRUD Bands Model</h2>
<p>
	Below is the CRUD model example that handles all database interaction with basic SQL.
</p>
<pre>
<code>
&lt;?php

class BandsModel {

	public static function getBands() {
		$dsn   = dataSource( 'Sample' );
		$query = $dsn->query( 
			'SELECT id, 
			        date_created, 
			        date_updated, 
			        band 
			FROM    bands' 
		);

		return $query;
	}

	public static function getBand( $id ) {
		$dsn   = dataSource( 'Sample' );
		$query = $dsn->query( 
			'SELECT id, 
			        date_created, 
			        date_updated, 
			        band  
			 FROM   bands 
			 WHERE  id = :id', 
			 array( 
			 	$id 
			 ) 
		);

		return $query;
	}

	public static function createBand( $values ) {
		$dsn   = dataSource( 'Sample' );
		$query = $dsn->query( 
			'INSERT INTO bands
			        ( 
			          band, 
			          date_created 
			         )
			 VALUES ( 
		     	      :band, 
		     	      :date_created 
		     	     )', 
			 array( 
			 	$values[ 'band' ], 
			 	$values[ 'date_created' ] 
			 ) 
		);

		return $query;
	}

	public static function updateBand( $values ) {
		$dsn   = dataSource( 'Sample' );
		$query = $dsn->query( 
			'UPDATE bands
			 SET    band         = :band, 
			        date_updated = :date_updated
			 WHERE  id           = :id', 
			 array( 
			 	$values[ 'band' ], 
			 	$values[ 'date_updated' ], 
			 	$values[ 'id' ]  
			 ) 
		);

		return $query;
	}

	public static function deleteBand( $id ) {
		$dsn   = dataSource( 'Sample' );
		$query = $dsn->query( 
			'DELETE 
			 FROM   bands
			 WHERE  id = :id', 
			 array( 
			 	$id
			 ) 
		);

		return $query;
	}

}
</code>
</pre>

<h2>CRUD Bands List (/app/bands/index.php) View</h2>
<p>
	Below is the CRUD default (index) view example that lists all records available within the 
	sample bands sqlite database.
</p>
<pre>
<code>
&lt;h1&gt;Bands CRUD Example&lt;/h1&gt;
&lt;p>
	Click &lt;a href="/bands/create/"&gt;here&lt;/a&gt; to create a new band.
&lt;/p&gt;
&lt;table width="98%" border="0" cellpadding="1" cellspacing="1"&gt;
	&lt;tr&gt;
		&lt;th&gt;Item&lt;/th&gt;
		&lt;th&gt;Band&lt;/th&gt;
		&lt;th&gt;Date Created&lt;/th&gt;
		&lt;th&gt;Date Updated&lt;/th&gt;
		&lt;th&gt;Read&lt;/th&gt;
		&lt;th&gt;Update&lt;/th&gt;
		&lt;th&gt;Delete&lt;/th&gt;
	&lt;/tr&gt;
&lt;?php
foreach( $bands as $key => $value ) {
	$key = $key + 1;

	out( nl( '&lt;tr&gt;' ) );
		out( nl( '&lt;td align="center"&gt;' . $key . '&lt;/td&gt;' ) );
		out( nl( '&lt;td&gt;' . $value->band . '&lt;/td&gt;' ) );
		out( nl( '&lt;td align="center"&gt;' . $value->date_created . '&lt;/td&gt;' ) );
		out( nl( '&lt;td align="center"&gt;' . $value->date_updated . '&lt;/td&gt;' ) );

		out( nl( '&lt;td align="center"&gt;' . ahref( 'Read', '/bands/read/' . $value->id, 'Read ' . $value->band ) . '&lt;/td&gt;' ) );
		out( nl( '&lt;td align="center"&gt;' . ahref( 'Update', '/bands/update/' . $value->id, 'Update ' . $value->band ) . '&lt;/td&gt;' ) );
		out( nl( '&lt;td align="center"&gt;' . ahref( 'Delete', '/bands/delete/' . $value->id, 'Delete ' . $value->band ) . '&lt;/td&gt;' ) );
	out( nl( '&lt;/tr&gt;' ) );
}
?&gt;
&lt;/table&gt;
</code>
</pre>

<h2>CRUD Bands Read (/app/bands/read.php) View</h2>
<p>
	Below is the CRUD read view example that displays a selected bands information from the 
	sample sqlite bands database.
</p>
<pre>
<code>
&lt;h1&gt;Bands CRUD Example | &lt;?php out( $band ) ?&gt;&lt;/h1&gt;
&lt;h2&gt;Read&lt;/h2&gt;
&lt;?php

if( empty( $date_updated ) ) {
	$date_updated = 'Not Yet';
} else {
	$date_updated = $date_updated;
} 

out(
	p( 
		b( 'Created: ' ) . 
		$date_created 
	)
);

out(
	p( 
		b( 'Updated: ' ) . 
		$date_updated 
	)
);

out(
	p( 
		b( 'Band: ' ) . 
		$band 
	)
);

out(
	p( 
		ahref( 'Update', '/bands/update/' . $id, 'Update' ) . ' | ' . 
		ahref( 'Delete', '/bands/delete/' . $id, 'Delete' ) . ' | ' . 
		ahref( 'Cancel', '/bands/cancel/' . $id, 'Cancel' )
	)
);

?&gt;
</code>
</pre>

<h2>CRUD Bands Create (/app/bands/create.php) View</h2>
<p>
	Below is the CRUD create view example that displays a form to add a new band to the bands 
	sample sqlite database.
</p>
<pre>
<code>
&lt;h1&gt;Bands CRUD Example&lt;/h1&gt;
&lt;h2&gt;Create&lt;/h2&gt;
&lt;?php if( !isset( $process ) ) { ?&gt;
&lt;form action="" name="band_form" id="band_form" method="post"&gt;
&lt;?php

out(
	p( 
		b( 'Band: ' ) . 
		'&lt;input type="text" name="band" id="band" value="" /&gt;' 
	)
);

out(
	p( 
		nl( '&lt;input type="submit" name="process" id="process" value="Create" /&gt;' ) . 
		nl( '&lt;input type="submit" name="process" id="process" value="Cancel" /&gt;' ) 
	)
);

?>
&lt;/form&gt;
&lt;?php 
} else {
	out(
		p( 'Created' ) . 
		p( 'Click ' . ahref( 'here', '/bands/' ) . ' to go to band list' )
	);
}
?&gt;
</code>
</pre>

<h2>CRUD Bands Update (/app/bands/update.php) View</h2>
<p>
	Below is the CRUD update view example that displays a form where a selected band can 
	be updated in the sample sqlite bands database.
</p>
<pre>
<code>
&lt;h1&gt;Bands CRUD Example | &lt;?php out( $band ) ?&gt;&lt;/h1&gt;
&lt;h2&gt;Update&lt;/h2&gt;
&lt;?php if( !isset( $process ) ) { ?&gt;
&lt;form action="" name="band_form" id="band_form" method="post"&gt;
&lt;?php

if( empty( $date_updated ) ) {
	$date_updated = 'Not Yet';
} else {
	$date_updated = $date_updated;
} 

out(
	p( 
		b( 'Created: ' ) . 
		$date_created 
	)
);

out(
	p( 
		b( 'Updated: ' ) . 
		$date_updated 
	)
);

out(
	p( 
		b( 'Band: ' ) . 
		'&lt;input type="text" name="band" id="band" value="' . $band . '" /&gt;' 
	)
);

out(
	p( 
		nl( '&lt;input type="submit" name="process" id="process" value="Update" /&gt;' ) . 
		nl( '&lt;input type="submit" name="process" id="process" value="Cancel" /&gt;' ) 
	)
);

?>
&lt;/form&gt;
&lt;?php 
} else {
	out(
		p( 'Updated ' . $band ) . 
		p( 'Click ' . ahref( 'here', '/bands/' ) . ' to go to band list' )
	);
}
?&gt;
</code>
</pre>

<h2>CRUD Bands Delete (/app/bands/delete.php) View</h2>
<p>
	Below is the CRUD delete view example that displays a simple form asking the user for 
	confirmation to delete a selected band from the sample sqlite bands database
</p>
<pre>
<code>
&lt;h1&gt;Bands CRUD Example | &lt;?php out( $band ) ?&gt;&lt;/h1&gt;
&lt;h2&gt;Delete&lt;/h2&gt;
&lt;?php if( empty( $_POST[ 'process' ] ) ) { ?&gt;
&lt;form action="" name="band_form" id="band_form" method="post"&gt;
&lt;?php

out(
	p( 
		b( 'Are you sure you want to delete? ' ) . $band
	)
);

out(
	p(
		nl( '&lt;input type="submit" name="process" id="process" value="Yes" /&gt;' ) . 
		nl( '&lt;input type="submit" name="process" id="process" value="No" /&gt;' ) 
	)
);

?>
&lt;/form&gt;
&lt;?php 
} else {
	out(
		p( 'Deleted' ) . 
		p( 'Click ' . ahref( 'here', '/bands/' ) . ' to go to band list' )
	);
}
?&gt;
</code>
</pre>

<?php include '../inc/foot.php' ?>