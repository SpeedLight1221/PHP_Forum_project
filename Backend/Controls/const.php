<?php 

define("passReg","/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_#$&@*!:%])[a-zA-Z0-9_#$&@:*!%]+$/");
define("nameReg","/^[a-zA-Z0-9_]+$/");



function _checkPass($pass)
{
    return preg_match(passReg,$pass);
}

function _checkName($name)
{
    return preg_match(nameReg,$name);
}



function _hash($tohash)
{
    return hash('sha256',$tohash);
}

?>