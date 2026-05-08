<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Notificaciones;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       $notificaciones = Notificaciones::paginate();
       $events = Event::paginate();

        return view('dashboard.inicio',compact('notificaciones','events'));
    }
}
