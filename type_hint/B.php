<?php
declare(strict_types=1);

include_once 'C.php';

class B extends C {
    public function b1(): void {
        echo "This is function b1 from class B.\n";
    }
}