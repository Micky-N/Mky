<?php

namespace App\Http\Controllers;

use App\Events\CategoryEvent;
use App\Listeners\TestCategoryListener;
use App\Models\User;
use App\Notifications\CategoryNotification;
use Core\Controller;
use Core\Facades\View;
use Core\Facades\Route;
use App\Models\Category;
use Core\Notification;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return View::render('categories.index', compact('categories'));
    }

    public function show($category)
    {
        $category = Category::find($category);
        return View::render('categories.show', compact('category'));
    }

    public function new()
    {
        // new
    }

    public function create(array $data)
    {
        Category::create($data);
        return Route::redirectName('categories.index');
    }

    public function edit($category)
    {
        // edit
    }

    public function update($category, array $data)
    {
        $update_category = Category::update($category, $data);
        CategoryEvent::dispatch($update_category, [TestCategoryListener::class, 'update'], ['username' => auth()->username]);
        return Route::redirectName('categories.index');
    }
    
    public function delete($category)
    {
        Category::delete($category);
        return Route::redirectName('categories.index');
    }
}