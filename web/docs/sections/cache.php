<h1>Cache</h1>
<p>
	The framework currently supports 2 caching libraries, <a href="http://php.net/manual/en/book.apc.php" target="_blank">APC</a> 
	and <a href="http://memcached.org/" target="_blank">Memcached</a>. Caching must be enabled 
	within /app/conf/config.php as well as a caching library must be defined. You can also choose to 
	set a cache name within the configuration as well if you choose to do so.
</p>
<h2>Defining a Key</h2>
<p>
	Below is an example of defining a key store.
</p>
<pre>
<code>
&lt;?php 

Cache::save( 'frank', 'Frank Sinatra is brilliant.' );

?&gt; 
</pre>
</code>

<h2>Retrieving a Key</h2>
<p>
	Below is an example of retrieving a key store.
</p>
<pre>
<code>
&lt;?php 

Cache::get( 'frank' );

?&gt; 
</pre>
</code>

<h2>Deleting a Key</h2>
<p>
	Below is an example of deleting a key store.
</p>
<pre>
<code>
&lt;?php 

Cache::delete( 'frank' );

?&gt; 
</pre>
</code>
<br />
