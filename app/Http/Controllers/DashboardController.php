<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Project;
use Auth;
use App\maklonProject;
use \App\Maklon;
use DB;
use \App\File;
use \App\MaklonPkp;
use Carbon;
use Session;
use Mail;
use App\Mail\ResetPkp;
use App\Notifications\NotifyReset;
class DashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('dashboards.index');
    }
}
