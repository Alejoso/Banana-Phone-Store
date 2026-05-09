<?php 

namespace App\Http\Resources; 

use Illuminate\Http\Request; 
use Illuminate\Http\Resources\Json\JsonResource; 

class mostPurchasedPhonesResource extends JsonResource 
{ 
    public function toArray(Request $request): array 
    { 
        return [ 
            'id' => $this->getId(), 
            'name' => $this->getName(), 
            'memory' => $this->getMemory(), 
            'ram' => $this->getRam(), 
            'battery' => $this->getBattery(), 
            'brand' => $this->getBrand(), 
            'price' => $this->getPrice(), 
            'quantity' => $this->getQuantity(), 
            'office_id' => $this->getOfficeId(),
            'image' => $this->getImage(),
        ]; 
    } 
} 