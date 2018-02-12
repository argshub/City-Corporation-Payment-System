<?php

require_once "config.php";

spl_autoload_register(function($class_name){
   require_once(ROOT.DS."classes".DS.$class_name.CLS.EXT);
});

set_include_path(implode(PATH_SEPARATOR, [
    realpath(ROOT.DS.PAGES_DIR),
    realpath(ROOT.DS.CLASSES_DIR),
    realpath(ROOT.DS.CORE_DIR),
    realpath(ROOT.DS.VIEWS_DIR),
    realpath(ROOT.DS.STYLE_DIR),
    realpath(ROOT.DS.TEMPLATE_DIR),
    get_include_path()
]));

