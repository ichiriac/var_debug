<?php

include 'debug.php';

class foo {
    private $val1;
    protected $val2;
    public $val3;
    static protected $_instance;
    public function __construct( $from, $name ) {
        $this->val1 = $from;
        $this->val2 = $name;
    }
    public static function getInstance() {
        if ( !self::$_instance ) {
            self::$_instance = new self('from static', 'test');
        }
        return self::$_instance;
    }
}

class bar {
    private $array = array(
        1, true, null, array(
            'key' => 'value'
        ),
'   Lorem ipsum dolor
sit amet, consectetur adipiscing elit.
Praesent ornare urna enim, quis accumsan nulla. 
Cras cursus metus et leo sollicitudin venenatis consequat ligula 
lobortis. Sed id sem eu nisi accumsan fermentum in vel lorem. 
Nullam commodo, ante vitae dictum euismod, metus est posuere libero, 
sed egestas ipsum velit a turpis. Aliquam vulputate convallis arcu, vel 
accumsan urna pretium gravida. Pellentesque posuere lorem quis ligula 
tempor iaculis in ut nunc. Phasellus consectetur pretium ligula, quis 
pulvinar augue adipiscing vitae. Curabitur sit amet ullamcorper est. 
onec semper pulvinar odio, et molestie purus accumsan ut. Aliquam erat 
volutpat. Nunc eget enim arcu, nec venenatis felis.'
    );
}
$static = foo::getInstance();
$instance = new foo('from code', 'bar');
$instance->val3 = new bar();
echo 'without nesting levels <br />';
echo var_debug($instance);

echo 'with nesting levels <br />';
echo var_debug($instance, 2);