<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Bank;
use App\Models\Business;
use App\Models\Category;
use App\Models\Colony;
use App\Models\Inventory;
use App\Models\InventoryDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BankSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = Bank::create([
            'name' => 'Caja',
            'amount' => 121209,
            'clabe' => '12345678901234567',
            'type_bank' => 'BBVA',
        ]);
        
        $colony = Colony::create([
            'zipcode' => '63146',
            'name' => 'Lomas Altas',
            'municipality' => 'San Blas',
            'state' => 'Nayarit',
        ]);
        
        $business = Business::create([
            'name' => 'Fruteria',
            'fiscal_name' => 'NA',
            'reason_social' => 'NA',
            'email' => 'email@email.com',
            'fiscal_street' => "Nose",
            'iva' => false,
            'bank_id' => $bank->id,
            'colony_id' => $colony->id,
        ]);
        
        $user = User::create([
            'name' => "Ejemplo",
            'last_name' => "Ejemplo",
            'telephone' => 321654984,
            'email' => "correo@correo.com",
            'password' => Hash::make('12345678'),
            'is_edit' => false,
            'curp' => "COPD990516HNTNRN03",
            'rfc' => "123213123Q2",
            'int' => 12,
            'ext' => 1,
            'status' => "active",
            'type_user' => "Admin",
            'business_id' => $business->id, // Utiliza el business_id real
            'colony_id' => $colony->id, // Utiliza el colony_id real
        ]);

        $area = Area::create([
            'folio' => "FT",
            'name' => "Frutería",
            'business_id' => $business->id,
            'user_id' => $user->id
        ]);

        $inventory = Inventory::create([
            'name' => 'Frutería',
            'area_id' => $area->id
        ]);

        $category = Category::create([
            'name' => 'Fruta',
            'user_id' => $user->id,
            'business_id' => $business->id
        ]);

        $product = Product::create([
            'folio' => "00001",
            'name' => "Manzana",
            'description' => "Manzana roja",
            'measurement' => "pieza",
            'price_shop' => 5.58,
            'price_sale' => 10.50,
            'barcode' => "8029380493824020",
            'category_id' => $category->id,
            'user_id' => $user->id,
            'business_id' => $business->id,
        ]);

        $product = Product::create([
            'folio' => "00001",
            'name' => "Manzana",
            'description' => "Manzana roja",
            'measurement' => "kg",
            'price_shop' => 12.58,
            'price_sale' => 10.50,
            'barcode' => "8029380493824020",
            'category_id' => $category->id,
            'user_id' => $user->id,
            'business_id' => $business->id
        ]);

        InventoryDetail::create([
            'stock' => 1000,
            'product_id' => $product->id,
            'inventory_id' => $inventory->id,
        ]);
        
    }

}
