<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use App\Models\Permission;
use App\Models\Allowedmethod;

class PermissionController extends Controller
{



    public function __construct()
    {   

        // vartotojas turi teise perziureti, kurti, neturi teises redaguoti ir trinti
        //(tarpininko pavadinmas: teise pavadinasm, ['only'] => ['metodai kuriuos gali pasiekti teise turintis zmogus'])
        
        $permissions = Permission::where('name', 'like', 'permission-%')->get();
        
        foreach($permissions as $permission) {    
            if(!empty($permission->permissionsAllowedmethods->pluck('name')->toArray())) 
            {
                $this->middleware("permission:$permission->name",['only' => $permission->permissionsAllowedmethods->pluck('name')->toArray()]);
            }
        }
        
        // n+1
        //Permissions
        //permission-view
        // permission-create
        //...
        //MEtodu sarasas buna duomenu bazeje
        //index, create, store, edit, update, destroy, search, searchAjax

        //Cia jau kas vyksta ne kode?
        // permission-view - Method index()
        // permission-create = Method create(), store()


        // $permissions = Permission::all();

        // $allowed_methods = $permissions -> permissionsMehods();
        // foreach($permissions as $permission) {
        //     foreach($allowed_methods as $method) {
        //         $this->middleware("permission:$permission", ['only' => [$method]]);
        //     }
        // }

    }

    public function searchAjax() {

    }

    public function search() {
        return view('permissions.search');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        // dd($permissions);
        return view('permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()


    
    {

        $allowedmethods = Allowedmethod::all();
        return view('permissions.create', ['allowedmethods' => $allowedmethods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();

        //mum nereikia id, ir mums nereikia guard_name
        $permission->name = $request->name;
        $permission->save();

    
        $permission->permissionsAllowedmethods()->attach($request->allowedmethods);

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show(User $user)
    // kai naudojame koki nors paketa is composer. Reiketu eiti per id o ne per visa objekta
    // del nezinojimo? mes nezinome ar modelis yra paruostas elgtis kaip objektas
    public function show($id)
    {
        $permission = Permission::find($id);

        return view('permissions.show', ['permission' => $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        $allowedmethods = Allowedmethod::all();
        return view('permissions.edit', ['permission' => $permission, 'allowedmethods' => $allowedmethods]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();
        $permission->permissionsAllowedmethods()->detach();
        $permission->permissionsAllowedmethods()->attach($request->allowedmethods);


        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $permission->permissionsAllowedmethods()->detach();

        return redirect()->route('permissions.index');
    }


    public function __destruct(){

        // $this->middleware('auth'); ?????//
        //teisiur roliu modulis turi savyje cache
    }
    
}
