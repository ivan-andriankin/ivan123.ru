<?php
    $title = 'PHP test';
?>

<h3>PHP test</h3>

<?php
class A {
    public $foo = 1;
}

$a = new A;
$b = $a;     // $a и $b - копии одного идентификатора
             // ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo."\n";


$c = new A;
$d = &$c;    // $c и $d - ссылки
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo."\n";

?>