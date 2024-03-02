<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'sender_depot_id',
        'recipient_depot_id',
        'document_id',
        'sender_id',
        'item_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sender_depot_id' => 'integer',
        'recipient_depot_id' => 'integer',
        'document_id' => 'integer',
        'sender_id' => 'integer',
        'item_id' => 'integer',
    ];

    public function senderDepot(): BelongsTo
    {
        return $this->belongsTo(Depot::class, "sender_depot_id");
    }

    public function recipientDepot(): BelongsTo
    {
        return $this->belongsTo(Depot::class, "recipient_depot_id");
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, "sender_id");
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
