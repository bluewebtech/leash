<?php

class Help {

	public static function main() {
		$help = <<<HELP
The following commands and short-hands are currently available:
<span class="command">clear</span> or <span class="command">clr</span> : Clears the current CLI window
<span class="command">refresh</span> : Same as the clear command
<span class="command">create-controller</span> or <span class="command">c-ctrl</span> : Creates a new controller
<span class="command">create-model</span> or <span class="command">c-mod</span> : Creates a new model class
<span class="command">create-service</span> or <span class="command">c-srv</span> : Creates a new service
<span class="command">create-unit-test</span> or <span class="command">c-unit</span> : Creates a new unit test
<span class="command">create-view</span> or <span class="command">c-view</span> : Creates a new view
<span class="command">generate-all</span> or <span class="command">gen-all</span> : Creates a new controller, default view, and model class
<span class="command">config help</span> or <span class="command">conf help</span> : Displays config commands
<span class="command">examples</span> or <span class="command">ex</span> : Displays examples of command usage
<span class="command">help</span> or <span class="command">?</span> : Does exactly what you're seeing now
HELP;
		print $help . "\n";
	}

}
