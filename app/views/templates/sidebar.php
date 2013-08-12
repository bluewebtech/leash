<div id="sidebar">
	<ul>
		<li>
			<h2>
				<a href="#">Controllers</a>
			</h2>
			<ul>
			<?php 
			foreach( System::list_controllers() as $key => $value ) {
				echo "<li>\n";
					echo HTML::nl( HTML::ahref( $value, $key ) );
				echo "</li>\n";
			}
			?>
			<h2>
				<a href="#">Models</a>
			</h2>
			<?php 
			foreach( System::list_models() as $key => $value ) {
				echo "<li>\n";
					echo HTML::nl( HTML::ahref( $value, '#' ) );
				echo "</li>\n";
			}
			?>
			<h2>
				<a href="#">Plugins</a>
			</h2>
			<?php 
			foreach( System::list_plugins() as $key => $value ) {
				echo "<li>\n";
					echo HTML::nl( HTML::ahref( $value, '#' ) );
				echo "</li>\n";
			}
			?>
			<h2>
				<a href="#">Services</a>
			</h2>
			<?php 
			foreach( System::list_services() as $key => $value ) {
				echo "<li>\n";
					echo HTML::nl( HTML::ahref( $value, '#' ) );
				echo "</li>\n";
			}
			?>
			<h2>
				<a href="#">Tags</a>
			</h2>
			<?php 
			foreach( System::list_tags() as $key => $value ) {
				echo "<li>\n";
					echo HTML::nl( HTML::ahref( $value, '#' ) );
				echo "</li>\n";
			}
			?>
			</ul>
		</li>
	</ul>
</div>
