<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'original_price',
        'stock', 'category_id', 'image', 'featured', 'trending',
        'is_exclusive', 'is_in_auction', 'auction_end_time',
        'auction_winner_id', 'auction_claimed', 'auction_cancelled'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'trending' => 'boolean',
        'is_exclusive' => 'boolean',
        'is_in_auction' => 'boolean',
        'auction_claimed' => 'boolean',
        'auction_cancelled' => 'boolean',
        'auction_end_time' => 'datetime',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function auctionWinner()
    {
        return $this->belongsTo(User::class, 'auction_winner_id');
    }

    /**
     * Iniciar subasta para un producto exclusivo
     */
    public function startAuction()
    {
        if (!$this->is_exclusive || $this->stock != 1) {
            return false;
        }

        // Guardar el precio original antes de aplicar el descuento
        $this->original_price = $this->price;
        
        // Aplicar 20% de descuento para el inicio de la subasta
        $this->price = $this->price * 0.8;
        $this->is_in_auction = true;
        $this->auction_end_time = Carbon::now()->addHours(24);
        $this->auction_winner_id = null;
        $this->auction_claimed = false;
        $this->auction_cancelled = false;
        
        return $this->save();
    }

    /**
     * Verificar si la subasta está activa
     */
    public function isAuctionActive()
    {
        return $this->is_in_auction && 
               !$this->auction_cancelled && 
               $this->auction_end_time && 
               Carbon::now()->lt($this->auction_end_time);
    }

    /**
     * Verificar si la subasta ha terminado
     */
    public function isAuctionEnded()
    {
        return $this->is_in_auction && 
               !$this->auction_cancelled && 
               $this->auction_end_time && 
               Carbon::now()->gte($this->auction_end_time);
    }

    /**
     * Obtener el tiempo restante de la subasta
     */
    public function auctionTimeLeft()
    {
        if (!$this->isAuctionActive()) {
            return 'Finalizada';
        }
        
        $diff = Carbon::now()->diff($this->auction_end_time);
        
        if ($diff->days > 0) {
            return $diff->days . 'd ' . $diff->h . 'h';
        }
        if ($diff->h > 0) {
            return $diff->h . 'h ' . $diff->i . 'm';
        }
        return $diff->i . 'm ' . $diff->s . 's';
    }

    /**
     * Obtener el porcentaje de tiempo transcurrido
     */
    public function getAuctionPercentage()
    {
        if (!$this->auction_end_time) {
            return 0;
        }
        
        $total = 24 * 60 * 60; // 24 horas en segundos
        $elapsed = Carbon::now()->diffInSeconds($this->auction_end_time, false);
        
        if ($elapsed <= 0) {
            return 100;
        }
        
        return max(0, min(100, (($total - $elapsed) / $total) * 100));
    }

    /**
     * Finalizar subasta y marcar como vendido/agotado
     */
    public function endAuctionAndRemoveFromCatalog()
    {
        if ($this->auction_winner_id) {
            // Si hay ganador, el stock se reduce a 0 (vendido)
            $this->stock = 0;
        } else {
            // Si no hay ganador, restauramos el precio original y volvemos a 1 unidad
            $this->price = $this->original_price;
            $this->original_price = null;
            $this->stock = 1;
        }
        
        $this->is_in_auction = false;
        $this->auction_end_time = null;
        
        return $this->save();
    }

    /**
     * Cancelar subasta (admin)
     */
    public function cancelAuction()
    {
        $this->is_in_auction = false;
        $this->auction_cancelled = true;
        $this->auction_end_time = null;
        $this->price = $this->original_price;
        $this->original_price = null;
        $this->stock = 1;
        
        return $this->save();
    }

    /**
     * Verificar si hay stock disponible
     */
    public function inStock()
    {
        return $this->stock > 0 && !$this->is_in_auction;
    }

    /**
     * Disminuir stock
     */
    public function decreaseStock($quantity = 1)
    {
        if ($this->stock >= $quantity) {
            $this->stock -= $quantity;
            return $this->save();
        }
        return false;
    }

    /**
     * Scope para productos en oferta
     */
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('original_price')
                     ->whereColumn('price', '<', 'original_price');
    }

    /**
     * Scope para productos exclusivos
     */
    public function scopeExclusive($query)
    {
        return $query->where('is_exclusive', true);
    }

    /**
     * Scope para subastas activas
     */
    public function scopeActiveAuctions($query)
    {
        return $query->where('is_in_auction', true)
                     ->where('auction_cancelled', false)
                     ->where('auction_end_time', '>', Carbon::now());
    }
}
