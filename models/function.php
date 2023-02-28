<?php


function hapus($id)
{
    // baca file json todolist
    $jsonFile = '../json/todolist.json';
    // dapatkan file jsonnya
    $bufferJson = file_get_contents($jsonFile);

    // ubah isi json ke array assoc
    $parseJson = json_decode($bufferJson, true);

    foreach ($parseJson as $value => $d) {
        // hapus data berdasarkan id
        if ($d['id'] === $id) {
            array_splice($parseJson, $value, 1);
        }
    }

    // ubahh array ke json
    $parseArray = json_encode($parseJson, JSON_PRETTY_PRINT);
    // simpan  ke dalam json
    $bufferArray = file_put_contents($jsonFile, $parseArray);
    return $bufferArray;
}
function clear($clear)
{
    // baca file json todolist
    $jsonFile = '../json/todolist.json';
    // dapatkan file jsonnya
    $bufferJson = file_get_contents($jsonFile);

    // ubah isi json ke array assoc
    $parseJson = json_decode($bufferJson, true);

    foreach ($parseJson as $value => $d) {
        // hapus data berdasarkan id
        if ($d['key'] === $clear) {
            array_splice($parseJson, $value, );
        }
    }

    // ubahh array ke json
    $parseArray = json_encode($parseJson, JSON_PRETTY_PRINT);
    // simpan  ke dalam json
    $bufferArray = file_put_contents($jsonFile, $parseArray);
    return $bufferArray;
}
