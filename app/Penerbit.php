<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buku;
class Penerbit extends Model
{
    protected $table ='penerbit';
    protected $fillable = ['nama','ISBN','bahasa','tanggalTerbit'];
}
