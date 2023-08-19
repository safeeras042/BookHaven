<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class UpdateBooksTableAutoIncrement extends Migration
{
    public function up()
    {
        // Drop foreign key constraints referencing the books table
        DB::statement('ALTER TABLE purchases DROP FOREIGN KEY purchases_book_id_foreign');

        // Modify the id column in the books table
        DB::statement('ALTER TABLE books MODIFY id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');

        // Recreate the foreign key constraint
        DB::statement('ALTER TABLE purchases ADD FOREIGN KEY (book_id) REFERENCES books(id)');
    }

    public function down()
    {
        // Drop foreign key constraints referencing the books table
        DB::statement('ALTER TABLE purchases DROP FOREIGN KEY purchases_book_id_foreign');

        // Modify the id column back to its original state
        DB::statement('ALTER TABLE books MODIFY id BIGINT NOT NULL');

        // Recreate the foreign key constraint
        DB::statement('ALTER TABLE purchases ADD FOREIGN KEY (book_id) REFERENCES books(id)');
    }
}
