<?php
/**
 * Author: PanOtlet
 */

foreach (glob(INC_ROOT."/app/routes/*.php") as $filename)
{
    require $filename;
}

foreach (glob(INC_ROOT."/app/routes/auth/*.php") as $filename)
{
    require $filename;
}