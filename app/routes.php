<?php
/**
 * Author: PanOtlet
 */

foreach (glob(INC_ROOT."/app/routes/*.php") as $filename)
{
    require $filename;
}