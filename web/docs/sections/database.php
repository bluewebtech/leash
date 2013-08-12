<h1>Database</h1>
<p>
	The database section will explain how flexible the framework is when it comes to handling 
	database interactions as well as containing a few examples.
</p>
<h2 id="datasource-configuration">&#43; Datasource Configuration</h2>
<p>
	All datasource configuration is stored within the datasource.php configuration file located 
	at <span class="path">/app/conf/datasource.php</span>. There are a few database servers that are supported by the 
	framework. A list of supported servers are available within the datasource reference section. 
	It is possible to configure multiple datasources, all being the same server type or completely 
	different server types. They will all load as long as they are supported. 
</p>
<p>
	Datasources can be configured for a development and production environment. What this means 
	is that you can develop and work with a database that is stored on either a local database or 
	a database that is stored on a development server. Below is an example of an SQLite and MySQL 
	datasource.
</p>
<pre>
<code>
&lt;?php

$datasource = array(

	// -- Development datasources
	'development' => array(

		'dsn1' => array(
			'engine' => 'sqlite', 
			'database' => '&lt;path-to-database&gt;/stuff.sqlite' 
		), 
		'dsn2' => array(
			'engine' => 'mysql', 
			'host' => 'localhost', 
			'port' => '3306', 
			'username' => 'user', 
			'password' => 'pass', 
			'database' => 'stuff' 
		)

	), 

	// -- Production datasources
	'production' => array(

		'dsn1' => array(
			'engine' => 'sqlite', 
			'database' => '&lt;path-to-database&gt;/stuff.sqlite' 
		), 
		'dsn2' => array(
			'engine' => 'mysql', 
			'host' => 'localhost', 
			'port' => '3306', 
			'username' => 'user', 
			'password' => 'pass', 
			'database' => 'stuff' 
		)

	)

);
</code>
</pre>
<h2 id="initializing-a-datasource">&#43; Initializing a Datasource</h2>
<p>
	Initializing a datasource is incredibly easy. To do so you would define a variable to be 
	used to store the datasource and utilize the <span class="method">Database::dsn()</span> method by specifying the 
	name of the datasource from the <span class="file">datasource.php</span> configuration. Below is an example.
</p>
<pre>
<code>
&lt;?php

$dsn = Database::dsn( 'dsn1' );
</code>
</pre>
<p>
	You can also use a few different Database class alias names as seen in the examples below.
</p>
<pre>
<code>
&lt;?php

$dsn = Database::dsn( 'dsn1' );

$dsn = DB::dsn( 'dsn1' );

$dsn = DBase::dsn( 'dsn1' );

$dsn = DSN::dsn( 'dsn1' );
</code>
</pre>
<p>
	Or, you can use alias Database class function names as seen in the examples below.
</p>
<pre>
<code>
&lt;?php

$dsn = Database::dsn( 'dsn1' );

$dsn = Database::datasource( 'dsn1' );
</code>
</pre>

<h2 id="querying-a-database">&#43; Querying a Database</h2>
<p>
	Doing basic queries is basically no different than the usual of writing SQL statements. 
	You would first initialize a datasource, use the initializer variable to perform a query 
	by using the <span class="method">Database::query()</span> class method. Below is an example of how one would query a 
	database and output the data.
</p>
<pre>
<code>
&lt;?php

$dsn = Database::dsn( 'dsn1' );
$query = Database::query( 'SELECT * FROM stuff' );
</code>
</pre>
<p>
	You could then output the results as seen in the next example below.
</p>
<pre>
<code>
&lt;?php

$dsn = Database::dsn( 'dsn1' );
$query = Database::query( 'SELECT * FROM stuff' );

foreach( $query as $key => $value ) {
	echo $value->stuff . "&lt;br /&gt;\n";
}
</code>
</pre>
<p>
	If you are familiar with working with PDO in PHP, you will understand the next example below. 
	The example below retrieves a specific record from the foobar stuff database.
</p>
<pre>
<code>
&lt;?php

$dsn = Database::dsn( 'dsn1' );
$query = Database::query( 'SELECT * FROM stuff WHERE id = :id', array( ':id' => 5 ) );

echo $query[ 0 ]->stuff . "&lt;br /&gt;\n";
</code>
</pre>
<h2 id="query-helpers">&#43; Query Helpers</h2>
<p>
	There are a few methods within the Database class that can help significantly. A complete 
	list of these helpers are available within the class reference. Below is an example of a 
	querying the foobar stuff database by using some of these helpers.
</p>
<pre>
<code>
&lt;?php

$query = DB::all( 'dsn1', 'stuff' );

foreach( $query as $key => $value ) {
	echo $value->stuff . "&lt;br /&gt;\n";
}
</code>
</pre>
<p>
	Now to use another Database class helper to retrieve a specific record from the foobar 
	database table.
</p>
<pre>
<code>
&lt;?php

$query = DB::equal( 'dsn1', 'stuff', 'id', 5 );

echo $query[ 0 ]->stuff . "&lt;br /&gt;\n";
</code>
</pre>
<h2 id="orm">&#43; ORM</h2>
<p>
	The framework has an ORM class that consists of a library of methods to make database 
	interactions even easier than using the Database class helpers. 
</p>
<p>
	To use the ORM class, you must first create a new model class which will be stored within 
	the models directory located at <span class="path">/app/models/</span>. For example purposes, we will refer to the 
	model class as the stuff.php model.
</p>
<br />
