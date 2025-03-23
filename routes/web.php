<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;

// ✅ الصفحات العامة المفتوحة للجميع
Route::get('/', function () {
    return view('welcome');
});

Route::get('/multable', function () {
    $j = 6;
    return view('multable', compact('j'));
});

Route::get('/even', function () {
    return view('even');
});

Route::get('/prime', function () {
    return view('prime');
});

Route::get('/minitest', function () {
    $bill = [
        ['item' => 'jam', 'quantity' => 5, 'price' => 12.50],
        ['item' => 'tea', 'quantity' => 15, 'price' => 12.50],
        ['item' => 'banana', 'quantity' => 22, 'price' => 12.50],
        ['item' => 'rice', 'quantity' => 50, 'price' => 12.50],
    ];
    return view('minitest', compact('bill'));
});

Route::get('/transcript', function () {
    $student = [
        'name' => 'Omar',
        'id' => '1234',
        'department' => 'Computer Science',
        'GPA' => '3.5',
        'courses' => [
            ['code' => 'CS101', 'name' => 'Object Oriented Programming', 'grade' => 'A+'],
            ['code' => 'CS102', 'name' => 'Data Structures', 'grade' => 'A'],
            ['code' => 'CS103', 'name' => 'Algorithms', 'grade' => 'A-'],
            ['code' => 'CS104', 'name' => 'Database Systems', 'grade' => 'B+'],
        ]
    ];
    return view('transcript', compact('student'));
});

Route::get('/products', function () {
    $products = [
        ['name' => 'Laptop', 'image' => 'images/laptop.jpg', 'price' => 1200, 'description' => 'Powerful laptop'],
        ['name' => 'Phone', 'image' => 'images/phone.jpg', 'price' => 800, 'description' => 'Latest smartphone'],
        ['name' => 'Headphones', 'image' => 'images/headphones.jpg', 'price' => 150, 'description' => 'Noise cancelling headphones'],
    ];
    return view('products', compact('products'));
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/calculate-gpa', function () {
    $courses = [
        ['code' => 'CS101', 'title' => 'Computer Science', 'credit' => 3],
        ['code' => 'MATH201', 'title' => 'Calculus', 'credit' => 4],
        ['code' => 'PHYS101', 'title' => 'Physics', 'credit' => 3],
    ];
    return view('calculate-gpa', compact('courses'));
});

// ✅ صفحات تتطلب تسجيل الدخول
Route::middleware(['auth'])->group(function () {
    Route::resource('grades', GradeController::class);

    // صفحة البروفايل للمستخدمين
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [UserProfileController::class, 'changePassword'])->name('profile.change-password');
});

// ✅ المستخدم العادي يستطيع رؤية المستخدمين لكن لا يمكنه التعديل أو الحذف
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'show']);
});

// ✅ الموظف يمكنه تعديل بيانات المستخدمين فقط
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
});

// ✅ المسؤول (Admin) لديه صلاحية كاملة لإدارة المستخدمين والأدوار
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['index', 'show']);
    Route::resource('roles', RoleController::class);
});

// ✅ تسجيل الدخول والتسجيل
Auth::routes();

// ✅ الصفحة الرئيسية بعد تسجيل الدخول
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
