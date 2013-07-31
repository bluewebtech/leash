<?php include '../inc/head.php' ?>

<h1>Reference | Core Functions</h1>
<p>
	The following information below is a list of available functions that are built into the 
	frameworks core which can be used throughout a web site or application.
</p>
<ul>
	<li>
		<a href="#Datasource">Datasource</a>
	</li>
	<li>
		<a href="#Debugging">Debugging</a>
	</li>
	<li>
		<a href="#Form">Form</a>
	</li>
	<li>
		<a href="#HTML">HTML</a>
	</li>
	<li>
		<a href="#Logging">Logging</a>
	</li>
	<li>
		<a href="#Request">Request</a>
	</li>
	<li>
		<a href="#Security">Security</a>
	</li>
	<li>
		<a href="#String">String</a>
	</li>
	<li>
		<a href="#View">View</a>
	</li>
</ul>
<h2 id="HTML">HTML Core Functions</h2>
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
			ahref()
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
			b()
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
			bold()
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
			br()
		</td>
		<td align="center">
			text:[string], total:[int] (optional)
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
			dl()
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
			description()
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
			heading()
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
			h1()
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
			h2()
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
			h3()
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
			h4()
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
			h5()
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
			i()
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
			italic()
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
			keywords()
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
			mailto()
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
			nl()
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
			o()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Outputs the given string to the screen
		</td>
	</tr>
	<tr>
		<td align="left">
			out()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Outputs the given string to the screen
		</td>
	</tr>
	<tr>
		<td align="left">
			output()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Outputs the given string to the screen
		</td>
	</tr>
	<tr>
		<td align="left">
			p()
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
			paragraph()
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
			pre()
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
			space()
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
			span()
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
			strike()
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
			strong()
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
			tab()
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
			title()
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
			ul()
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
			underline()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string wrapped in &lt;u&gt; tags.
		</td>
	</tr>
</table>

<h2 id="Datasource">Datasource Core Functions</h2>
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
			dataSource()
		</td>
		<td align="center">
			datasource:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a connection to a datasource configured in /app/conf/datasource.php
		</td>
	</tr>
</table>

<h2 id="Debugging">Debugging Core Functions</h2>
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
			debugging()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="left">
			Returns a bottom bar containing information about the current controller, view, 
			load time, post values, get values, and request values.
		</td>
	</tr>
</table>

<h2 id="Form">Form Core Functions</h2>
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
			form()
		</td>
		<td align="center">
			array
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			This is an internally used function that outputs debugging information 
			based on the current controller. The debugging function can be turned on 
			by enabling it within the /app/conf/config.php file.
		</td>
	</tr>
</table>

<h2 id="Logging">Logging Core Functions</h2>
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
			logging()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			This is an internally used function that logs page requests. The logging 
			function can be turned on by enabling it within the /app/conf/config.php file.
		</td>
	</tr>
</table>

<h2 id="View">View Core Functions</h2>
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
			render()
		</td>
		<td align="center">
			text:[string], array
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
			view()
		</td>
		<td align="center">
			text:[string], array
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a view template associated with the current controller. Also takes 
			an array as a second param which makes it possible for values within that array 
			available to the defined view. Also see the render().
		</td>
	</tr>
</table>

<h2 id="Request">Request Core Functions</h2>
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
			domain()
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns the domian name of the current web site/application.
		</td>
	</tr>
	<tr>
		<td align="left">
			get()
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
			ipaddress()
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
			post()
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
			redirect()
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
			request()
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
			uuid()
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

<h2 id="String">String Core Functions</h2>
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
			search_start()
		</td>
		<td align="center">
			needle:[string], haystack:[string], occurrence:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			
		</td>
	</tr>
	<tr>
		<td align="left">
			search_end()
		</td>
		<td align="center">
			needle:[string], haystack:[string], occurrence:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			
		</td>
	</tr>
</table>

<h2 id="Security">Security Core Functions</h2>
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
			xss_clean()
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
	<tr>
		<td align="left">
			remove_tags()
		</td>
		<td align="center">
			text:[string]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Returns a string with HTML tags stripped.
		</td>
	</tr>
	<tr>
		<td align="left">
			isint()
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
			isstring()
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
			isboolean()
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
			isfloat()
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
			isemail()
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
			isipaddress()
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
			isvalid()
		</td>
		<td align="center">
			boolean, email, float, int, ipaddress, string:[text] ,text:[string]
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
			islength()
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
</table>

<?php include '../inc/foot.php' ?>