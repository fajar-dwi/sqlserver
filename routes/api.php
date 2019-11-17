<?php

use Illuminate\Http\Request;
use App\Buku;

Route::get('buku',function() {
    return Buku::paginate(5);
});
