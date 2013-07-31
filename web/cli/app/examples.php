<?php

namespace CLI;

class Examples {

	public static function examples() {
		$examples = <<<EXAMPLES
The following are examples of command usage:
<span class="command">clear</span> ----------------------- <span class="examples">clear</span>
<span class="command">clr</span> ------------------------- <span class="examples">clr</span>
<span class="command">refresh</span> --------------------- <span class="examples">refresh</span>
<span class="command">create-controller</span> ----------- <span class="examples">create-controller zombie</span>
<span class="command">c-ctrl</span> ---------------------- <span class="examples">c-ctrl zombie</span>
<span class="command">create-model</span> ---------------- <span class="examples">create-model zombie</span>
<span class="command">c-mod</span> ----------------------- <span class="examples">c-mod zombie</span>
<span class="command">create-service</span> -------------- <span class="examples">create-service zombie</span>
<span class="command">c-srv</span> ----------------------- <span class="examples">c-srv zombie</span>
<span class="command">create-view</span> ----------------- <span class="examples">create-view controller zombie</span>
<span class="command">c-view</span> ---------------------- <span class="examples">c-view controller zombie</span>
<span class="command">create-unit-test</span> ------------ <span class="examples">create-unit-test zombie</span>
<span class="command">c-unit</span> ---------------------- <span class="examples">c-unit zombie</span>
<span class="command">generate-all</span> ---------------- <span class="examples">generate-all zombie</span>
<span class="command">gen-all</span> --------------------- <span class="examples">gen-all zombie</span>
<span class="command">help</span> ------------------------ <span class="examples">help</span>
<span class="command">?</span> --------------------------- <span class="examples">?</span>
EXAMPLES;
		print $examples . "\n";
	}

}