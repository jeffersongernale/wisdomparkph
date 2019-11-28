<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function dependencies_css($plugin)
{
    //declaration of dependencies
    $data = [];
    $dependency = [
        'datatable'       => '<link href="asset/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">',
        'iziToast'       => '<link href="asset/node_modules/izitoast/dist/css/iziToast.min.css" rel="stylesheet">',
    ];
    //getting the needed dependencies
    foreach ($plugin as $plugin_variable)
    {
        array_push($data, $dependency[$plugin_variable]);
    }
    return $data;
}

function dependencies_script($plugin)
{
    //declaration of dependencies
    $data = [];
    $dependency = [
        // assets/js - folder
        'datatable'       => '<script src="asset/node_modules/datatables.net/js/jquery.datatables.js"></script>
                              <script src="asset/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>',
        'iziToast'      => '<script src="asset/node_modules/izitoast/dist/js/iziToast.min.js"></script>',
        'website_details' => '<script src="asset/scripts/website_details.js"></script>',
        'admin_gallery'   => '<script src="asset/scripts/admin_gallery.js"></script>',
        'admin_events'    => '<script src="asset/scripts/admin_events.js"></script>'
      
    ];

    //getting the needed dependencies
    foreach ($plugin as $plugin_variable)
    {
        array_push($data, $dependency[$plugin_variable]);
    }
    return $data;
}
