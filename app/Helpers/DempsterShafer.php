<?php

namespace App\Helpers;

class DempsterShafer {


    public array $matrix; // [['P1,P2,P3' => 0.4]]

    public function __construct(array $matrix) {
        $this->matrix = $matrix;
    }


    public function plausibility() {

        $keys = [];
        $plausibility = 1.0;


        // konflik akan dijumlahkan dengan plausibility, oleh karena itu tidak usah kurang 1 dengan set yang konflik
        $this->filterConflict();

        foreach($this->matrix as $row) {
            foreach($row as $key => $value) {
                if($key !== '') {
                    $keys[] = $key;
                    $plausibility -= $value;
                }
            }
        }

        $keys = $this->unionArrays($keys);

        return [$keys => round($plausibility, 6)];


    }

    public function totalBelief() {
        // fungsi untuk mendapatkan total belief dengan menjumlahkan nilii belief setiap set
        $belief = 0.0;

        foreach($this->matrix as $row) {
            foreach($row as $key => $value) {
                $belief += $value;
            }

        }

        return $belief;

    }

    public function filterConflict() {
        $this->matrix = array_filter($this->matrix, function ($item) {
            $key = array_key_first($item);
            return !empty($key); // hanya ambil yang key-nya tidak kosong
        });
    }

    /* contoh */
    /* ['P3', 'P1', 'P2'] -> ['P1', 'P2', 'P3'] */
    private function sortingKey($key) {
        $keys = explode(',', $key);
        sort($keys);
        return implode(',', $keys);
    }

    public function combinate(DempsterShafer $other): DempsterShafer {
        $result = [];

        /* this M x other belif */
        foreach($this->matrix as $row) {
            $set1 = $this->sortingKey(array_key_first($row));
            $set2 = $this->sortingKey(array_key_first($other->matrix[0]));
            $new_belief = array_values($row)[0] * array_values($other->matrix[0])[0];

            $key = $this->intersect($set1, $set2);
            array_push($result, [$key => $new_belief ]);

        }

        // kali plausibility
        $set1 = $this->sortingKey(array_key_first($this->plausibility()));
        $set2 = $this->sortingKey(array_key_first($other->matrix[0]));
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

        $unique = array_unique($all);
        sort($unique);
        return implode(',', $unique);
    }

    private function intersect(string $a, string $b): string {
        $arrA = explode(',', $a);
        $arrB = explode(',', $b);
        $intersect = array_intersect($arrA, $arrB);
        sort($intersect); // opsional: untuk urutan rapi
        return implode(',', $intersect);

    }

    public function getMaxValue() {

        $maxValue = 0;
        $maxKey = '';


        foreach($this->matrix as $row) {

            foreach($row as $key => $value) {
                if($value > $maxValue) {
                    $maxValue = $value;
                    $maxKey = $key;
                }
            }
        }

        return [$maxKey => $maxValue];

    }

}
