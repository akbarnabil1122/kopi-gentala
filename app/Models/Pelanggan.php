<?php
// Pelanggan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = false;
    protected $rememberTokenName = '';

    protected $fillable = [
        'nama_pelanggan', 'no_telepon', 'email', 'password_hash', 'alamat',
    ];
    protected $hidden = ['password_hash'];

    protected function casts(): array
    {
        return ['password_hash' => 'hashed'];
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'id_pelanggan');
    }

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'id_pelanggan');
    }
}