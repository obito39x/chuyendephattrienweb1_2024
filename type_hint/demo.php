<?php
declare(strict_types=1);

include_once 'I.php';
include_once 'C.php';
include_once 'A.php';
include_once 'B.php';

class Demo {
    // Các phương thức trả về kiểu A
    public function typeA_ReturnA(): A {
        return new A();
    }

    public function typeA_ReturnB(): B {
        return new B();
    }

    public function typeA_ReturnC(): C {
        return new C();
    }
    public function typeA_ReturnI(): I {
        return new class implements I {
            public function f(): void {
                echo "Function f() from anonymous class<br>";
            }
        };
    }

    public function typeA_ReturnNull(): ?A {
        return null;
    }

    // Các phương thức trả về kiểu B
    public function typeB_ReturnA(): A {
        return new A();
    }

    public function typeB_ReturnB(): B {
        return new B();
    }

    public function typeB_ReturnC(): C {
        return new C();
    }
    public function typeB_ReturnI(): I {
        return new class implements I {
            public function f(): void {
                echo "Function f() from anonymous class<br>";
            }
        };
    }

    public function typeB_ReturnNull(): ?B {
        return null;
    }

    // Các phương thức trả về kiểu C
    public function typeC_ReturnA(): A {
        return new A();
    }

    public function typeC_ReturnB(): B {
        return new B();
    }
    public function typeC_ReturnI(): I {
        return new class implements I {
            public function f(): void {
                echo "Function f() from anonymous class<br>";
            }
        };
    }

    public function typeC_ReturnC(): C {
        return new C();
    }


    public function typeC_ReturnNull(): ?C {
        return null;
    }

    // Các phương thức trả về kiểu I
    public function typeI_ReturnA(): A {
        return new A();
    }

    public function typeI_ReturnB(): B {
        return new B();
    }

    public function typeI_ReturnC(): C {
        return new C();
    }
    public function typeI_ReturnI(): I {
        return new class implements I {
            public function f(): void {
                echo "Function f() from anonymous class<br>";
            }
        };
    }

    public function typeI_ReturnNull(): ?I {
        return null;
    }

    // Các phương thức trả về kiểu Null
    public function typeNull_ReturnA(): A {
        return new A();
    }

    public function typeNull_ReturnB(): B {
        return new B();
    }

    public function typeNull_ReturnC(): C {
        return new C();
    }
    public function typeNull_ReturnI(): I {
        return new class implements I {
            public function f(): void {
                echo "Function f() from anonymous class<br>";
            }
        };
    }

    public function typeNull_ReturnNull(): ?A {
        return null;
    }
}

// c. Tao doi tuong demo va goi phuong thuc
$demo = new Demo();
// $a = $demo->typeI_ReturnC();
// $a->f();
$methods = [
    'typeA_ReturnA', 'typeA_ReturnB', 'typeA_ReturnC', 'typeA_ReturnI', 'typeA_ReturnNull',
    'typeB_ReturnA', 'typeB_ReturnB', 'typeB_ReturnC', 'typeB_ReturnI', 'typeB_ReturnNull',
    'typeC_ReturnA', 'typeC_ReturnB', 'typeC_ReturnC', 'typeC_ReturnI', 'typeC_ReturnNull',
    'typeI_ReturnA', 'typeI_ReturnB', 'typeI_ReturnC', 'typeI_ReturnI', 'typeI_ReturnNull',
    'typeNull_ReturnA', 'typeNull_ReturnB', 'typeNull_ReturnC', 'typeNull_ReturnI', 'typeNull_ReturnNull'
];

foreach ($methods as $method) {
    try {
        $result = $demo->$method();
        
        if ($result !== null) {
            echo "Method {$method} returned: True<br>";
        } else {
            echo "Method {$method} returned: False<br>";
        }
    } catch (Exception $e) {
        echo "Method {$method} failed: False<br>";
    }
}