<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $tipoCarteras = array('Vigente', 'Castigada', 'Judicial', 'Especial', 'Provincia', 'Big ticket');
    protected $carteras = array(
        array('id'=>1,'id_proveedor'=>1, 'id_tipo_cartera'=>1, 'cartera'=>'NPLS'),
        array('id'=>2,'id_proveedor'=>2, 'id_tipo_cartera'=>2, 'cartera'=>'Interbank'),
        array('id'=>3,'id_proveedor'=>3, 'id_tipo_cartera'=>3, 'cartera'=>'SCI'),
        array('id'=>4,'id_proveedor'=>3, 'id_tipo_cartera'=>4, 'cartera'=>'Ripley')
    );
    protected $tipo_telefono = array('Fijo', 'Laboral', 'Domicilio', 'Celular', 'Referencia');

    public function run()
    {
        Model::unguard();
        factory('App\Perfil', 4)->create();
        factory('App\Usuario', 30)->create();
        factory('App\Rubro', 7)->create();
        factory('App\Proveedor', 30)->create();
        foreach ($this->tipoCarteras as $elemento) {
            $this->insertTiposCartera($elemento);
        }

        foreach ($this->carteras as $elemento) {
            $this->insertCarteras($elemento);
        }

        factory('App\TiposProducto', 5)->create();
        factory('App\Producto', 5)->create();
        factory('App\Modelos\TipoResultados', 6)->create();
        factory('App\Modelos\Resultado', 9)->create();
        factory('App\Justificacion', 4)->create();
        factory('App\EquipoTrabajo', 35)->create();
        factory('App\TipoDireccion', 4)->create();

        foreach ($this->tipo_telefono as $element) {
            $this->insertTipoTelefono($element);
        }
        factory('App\EquipoTrabajoCartera', 20)->create();
        factory('App\Modelos\TipoContacto', 8)->create();
        factory('App\ProductoCartera', 25)->create(); //<-- Esta línea dío problemas
        factory('App\Modelos\ProductoProveedor', 25)->create();
        factory('App\TipoContactoResultado', 9)->create();
        factory('App\PaletaResultado', 50)->create();
        Model::reguard();
    }


    //***********************************************************************

    public function insertTiposCartera($element){
        \Illuminate\Support\Facades\DB::table('tipos_cartera')->insert([
            'tipo_cartera' => $element,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function insertCarteras($element){
        \Illuminate\Support\Facades\DB::table('carteras')->insert([
            'id_proveedor' => $element["id_proveedor"],
            'id_tipo_cartera' => $element["id_tipo_cartera"],
            'cartera' => $element["cartera"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Ingresamos los segmentos

        \Illuminate\Support\Facades\DB::table('segmentos')->insert([
            'nombre' => "Default",
            'id_cartera' => $element["id"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function insertTipoTelefono($element){
        \Illuminate\Support\Facades\DB::table('tipos_telefono')->insert([
            'tipo_telefono' => $element,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
