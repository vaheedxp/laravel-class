<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App;

use DB;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
            if(!Session::has('is_loged_in') || Session::get('is_loged_in')!="3@#546354!2323"):
                 return redirect('/login');
            endif;

            $current_user_id = Session::get('user_id');

            $setting = DB::table("settings")->where('user_id','=',$current_user_id);

            if($setting->count()==0):
                App::setlocale('en');
            else:
                $lang = $setting->value('value');
                App::setlocale($lang);
            endif;
            
            return $next($request);

    }

}
