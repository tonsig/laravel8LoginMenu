<?php
namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\NivelUsuario;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $usuario 	= $request->usuario;
        $senha   	= $request->senha;
        $senhaCrypt	= md5($senha);
        $usuarios = Usuario::where('email', '=', $usuario)->where('senha', '=', $senhaCrypt)->first();
		if(@$usuarios->id == null) {
	        $usuarios = Usuario::where('cpf', '=', $usuario)->where('senha', '=', $senhaCrypt)->first();
		}
		if(@$usuarios->id != null){
					$nivel = NivelUsuario::find(@$usuarios->nivelUsuarios_id);
//					$menu  = Menu::orderBy('idMenuPai', 'ordem')->get();

					$menus = DB::table('menus')                  
								->join('usamenus','usamenus.Menus_id','menus.id')
								->where('usamenus.NivelUsuarios_id', @$usuarios->nivelUsuarios_id )
								->where('usamenus.ativo', '1')  
								->where('menus.ativo', '1')    			  
								->orderBy('menus.idMenuPai','asc')
								->orderBy('menus.ordem', 'asc')								
								->select('menus.*')
								->get();
							
//								->toSql();   // para ver a frase montada
//					echo $menus[0]->ativo;
//					dd($menus);
//					exit();

					if(@$nivel == null) $nivel->nome = 'aluno';
					session()->put('id_usuario', $usuarios->id);
					session()->put('nome_usuario', $usuarios->nome);
/*					
					@session_start();
					$_SESSION['id_usuario'] 	= $usuarios->id;
					$_SESSION['nome_usuario'] 	= $usuarios->nome;
					$_SESSION['nivel_usuario'] 	= $nivel->nome;
					$_SESSION['cpf_usuario'] 	= $usuarios->cpf;
					$_SESSION['email_usuario'] 	= $usuarios->email;
*/
					return view('menu', compact('menus'));             
            
		}
		else {
				echo "<script language='javascript'>alert('Dados Incorretos')</script>";
				return view('login');
			}
    
    }

    public function logout(){
        @session_start();
        @session_destroy();
        return view('login');
    }


}
