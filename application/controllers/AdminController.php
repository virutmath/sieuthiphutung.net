<?php

class AdminController extends AuthController
{
    public function __construct() {
        parent::__construct();
        //check authen for admin
    }

    public function checkPermission($action) {
        return true;
    }
}