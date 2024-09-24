<?php 
declare(strict_types=1);

include_once 'I.php';

class C implements I{
    public function f():void {
        echo "Function f() from class C<br>.\n";
    }
}