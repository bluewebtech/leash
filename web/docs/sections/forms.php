<h1>Forms</h1>
<p>
	The Form class helps with generating forms within view templates. The form class supports 
	all the main form attributes and fields. 
</p>

<h2 id="buttons">Buttons</h2>
<p>
	Below is an example of defining buttons using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::button( array( 'name' => 'process', 'value' => 'Process', 'tabindex' => 1 ) );
</code>
</pre>
<h2 id="checkboxes">Checkboxes</h2>
<p>
	Below is an example of defining checkboxes using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::checkbox( array( 'label' => 'Favorite Color:',  'name' => 'color', 'values' => 'Blue, Green, Black, Brown, Orange' ) );
</code>
</pre>

<h2 id="file-fields">File Fields</h2>
<p>
	Below is an example of defining file fields using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::file( array( 'name' => 'stuff', 'multiple' => true, 'tabindex' => 1 ) );
</code>
</pre>

<h2 id="form-tags">Form Tags</h2>
<p>
	Below is an example of defining a form using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::open( array( 'name' => 'contact', 'action' => '', 'method' => 'post', 'enctype' => 'multipart' ) );
Form::close();
</code>
</pre>
<h2 id="hidden-fields">Hidden Fields</h2>
<p>
	Below is an example of defining hidden fields using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::hidden( array( 'name' => 'stuff', 'value' => 'Hammer' ) );
</code>
</pre>

<h2 id="password-fields">Password Fields</h2>
<p>
	Below is an example of defining a password field using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::text( array( 'label' => 'First Name:',  'name' => 'first_name', 'size' => '30', 'value' => '', 'tabindex' => 1 ) );
</code>
</pre>

<h2 id="radio-buttons">Radio Buttons</h2>
<p>
	Below is an example of defining radio buttons using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::radio( array( 'label' => 'Do you like beer?',  'name' => 'beer', 'values' => 'Yes, No' ) );
</code>
</pre>
<h2 id="select-lists">Select Lists</h2>
<p>
	Below is an example of defining a select list using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::select( array( 'label' => 'Gender',  'name' => 'gender', 'values' => 'Male, Female, Alien, Zombie, Moose' ) );
</code>
</pre>
<h2 id="submit-buttons">Submit Buttons</h2>
<p>
	Below is an example of defining submit buttons using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::submit( array( 'name' => 'process', 'value' => 'Process', 'tabindex' => 1 ) );
</code>
</pre>
<h2 id="text-fields">Text Fields</h2>
<p>
	Below is an example of defining a text field using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::text( array( 'label' => 'First Name:',  'name' => 'first_name', 'size' => '30', 'value' => '', 'tabindex' => 1 ) );
</code>
</pre>
<h2 id="textarea-fields">Textarea Fields</h2>
<p>
	Below is an example of defining a textarea field using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::textarea( array( 'label' => 'Comments:',  'name' => 'comments', 'columns' => 50, 'rows' => 10, 'tabindex' => 1 ) );
</code>
</pre>

<h2 id="complete-form">Complete Form</h2>
<p>
	Below is an example of defining a textarea field using the built in Form class.
</p>
<pre>
<code>
&lt;?php 

Form::open( array( 'name' => 'contact', 'action' => '', 'method' => 'post' ) );
	Form::text( array( 'label' => 'First Name:',  'name' => 'first_name', 'size' => '30' ) );
	Form::text( array( 'label' => 'Last Name:',  'name' => 'last_name', 'size' => '30' ) );
	Form::checkbox( array( 'label' => 'Favorite Color:',  'name' => 'color', 'values' => 'Blue, Green, Black, Brown, Orange' ) );
	Form::radio( array( 'label' => 'Do you like beer?',  'name' => 'beer', 'values' => 'Yes, No' ) );
	Form::select( array( 'label' => 'Gender',  'name' => 'gender', 'values' => 'Male, Female, Alien, Zombie, Moose' ) );
	Form::textarea( array( 'label' => 'Comments:',  'name' => 'comments' ) );
	Form::submit( array( 'name' => 'process', 'value' => 'Process' ) );
	Form::hidden( array( 'name' => 'stuff', 'value' => 'Hammer' ) );
Form::close();
</code>
</pre>
<br />