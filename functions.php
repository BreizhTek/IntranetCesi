<?php

function view($viewName) {

    if(!empty($viewName))
    {

        $view = __DIR__ . "/view/" . $viewName . ".php";

        if (file_exists($view))
        {
            try
            {
                return include_once ($view);
            }
            catch (Exception $e)
            {
                return false;
            }

        }

    }

    return false;

}