<?php
namespace Middleware;
use Models\Callback;
class AuthMiddleware{
    private $roles;
    private $auth;
    public function __construct($roles=[],&$auth=null){
        $this->roles=$roles;
        if($auth==null){
            $this->auth=new \Controllers\AuthManager();
        }else{
            $this->auth=&$auth;
        }
    }
    public function __invoke($request, $response, $next){
        $session_key= $request->getHeader('session_key');
        if($session_key==null){
                $callback=new Callback();
                $callback->notok(error_1x8);
                return $response->withJson($callback);
        }
        if($this->auth->loadAuth($session_key)){
            if((!in_array($this->auth->getAuth()->role,$this->roles)) && count($this->roles)>0){
                $callback=new Callback();
                $callback->notok(error_1x7);
                $callback->loaddata(['session_key',$session_key]);
                return $response->withJson($callback);
            }
            return $next($request,$response);
        }else{
            $callback=new Callback();
            $callback->notok(error_1x2);
            $callback->loaddata(['session_key',$session_key]);
            return $response->withJson($callback);
        }
    }
}  