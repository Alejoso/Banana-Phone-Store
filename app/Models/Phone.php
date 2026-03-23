<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    /**
     * PHONE ATTRIBUTES
     * $this->attributes['id'] - int - contains the phone primary key (id)
     * $this->attributes['name'] - string - contains the phone name
     * $this->attributes['memory'] - string - contains the phone memory. It also includes the unit of measure. For example kb, mb, gb, etc.
     * $this->attributes['ram'] - string - contains the phone ram. It also includes the unit of measure. For example kb, mb, gb, etc.
     * $this->attributes['battery'] - string - contains the phone battery. It also includes the unit of measure. For example mAh, etc.
     * $this->attributes['brand'] - string - contains the phone brand. For example Samsumg, Apple, Xiaomi, etc.
     * $this->attributes['price'] - int - contains the phone price.
     * $this->attributes['image'] - string - contains the path for a image stored locally.
     * $this->attributes['quantity'] - int - contains the number of phones in that store.
     * $this->attributes['office_id'] - int - contains the associated office id
     * $this->attributes['created_at'] - string - timestamp of creation
     * $this->attributes['updated_at'] - string - timestamp of last update
     * $this->office - Office - contains the associated Office
     */
    protected $fillable = ['name', 'memory', 'ram', 'battery', 'brand', 'price', 'quantity', 'image', 'office_id'];

    // Getters y Setters

    // Id

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    // Name

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    // Memory

    public function getMemory(): string
    {
        return $this->attributes['memory'];
    }

    public function setMemory(string $memory): void
    {
        $this->attributes['memory'] = $memory;
    }

    // Ram

    public function getRam(): string
    {
        return $this->attributes['ram'];
    }

    public function setRam(string $ram): void
    {
        $this->attributes['ram'] = $ram;
    }

    // Battery

    public function getBattery(): string
    {
        return $this->attributes['battery'];
    }

    public function setBattery(string $battery): void
    {
        $this->attributes['battery'] = $battery;
    }

    // Brand

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    // Price

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    // Image

    public function getImage(): ?string
    {
        return $this->attributes['image'] ?? null;
    }

    public function setImage(?string $image): void
    {
        $this->attributes['image'] = $image;
    }

    // Quantity

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    // CreatedAt

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    // UpdatedAt

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    // Office id

    public function getOfficeId(): int
    {
        return $this->attributes['office_id'];
    }

    public function setOfficeId(int $officeId): void
    {
        $this->attributes['office_id'] = $officeId;
    }

    // Relations getters and setters

    public function getOffice(): Office
    {
        return $this->office;
    }

    public function setOffice(Office $office): void
    {
        $this->office = $office;
    }

    // Relations

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function invoiceLines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class);
    }
}
