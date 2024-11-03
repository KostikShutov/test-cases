<?php

declare(strict_types=1);

function calculate(): array
{
    $a = 100;
    $b = 200;
    $sum = $a + $b;
    $result = $sum * 2;
    $data = [];

    for ($i = 0; $i < 10000; $i++) {
        $data[] = md5($result . $i);
    }

    return $data;
}

print_r(calculate());
