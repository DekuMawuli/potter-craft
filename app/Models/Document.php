<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'depot_id',
        'user_id',
        'filename',
        'sync_endpoint_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'depot_id' => 'integer',
        'user_id' => 'integer',
        'sync_endpoint_id' => 'integer',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function depot(): BelongsTo
    {
        return $this->belongsTo(Depot::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function syncEndpoint(): BelongsTo
    {
        return $this->belongsTo(SyncEndpoint::class);
    }
}
