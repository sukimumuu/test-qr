<?php

namespace App;

class GenerateRandom
{
    function generateRandomString($length) {
        // Daftar karakter yang diinginkan termasuk karakter khusus
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:",.<>?';
        // Mengacak urutan karakter
        $randomString = str_shuffle($characters);
        // Mengambil jumlah karakter yang diinginkan
        return substr($randomString, 0, $length);
    }
    
}
