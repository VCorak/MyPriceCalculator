<?php
declare(strict_types = 1);

class InfoController // DO NOT NEED THIS PAGE, CAN DELETE IT
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/info.php';
    }
}
