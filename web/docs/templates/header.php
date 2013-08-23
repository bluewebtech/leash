<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Framework Documentation</title>
	<link rel="stylesheet" type="text/css" href="/docs/assets/css/main/main.css" />
</head>
<body>
	
	<div id="header">
		<div id="navigation">
			<ul>
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<a href="/docs/">Docs</a>
				</li>
				<li>
					<a href="/cli/">CLI</a>
				</li>
			</ul>
		</div>

		<div id="search">
			<form action="search" name="search" id="search" method="post">
				<input type="text" name="search" id="search" value="Search..." />
			</form>
		</div>
		<div id="top">TOP</div>
	</div>

	<div id="container">

		<div id="sidebar">
			<ul>
				<li>
					<h2>
						<a href="/docs/">Home</a>
					</h2>
					<h2>
						<a href="/docs/getting-started">Getting Started</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/getting-started#requirements">&#43; Requirements</a>
						</li>
						<li>
							<a href="/docs/getting-started#installation">&#43; Installation</a>
						</li>
						<li>
							<a href="/docs/getting-started#local-development-setup">&#43; Local Development Setup</a>
						</li>
						<li>
							<a href="/docs/getting-started#framework-workflow">&#43; Framework Workflow</a>
						</li>
						<li>
							<a href="/docs/getting-started#application-name">&#43; Application Name</a>
						</li>
						<li>
							<a href="/docs/getting-started#default-controller">&#43; Default Controller</a>
						</li>
						<li>
							<a href="/docs/getting-started#default-view">&#43; Default View</a>
						</li>
						<li>
							<a href="/docs/getting-started#default-layout">&#43; Default Layout</a>
						</li>
						<li>
							<a href="/docs/getting-started#crud-sample">&#43; CRUD Sample</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/controllers">Controllers</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/controllers#controller-basics">&#43; Controller Basics</a>
						</li>
						<li>
							<a href="/docs/controllers#controller-naming">&#43; Controller Naming</a>
						</li>
						<li>
							<a href="/docs/controllers#controller-default-method">&#43; Controller Default Method</a>
						</li>
						<li>
							<a href="/docs/controllers#controller-method-visibility">&#43; Controller Method Visibility</a>
						</li>
						<li>
							<a href="/docs/controllers/#controller-static-methods">&#43; Controller Static Methods</a>
						</li>
						<li>
							<a href="/docs/controllers#controller-annotations">&#43; Controller Annotations</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/views">Views</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/views#view-basics">&#43; View Basics</a>
						</li>
						<li>
							<a href="/docs/views#action-method-views">&#43; Action Method Views</a>
						</li>
						<li>
							<a href="/docs/views#overriding-views">&#43; Overriding Views</a>
						</li>
						<li>
							<a href="/docs/views#multiple-views">&#43; Multiple Views</a>
						</li>
						<li>
							<a href="/docs/views#values-to-views">&#43; Values to Views</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/models">Models</a>
					</h2>
					<h2>
						<a href="/docs/database">Database</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/database#datasource-configuration">&#43; Datasource Configuration</a>
						</li>
						<li>
							<a href="/docs/database#initializing-a-datasource">&#43; Initializing a Datasource</a>
						</li>
						<li>
							<a href="/docs/database#querying-a-database">&#43; Querying a Database</a>
						</li>
						<li>
							<a href="/docs/database#query-helpers">&#43; Query Helpers</a>
						</li>
						<li>
							<a href="/docs/database/#orm">&#43; ORM</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/file">File</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/file#append">&#43; Append</a>
						</li>
						<li>
							<a href="/docs/file#copy">&#43; Copy</a>
						</li>
						<li>
							<a href="/docs/file#delete">&#43; Delete</a>
						</li>
						<li>
							<a href="/docs/file#move">&#43; Move</a>
						</li>
						<li>
							<a href="/docs/file#rename">&#43; Rename</a>
						</li>
						<li>
							<a href="/docs/file#read">&#43; Read</a>
						</li>
						<li>
							<a href="/docs/file#upload">&#43; Upload</a>
						</li>
						<li>
							<a href="/docs/file#write">&#43; Write</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/forms">Forms</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/forms#buttons">&#43; Buttons</a>
						</li>
						<li>
							<a href="/docs/forms#checkboxes">&#43; Checkboxes</a>
						</li>
						<li>
							<a href="/docs/forms#file-fields">&#43; File Fields</a>
						</li>
						<li>
							<a href="/docs/forms#form-tags">&#43; Form Tags</a>
						</li>
						<li>
							<a href="/docs/forms#hidden-fields">&#43; Hidden Fields</a>
						</li>
						<li>
							<a href="/docs/forms#password-fields">&#43; Password Fields</a>
						</li>
						<li>
							<a href="/docs/forms#radio-buttons">&#43; Radio Buttons</a>
						</li>
						<li>
							<a href="/docs/forms#select-lists">&#43; Select Lists</a>
						</li>
						<li>
							<a href="/docs/forms#submit-buttons">&#43; Submit Buttons</a>
						</li>
						<li>
							<a href="/docs/forms#text-fields">&#43; Text Fields</a>
						</li>
						<li>
							<a href="/docs/forms#textarea-fields">&#43; Textarea Fields</a>
						</li>
						<li>
							<a href="/docs/forms#complete-form">&#43; Complete Form</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/cache">Cache</a>
					</h2>
					<h2>
						<a href="/docs/routes">Routes</a>
					</h2>
					<h2>
						<a href="/docs/string">String</a>
					</h2>
					<h2>
						<a href="/docs/tags">Tags</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/tags#pre-defined-tags">&#43; Pre-defined Tags</a>
						</li>
						<li>
							<a href="/docs/tags#custom-tags">&#43; Custom Tags</a>
						</li>
					</ul>
					<h2>
						<a href="/docs/reference">Reference</a>
					</h2>
					<ul>
						<li>
							<a href="/docs/reference-classes">&#43; Classes</a>
						</li>
						<li>
							<a href="/docs/reference-cli">&#43; CLI</a>
						</li>
						<li>
							<a href="/docs/reference-configuration">&#43; Configuration</a>
						</li>
					</ul>
				</li>
			</ul>							
		</div>

		<div id="content_holder">

			<div id="content">