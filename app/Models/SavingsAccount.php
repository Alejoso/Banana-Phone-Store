<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavingsAccount extends Model
{
    /**
     * SAVINGS ACCOUNT ATTRIBUTES
     * $this->attributes['id'] - int - contains the savings account primary key
     * $this->attributes['type'] - string - contains the account type
     * $this->attributes['name'] - string - contains the name of the account type
     * $this->attributes['balance'] - bigInt - contains the account balance
     * $this->attributes['user_id'] - int - contains the associated user foreign key
     * $this->attributes['created_at'] - string - contains the creation timestamp
     * $this->attributes['updated_at'] - string - contains the update timestamp
     * $this->user - User - contains the associated user
     */
    protected $fillable = ['type', 'name' , 'balance', 'user_id'];

    // Id

    public function getId(): int
    {
        return $this->attributes['id'];
    }
    
    // Type

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
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

    // Balance

    public function getBalance(): BigInteger
    {
        return BigInteger::of($this->attributes['balance']);
    }

    public function setBalance(BigInteger $balance): void
    {
        $this->attributes['balance'] = $balance;
    }
    
    // User id

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
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

    // Relations getters and setters

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user()->associate($user);
    }

    // Relations

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
