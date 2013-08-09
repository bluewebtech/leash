<?php require '../templates/header.php' ?>
<h1>Models</h1>
<p>
	Models are class files that are stored in the models directory located at /app/models/ 
	that have a class name ending with the Model keyword. For instance if you could have a 
	model file called stuff, the class name would then be StuffModel.
</p>
<p>
	Models are typically used for all business logic. What this means is that all processing 
	and database interactions are done within the model and passed back to a controller, then 
	finally the view if necessary. Below is an example of the base structure of a model.
</p>
<pre>
<code>
&lt;?php 

class StuffModel {}
</code>
</pre>
<p>
	Models within the framework do not care what controller is requesting them. If for instance 
	you have a controller called ContactIndex and two models, one called ContactModel and the 
	other StuffModel. You can freely make calls to both the ContactModel and StuffModel at the 
	same time within the same controller or even within the same controller action method. Below 
	is an example of how this would look.
</p>
<pre>
<code>
&lt;?php 

class ContactIndex {
	
	public function index() {
		$contact = ContactModel::all();
		$stuff = StuffModel::all();
	}

}
</code>
</pre>
<p>
	Models are also where ORM objects are defined. Within a model, it is possible to define two 
	public variables. One containing the value of a defined datasource name and the other set 
	to the table name you wish to query. Below is an example of how this would look.
</p>
<pre>
<code>
&lt;?php 

class ContactModel {
	
	public static $dsn = 'Contacts';
	public static $table = 'contacts';

}
</code>
</pre>
<br />
<?php require '../templates/footer.php' ?>
