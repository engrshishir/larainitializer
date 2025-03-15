<?php
namespace Engrshishir\Larainitializer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConfigSetup extends Model
{
    use HasFactory;
    protected $fillable=['name','value'];
}
