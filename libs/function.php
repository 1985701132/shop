<?php
/**
 * 加载视图  view('index.index')
 */
function view($file,$data=[])
{
    extract($data);
    include(ROOT.'views/'.$file.'.html');
}