<?php

namespace Myapp\Models;

use Frame\Request\Request;

class Something
{

    protected $from;

    /*
     * Use the request object to instantiate this object
     */
    public static function createFromRequest(Request $request)
    {

        $me = new static();
        $me->from = $request->get()->from;

        // Be sure to return
        return $me;

    }

}
