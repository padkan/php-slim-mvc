<?php

Config::set('site_name','MY-E-SHOP');

Config::set('languages', array('en','fr'));

Config::set('payment_type', array('visa','master'));

// Routes. Route name => method prefix
Config::set('routes', array(
    'default' => '',
    'admin' => 'admin_'
));

//setting different  variant
Config::set('variant', array(
    'color' => 1,
));

Config::set('default_route','default');
Config::set('default_language','en');
Config::set('default_controller','products');
Config::set('default_action','index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'my_shop');

Config::set('salt','w345gvb43eqhjfg');