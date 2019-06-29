<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinePharmacyUserView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW medicine_pharmacy_user 
            AS
            SELECT
                medicines.id,
                medicines.Medicine_Name,
                medicines.description,
                medicines.Quantity,
                medicines.price,
                medicines.image,
                medicines.created_at,
                pharmacies.PharmacyName,
                pharmacies.City,
                pharmacies.Address,
                pharmacies.DrMobile,
                users.`name`,
                users.email,
                users.role,
                users.RegStatus,
                categories.Category_name
                FROM
                medicines
                INNER JOIN pharmacies ON medicines.Pharmacy_id = pharmacies.id
                INNER JOIN users ON pharmacies.user_id = users.id
                INNER JOIN categories ON medicines.Medi_Category_id = categories.Category_id

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_pharmacy_user_view');
    }
}
