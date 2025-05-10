<?php

/* use function GuzzleHttp\json_encode; */

function intersect($a, $b) {
    return array_values(array_unique(array_intersect($a, $b)));
}

function equal_set($a, $b) {
    sort($a);
    sort($b);
    return $a === $b;
}

function set_to_str($set) {
    if (empty($set)) return '{}';
    return '{' . implode(',', $set) . '}';
}

function combine($m1, $m2) {
    $result = [];
    $conflict = 0;

    foreach ($m1 as $set1 => $mass1) {
        $s1 = json_decode($set1, true);

        foreach ($m2 as $set2 => $mass2) {
            $s2 = json_decode($set2, true);
            $inter = intersect($s1, $s2);

            if (empty($inter)) {
                $conflict += $mass1 * $mass2;
            } else {
                $key = json_encode($inter);
                if (!isset($result[$key])) {
                    $result[$key] = 0;
                }
                $result[$key] += $mass1 * $mass2;
            }
        }
    }

    // Normalisasi
    $normalized = [];
    $denominator = 1 - $conflict;
    foreach ($result as $set => $value) {
        $normalized[$set] = $value / $denominator;
    }

    return $normalized;
}

// ====== STEP 1: Inisialisasi Gejala & Fungsi Massa =======

// Format: ['set_as_json' => nilai massa]

$m1 = [
    json_encode(["P1", "P2", "P3", "P4"]) => 0.70,  // Θ
    json_encode(["P1", "P2", "P3", "P4", "P5"]) => 0.30,  // theta
];


$m2 = [
    json_encode(["P1", "P2", "P3", "P5"]) => 0.65,
    json_encode(["P1", "P2", "P3", "P5", "P4"]) => 0.35,
];


$m4 = [
    json_encode([ "P2", "P3", "P4"]) => 0.4,
    json_encode(["P2", "P3", "P4"]) => 0.6,
];

q;
/* $m4 = [ */
/*     json_encode(["P1", "P3"]) => 0.5, */
/*     json_encode(["P1", "P2", "P3"]) => 0.5 */
/* ]; */

/* $m1 = [ */
/*     json_encode(["P1", "P2", "P3"]) => 0.4, // theta */
/*     json_encode(["P1", "P2", "P3"]) => 0.6, */
/* ]; */

/* $m2 = [ */
/*     json_encode(["P1", "P2", "P3"]) => 0.4, */
/*     json_encode(["P1", "P2"]) => 0.6, // theta */
/* ]; */

// ====== STEP 2: Proses Kombinasi DST =======
$m3 = combine($m1, $m2);
$m5 = combine($m3, $m4);
/* $final_result = combine($m5, $m6); */

// ====== STEP 3: Tampilkan Hasil =======
echo "=== Hasil Akhir Kombinasi DST ===\n";
foreach ($m3 as $set => $mass) {
    $decoded = json_decode($set, true);
    echo set_to_str($decoded) . " : " . round($mass, 4) . "\n";
}

ubah kode ini agar setiap m adalah object yang berisi P, kemdian m object itu bisa dikalia dengna yg lain (perkalian matrix) ketika nilai beliefnya dikalikan dengan niliai belief object lain, maka jadikan irisan penyakit, jika dikalikan dengan plausibiliity atau theta maka irisan default adalah nilia penyakit m object yang digunakna untuk operan pertam perkalian.

contoh:

m1 = M('P1', 'P2', 'P3', 'P4', belif=0.70, plausibiliity=0.30)
m2 = M('P1', 'P2', 'P3', 'P5', belif=0.65, plausibiliity=0.35)

m3 = m1 * m2

hasil yang diharapkan ketika di rpint

echo "=== Hasil Akhir Kombinasi DST ===\n";
foreach ($m3 as $set => $mass) {
    $decoded = json_decode($set, true);
    echo set_to_str($decoded) . " : " . round($mass, 4) . "\n";
}

{P1,P2,P3} : 0.455
{P1,P2,P3,P4} : 0.245
{P1,P2,P3,P5} : 0.195
{P1,P2,P3,P4,P5} : 0.105
