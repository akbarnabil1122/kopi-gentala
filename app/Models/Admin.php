<?php
// Admin.php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;
    protected $rememberTokenName = '';

    protected $fillable = ['nama_admin', 'email', 'password_hash'];
    protected $hidden = ['password_hash'];

    protected function casts(): array
    {
        return ['password_hash' => 'hashed'];
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'id_admin');
    }
}