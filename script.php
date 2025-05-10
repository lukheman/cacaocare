<?php

class DempsterShafer {


    public array $matrix; // [['P1,P2,P3' => 0.4]]

    public function __construct(array $matrix) {
        $this->matrix = $matrix;
    }


    public function plausibility() {
        $set = [];
        $plausibility = 1;

        foreach($this->matrix as $row) {
            foreach($row as $key => $value) {
                array_push($set, $key);
                $plausibility -= $value;
            }
        }


        $key = $this->unionArrays($set);

        return [$key => round($plausibility, 6)];


    }


    public function combinate(DempsterShafer $other): DempsterShafer {
        $result = [];

        /* this M x other belif */
        foreach($this->matrix as $row) {
            $set1 = array_key_first($row);
            $set2 = array_key_first($other->matrix[0]);
            $new_belief = array_values($row)[0] * array_values($other->matrix[0])[0];

            $key = $this->intersect($set1, $set2);
            array_push($result, [$key => $new_belief ]);

        }

        // kali plausibility
        $set1 = array_key_first($this->plausibility());
        /* $set2 = array_key_first($other->matrix[0]); */
        $new_belief = array_values($this->plausibility())[0] * array_values($other->matrix[0])[0];
        $key = $this->intersect($set1, $set2);
        array_push($result, [$set2 => $new_belief ]);


        /* this M x other plusibility */
        foreach($this->matrix as $row) {
            $set1 = array_key_first($row);
            $set2 = array_key_first($other->plausibility());
            $new_belief = array_values($row)[0] * array_values($other->plausibility())[0];

            $key = $set1;
            array_push($result, [$key => $new_belief ]);

        }

        // kali plausibility
        /* $set1 = array_key_first($this->plausibility()); */
        /* $set2 = array_key_first($other->plausibility()); */
        /* $new_belief = array_values($this->plausibility())[0] * array_values($other->plausibility())[0]; */
        /* $key = unionArrays([$set1, $set2]); */
        /* array_push($result, [$key => $new_belief ]); */



        $result = $this->normalisasi($result);

        return new DempsterShafer($result);
    }

    private function normalisasi($matrix) {
        // Menjumlahkan
        $summary = [];

        foreach ($matrix as $item) {
            foreach ($item as $key => $value) {
                if (!isset($summary[$key])) {
                    $summary[$key] = 0;
                }
                $summary[$key] += $value;
            }
        }

        // Membentuk ulang ke format yang diminta
        $normalized = [];

        foreach ($summary as $key => $value) {
            $normalized[] = [$key => $value];
        }

        return $normalized;
    }




    private function unionArrays($array) {
        $all = [];
        foreach ($array as $item) {
            $all = array_merge($all, explode(',', $item));
        }
        return implode(',', array_values(array_unique($all)));
    }

    private function intersect(string $a, string $b): string {
        $arrA = explode(',', $a);
        $arrB = explode(',', $b);
        $intersect = array_intersect($arrA, $arrB);
        sort($intersect); // opsional: untuk urutan rapi
        return implode(',', $intersect);

    }

}

$M1 = new DempsterShafer([['P1,P2,P3' => 0.4]]);
$M2 = new DempsterShafer([['P1,P2' => 0.6]]);

$M3 = $M1->combinate($M2);

$M4 = new DempsterShafer([['P2,P3,P4' => 0.4]]);

$M5 = $M3->combinate($M4);

print_r($M5);
