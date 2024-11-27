<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Verifica si el rol ya existe antes de crearlo
        if (!Role::where('name', 'admin')->exists()) {
            $role1 = Role::create(['name' => 'admin']);
        } else {
            $role1 = Role::where('name', 'admin')->first();
        }

        if (!Role::where('name', 'caja')->exists()) {
            $role2 = Role::create(['name' => 'caja']);
        }

        if (!Role::where('name', 'inventario')->exists()) {
            $role3 = Role::create(['name' => 'inventario']);
        }

        $user = User::find(1);
        if ($user && !$user->hasRole('admin')) {
            $user->assignRole($role1);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Opcional: Remueve los roles al revertir la migración
        Role::where('name', 'admin')->delete();
        Role::where('name', 'caja')->delete();
        Role::where('name', 'inventario')->delete();
    }
};
