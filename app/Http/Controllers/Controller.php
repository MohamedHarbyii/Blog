<?php

namespace App\Http\Controllers;

// ضيف السطر ده عشان تستدعي الميزة
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

// عدّل السطر ده عشان يورث من الـ Controller الأساسي بتاع لارافيل
abstract class Controller extends \Illuminate\Routing\Controller
{
    // وهنا قوله يستخدم الميزة اللي استدعيناها
    use AuthorizesRequests;

}
