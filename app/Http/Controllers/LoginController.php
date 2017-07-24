<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Login;

use Session;

class LoginController extends Controller
{
    public function index(){

    }

    public function validate_user(Request $request){

        $username=$request->name;
        $password= $request->pass;



        $check= (new Login)->validate($username,$password);

        if (count($check)>0){

//            echo $check;
            foreach ($check as $value)
            {

                if ($value->client_status == 'Deactive' || $value->client_status == 'Pending' ){

                    echo "<script type=\"text/javascript\" >
				alert(\"Your account isn't Active. Contact Your Service Provider.\");
				window.location=\"/\";
				</script>";
                }
                else{

                    session
                    (
                        [
                            'order' => $value->short_name,
                            'status'=>$value->user_type,
                            'user-id'=>$value->user_id,
                            'user-type'=>$value->user_type,
                            'username'=>$value->username



                        ]
                    );

                    $insert_log= (new Login)->log();
                    return redirect('/Home');

                }
            }
        }
        else{

            //return redirect('/');
            echo "<script type=\"text/javascript\" >
				alert(\"Wrong ID or PASSWORD\");
				window.location=\"/\";
				</script>";
        }

    }
//    public function home(){
//
//                if (session('user-type') == 'Admin')
//                 {
//                     return view('admin.Home');
//                 }
//                if (session('user-type') == 'User')
//                {
//                    return view('user.Home');
//                }
//    }

    public function logout(){

        $logout_log= (new Login)->logout();

        session::flush();
        return redirect('/');

    }

}
