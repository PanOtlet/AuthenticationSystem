<?php
/**
 * Author: PanOtlet
 */
foreach (glob(INC_ROOT."/app/routes/*.php") as $filename){
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/auth/*.php") as $filename){
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/auth/password/*.php") as $filename){
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/user/*.php") as $filename){
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/admin/*.php") as $filename){
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/errors/*.php") as $filename){
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/account/*.php") as $filename){
    require $filename;
}