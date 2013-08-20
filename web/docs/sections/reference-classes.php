<h1>Reference Classes</h1>
<p>
	The following information below is a list of available functions that are built into the 
	frameworks core which can be used throughout a web site or application.
</p>
<p>
	<a href="#datasource">Datasource</a>, 
	<a href="#file">File</a>, 
	<a href="#form">Form</a>, 
	<a href="#html">HTML</a>, 
	<a href="#request">Request</a>, 
	<a href="#security">Security</a>, 
	<a href="#string">String</a>, 
	<a href="#view">View</a>
</p>
<h2 id="datasource">&#43; Database Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			Database::datasource()
		</td>
		<td align="center">
			datasource:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a connection to a datasource configured in <span class="path">/app/conf/datasource.php</span>
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::dsn()
		</td>
		<td align="center">
			datasource:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a connection to a datasource configured in <span class="path">/app/conf/datasource.php</span>
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::all()
		</td>
		<td align="center">
			datasource:[string], table:[string], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array 
		</td>
		<td align="left">
			Uses the provided datasource to return all records from the specified table.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::delete()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any]
		</td>
		<td align="center">
			class, array 
		</td>
		<td align="left">
			Uses the provided datasource to delete a specified record from the specified table.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::equal()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array 
		</td>
		<td align="left">
			Uses the provided datasource to return all records equal to the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::greater()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array 
		</td>
		<td align="left">
			Uses the provided datasource to return all records greater than the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::greater_or_equal()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array 
		</td>
		<td align="left">
			Uses the provided datasource to return all records greater than of equal to the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::insert()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[array], values:[array]
		</td>
		<td align="center">
			string 
		</td>
		<td align="left">
			Uses the provided datasource to insert values into the specified table.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::lastinserted()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Uses the provided datasource to return the id of the last inserted record.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::less()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array
		</td>
		<td align="left">
			Uses the provided datasource to return all records less than the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::less_or_equal()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array
		</td>
		<td align="left">
			Uses the provided datasource to return all records less than or eual to the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::like()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array
		</td>
		<td align="left">
			Uses the provided datasource to return all records using the like parameter to the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::not_equal()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array
		</td>
		<td align="left">
			Uses the provided datasource to return all records not equal to the column and item specified.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::query()
		</td>
		<td align="center">
			sql:[string], bindings:[array]
		</td>
		<td align="center">
			class, array
		</td>
		<td align="left">
			Uses the provided SQL and optional bindings to query a currently defined datasource.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::total()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns the total of records returns by a query.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::update()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[array], values:[array]
		</td>
		<td align="center">
			string 
		</td>
		<td align="left">
			Uses the provided datasource to update values in the specified table.
		</td>
	</tr>
	<tr>
		<td align="left">
			Database::where()
		</td>
		<td align="center">
			datasource:[string], table:[string], column:[string], cond:[=, !=, &gt;, &gt;=, &lt;, &lt;=, LIKE], item:[any], order:[string], sort:[asc, desc]
		</td>
		<td align="center">
			class, array
		</td>
		<td align="left">
			Uses the provided datasource to return all records using a specified conditional and matching the column and item specified.
		</td>
	</tr>
</table>

<h2 id="file">&#43; File Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			File::append()
		</td>
		<td align="center">
			array[destination, content]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Appends text to a file.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::copy()
		</td>
		<td align="center">
			array[source, destination]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Copies a file to a specified location.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::delete()
		</td>
		<td align="center">
			array[source]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Deletes a file from a specified location.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::move()
		</td>
		<td align="center">
			array[source, destination]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Moves a file to a specified location.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::read()
		</td>
		<td align="center">
			array[source]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Reads a specified file.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::rename()
		</td>
		<td align="center">
			array[source]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Renames a specified file.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::upload()
		</td>
		<td align="center">
			array[field, destination, accept (optional), size (optional), conflict (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Uploads a single or multiple files based on specified additional parameters.
		</td>
	</tr>
	<tr>
		<td align="left">
			File::write()
		</td>
		<td align="center">
			array[destination, content]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Write content to a new specified file.
		</td>
	</tr>
</table>

<h2 id="form">&#43; Form Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			Form::open()
		</td>
		<td align="center">
			array
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a formatted open HTML form tag.
		</td>
	</tr>
	<tr>
		<td align="left">
			Form::close()
		</td>
		<td align="center">
			array
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a formatted closed HTML form tag.
		</td>
	</tr>
</table>

<h2 id="html">&#43; HTML Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			HTML::ahref()
		</td>
		<td align="center">
			text:[string], url:[string], title:[string], target:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string formatted in &lt;a&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::b()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;b&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::bold()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;b&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::br()
		</td>
		<td align="center">
			HTML::text:[string], total:[int] (optional)
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string containing a specified amount of &lt;br /&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::dl()
		</td>
		<td align="center">
			text:[string/array]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;dl&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::description()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;meta name="description"&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::heading()
		</td>
		<td align="center">
			text:[string], number:[int]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;h1&gt; tags based on the provided number.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::h1()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;h1&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::h2()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;h2&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::h3()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;h3&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::h4()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;h4&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::h5()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;h5&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::i()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;i&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::italic()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;i&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::keywords()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;meta name="keywords"&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::mailto()
		</td>
		<td align="center">
			text:[string], url:[string], title:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a email string wrapped in &lt;a&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::nl()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string with a newline \n added to the end in the source.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::p()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;p&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::paragraph()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;p&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::pre()
		</td>
		<td align="center">
			text:[string/array]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;pre&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::space()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string with added space.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::span()
		</td>
		<td align="center">
			text:[string], style:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;span&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::strike()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;strike&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::strong()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;strong&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::tab()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string with an added tab in the source.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::title()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;title&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::ul()
		</td>
		<td align="center">
			text:[string/array]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;ul&gt; tags.
		</td>
	</tr>
	<tr>
		<td align="left">
			HTML::underline()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			HTML::string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;u&gt; tags.
		</td>
	</tr>
</table>

<h2 id="orm">&#43; ORM Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			[Model]::all()
		</td>
		<td align="center">
			array[order, sort] (optional)
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::del()
		</td>
		<td align="center">
			array[column, item]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Deletes a record from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::delete()
		</td>
		<td align="center">
			array[column, item]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Deletes a record from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::edit()
		</td>
		<td align="center">
			array[columns], array[values]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Updates a record from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::eq()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records equal to the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::find()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records equal to the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::gt()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records greater than the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::gte()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records greater than or equal to the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::hunt()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records equal to the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::lt()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records less than the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::lte()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records less than or equal to the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::neq()
		</td>
		<td align="center">
			array[column, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records not equal to the specified column and item from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::obliterate()
		</td>
		<td align="center">
			array[column, item]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Deletes a record from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::save()
		</td>
		<td align="center">
			array[columns], array[values]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Inserts a new record into the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::update()
		</td>
		<td align="center">
			array[columns], array[values]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Updates a record from the datasource and table specified in a model.
		</td>
	</tr>
	<tr>
		<td align="left">
			[Model]::where()
		</td>
		<td align="center">
			array[column, cond, item, order (optional), sort (optional)]
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns all records equal to the specified condition, column and item from the datasource and table specified in a model.
		</td>
	</tr>
</table>
<h2 id="request">&#43; Request Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			Request::cookies()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns an array of all available cookie scope values.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::domain()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a formatted domain name of the current web site/application.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::files()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns an array of all available file scope values.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::get()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns an array of all available get values.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::ipaddress()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns the current ipaddress of the requester.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::is_ajax()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean depending is the current request was made via ajax.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::post()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns an array of all available post values.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::redirect()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Redirects to a new page.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::request()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns an array of all available request values.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::server()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Returns an array of all available server values.
		</td>
	</tr>
	<tr>
		<td align="left">
			Request::uuid()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a random string of alpha-numeric characters.
		</td>
	</tr>
</table>
<h2 id="security">&#43; Security Core Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			Security::csrf_generate()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a unique id and sets a session variable containing the same value.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::csrf_field()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns an HTML hidden field with a unique id value and sets a session variable containing the same value.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::csrf_token()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a unique is string that can be used for CSRF protection.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::csrf_val()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on the CSRF field and session.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::decode()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Decodes and encrypted string (Same as decrypt).
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::decrypt()
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Decrypts and encrypted string (same as decode).
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::encode()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Encodes a string (same as encrypt).
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::encrypt()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Encrypts a string (same as encode).
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::hash()
		</td>
		<td align="center">
			text:[string], total:[int]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Hashes the provided string a specified total times using the encryption type in the configuration.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::html_clean()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string with HTML tags stripped
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isint()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is int.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isstring()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is string.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isboolean()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is boolean.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isfloat()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is float.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isemail()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is a valid email address.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isipaddress()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is a valid ip address.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::isvalid()
		</td>
		<td align="center">
			string:[boolean, email, float, int, ipaddress] ,text:[string]
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is a valid type of param 1.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::islength()
		</td>
		<td align="center">
			any
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Returns a boolean based on whether the provided param is a valid string length.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::safe_b64decode()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a decoded base64 string.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::safe_b64encode()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a base64 encoded string.
		</td>
	</tr>
	<tr>
		<td align="left">
			Security::xss_clean()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string with all special characters converted to HTML entities 
			which is used to help with cleansing data from possible XSS attacks.
		</td>
	</tr>
</table>
<h2 id="string">&#43; String Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			String::clean_telephone()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Removes all characters from a telephone number.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::format_telephone()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats a string to a telephone.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::format_dollars()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			float
		</td>
		<td align="left">
			Formats the provided float param to dollars.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::format_money()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			float
		</td>
		<td align="left">
			Formats the provided float param to dollars.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::format_number()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the provided float param to a comma delimited number string.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::lowercase()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the entire provided string param to lowercase.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::lowercase_first()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the first letter of the provided string param to lowercase.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::lowercase_words()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the first letter of all words in the provided string param to lowercase.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::remove_chars()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Removes all special characters from the provided string param.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::remove_whitespace()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Removes all whitespace from the provided string param.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::search_start()
		</td>
		<td align="center">
			needle:[string], haystack:[string], occurrence:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Searches for the specified needle starting at the beginning of the provided haystack and stops the search once it finds the last occurrence.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::search_end()
		</td>
		<td align="center">
			needle:[string], haystack:[string], occurrence:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Searches for the specified needle starting at the end of the provided haystack and stops the search once it finds the last occurrence.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_array()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Converts the provided param to an array.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_boolean()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Converts the provided param to a boolean.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_float()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			float
		</td>
		<td align="left">
			Converts the provided param to a float.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_integer()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			int
		</td>
		<td align="left">
			Converts the provided param to an integer.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_null()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			null
		</td>
		<td align="left">
			Converts the provided param to null.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_object()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			object
		</td>
		<td align="left">
			Converts the provided param to an object.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::to_string()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Converts the provided param to a string.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::uppercase()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the entire provided string param to uppercase.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::uppercase_first()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the first letter of the provided string param to uppercase.
		</td>
	</tr>
	<tr>
		<td align="left">
			String::uppercase_words()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Formats the first letter of all words in the provided string param to uppercase.
		</td>
	</tr>
</table>
<h2 id="view">&#43; View Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			View::render()
		</td>
		<td align="center">
			text:[string], params:[array]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a view template associated with the current controller. Also takes 
			an array as a second param which makes it possible for values within that array 
			available to the defined view. Also see the view().
		</td>
	</tr>
	<tr>
		<td align="left">
			View::get()
		</td>
		<td align="center">
			text:[string], params:[array]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Alias of View::render().
		</td>
	</tr>
</table>
<h2 id="view">&#43; XML Class Functions</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th width="150">
			FUNCTION NAME
		</th>
		<th width="300">
			PARAMETERS
		</th>
		<th width="100">
			RETURN TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			XML::file()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Takes an XML file and converts the contents from a simplexml object to an array.
		</td>
	</tr>
	<tr>
		<td align="left">
			XML::get()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Takes an XML file or string and converts the contents from a simplexml object to an array.
		</td>
	</tr>
	<tr>
		<td align="left">
			XML::string()
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			array
		</td>
		<td align="left">
			Takes an XML string and converts the contents from a simplexml object to an array.
		</td>
	</tr>
</table>
