<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
// This is the base controller for the application, which includes common traits for authorization, job dispatching, and validation.
// It extends the BaseController provided by Laravel, allowing it to handle requests and responses in a structured way.
// The `AuthorizesRequests` trait is used to handle authorization logic, `DispatchesJobs` is for dispatching jobs to the queue, and `ValidatesRequests` is for validating