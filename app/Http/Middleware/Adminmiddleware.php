<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   /* protected $redirectTo = 'admin';    */
    public function handle($request, Closure $next)
    {    
        /*dd(Session::get('admin_id'));*/
       /* $val=$request->Session->get('admin_id');
        dd($val->count());*/
     
/*$redirectTo = 'admin'; */
       /* if(count(Session::get('admin_id')) == 0 ) {  return redirect('admin/'); }*/
     /*  dd(Session::has('admin_id'));*/

     /* if(count($request->Session()->exists('admin_id')) == 0 ) {  return redirect('admin_login');  } else {   return $next($request); }*/

      return $next($request);
        
    }
}
