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
    protected $categoria_gestion = array(
        array('id'=>1,'nombre'=>"Oficina"),
        array('id'=>2,'nombre'=>"Campo"),
    );

    protected $tipo_gestion = array(
        array('id'=>1,'id_categoria_gestion'=>1, "tipo_gestion"=>"Call"),
        array('id'=>2,'id_categoria_gestion'=>1, "tipo_gestion"=>"Predictivo"),
        array('id'=>3,'id_categoria_gestion'=>1, "tipo_gestion"=>"Atención al cliente"),
        array('id'=>4,'id_categoria_gestion'=>2, "tipo_gestion"=>"Campo"),
    );

    protected $menu_base = array(
        array('id_perfil'=>1, "menu"=>"Menu Developer"),
        array('id_perfil'=>2, "menu"=>"Menu Administrador")
    );

    protected $menu_contenedor = array(
        array('id_perfil_menu_contenedor'=>1, "nombre"=>"Generar", "orden"=>1, "nivel"=>1),
        array('id_perfil_menu_contenedor'=>2, "nombre"=>"Paginas", "orden"=>1, "nivel"=>1),
    );

    protected $menu_item = array(
        array('nombre'=>"Crear menú", "url"=>"menu-handle"),
        array('nombre'=>"Paleta de resultados", "url"=>"paleta-resultados"),
    );

    protected $menu_contenedor_item = array(
        array('id_menu_contenedor'=>1, "id_menu_item"=>1),
        array('id_menu_contenedor'=>2, "id_menu_item"=>2),
    );

    protected $tipo_telefono = array('Fijo', 'Laboral', 'Domicilio', 'Celular', 'Referencia');

    public function run()
    {
        Model::unguard();
        factory('App\Perfil', 4)->create();
        factory('App\User', 30)->create();
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

        foreach ($this->categoria_gestion as $element){
            $this->insertCategoriaGestion($element);
        }

        factory('App\PaletaResultado', 50)->create();

        foreach ($this->tipo_gestion as $element){
            $this->insertTipoGestion($element);
        }

        foreach ($this->menu_base as $element){
            $this->insertMenuBase($element);
        }

        foreach ($this->menu_contenedor as $element){
            $this->insertMenuContenedor($element);
        }

        foreach ($this->menu_item as $element){
            $this->insertMenuItem($element);
        }

        foreach ($this->menu_contenedor_item as $element){
            $this->insertMenuContenedorItem($element);
        }


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

    // Categorias de las gestiones
    public function insertCategoriaGestion($element){
        \Illuminate\Support\Facades\DB::table('categoria_gestion')->insert([
            'nombre' => $element["nombre"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Tipos de las gestiones
    public function insertTipoGestion($element){
        \Illuminate\Support\Facades\DB::table('tipo_gestion')->insert([
            'id_categoria_gestion' => $element["id_categoria_gestion"],
            'tipo_gestion' => $element["tipo_gestion"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    # CREACIÓN DE MENUS
    // Menu base
    public function insertMenuBase($element){
        \Illuminate\Support\Facades\DB::table('perfil_menu_contenedores')->insert([
            'id_perfil' => $element["id_perfil"],
            'nombre' => $element["menu"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Menu Contenedor
    public function insertMenuContenedor($element){
        \Illuminate\Support\Facades\DB::table('menus_contenedor')->insert([
            'id_perfil_menu_contenedor' => $element["id_perfil_menu_contenedor"],
            'nombre' => $element["nombre"],
            'orden' => $element["orden"],
            'nivel' => $element["nivel"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Menu Items
    public function insertMenuItem($element){
        \Illuminate\Support\Facades\DB::table('menu_items')->insert([
            'nombre' => $element["nombre"],
            'url' => $element["url"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Menu Contenedor Item
    public function insertMenuContenedorItem($element){
        \Illuminate\Support\Facades\DB::table('menu_contenedor_items')->insert([
            'id_menu_contenedor' => $element["id_menu_contenedor"],
            'id_menu_item' => $element["id_menu_item"],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }


}
