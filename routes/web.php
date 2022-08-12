<?php

use App\Models\Project;
use App\Models\Workexperience;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\EducationsController;
use App\Http\Controllers\ContentBlogsController;
use App\Http\Controllers\WorkexperiencesController;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes    
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'projects' => Project::all(),
        'experiences' => Workexperience::all(),
    ]);
});

// Route::get('/project/{project:slug}', function (Project $project) {
//     return view('project', [
//         'project' => $project
//     ]);
// })->where('project', '[A-z\-]+');

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

//type
Route::get('/console/types/list', [TypesController::class, 'list'])->middleware('auth');
Route::get('/console/types/add', [TypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/types/add', [TypesController::class, 'add'])->middleware('auth');
Route::get('/console/types/edit/{type:id}', [TypesController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/types/edit/{type:id}', [TypesController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/types/delete/{type:id}', [TypesController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

//skills
Route::get('/console/skills/list', [SkillsController::class, 'list'])->middleware('auth');
Route::get('/console/skills/add', [SkillsController::class, 'addForm'])->middleware('auth');
Route::post('/console/skills/add', [SkillsController::class, 'add'])->middleware('auth');
Route::get('/console/skills/edit/{skill:id}', [SkillsController::class, 'editForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/console/skills/edit/{skill:id}', [SkillsController::class, 'edit'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/console/skills/delete/{skill:id}', [SkillsController::class, 'delete'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/console/skills/image/{skill:id}', [SkillsController::class, 'imageForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/console/skills/image/{skill:id}', [SkillsController::class, 'image'])->where('skill', '[0-9]+')->middleware('auth');

//education
Route::get('/console/educations/list', [EducationsController::class, 'list'])->middleware('auth');
Route::get('/console/educations/add', [EducationsController::class, 'addForm'])->middleware('auth');
Route::post('/console/educations/add', [EducationsController::class, 'add'])->middleware('auth');
Route::get('/console/educations/edit/{education:id}', [EducationsController::class, 'editForm'])->where('education', '[0-9]+')->middleware('auth');
Route::post('/console/educations/edit/{education:id}', [EducationsController::class, 'edit'])->where('education', '[0-9]+')->middleware('auth');
Route::get('/console/educations/delete/{education:id}', [EducationsController::class, 'delete'])->where('education', '[0-9]+')->middleware('auth');

//contentblogs
Route::get('/console/contentblogs/list', [ContentBlogsController::class, 'list'])->middleware('auth');
Route::get('/console/contentblogs/add', [ContentBlogsController::class, 'addForm'])->middleware('auth');
Route::post('/console/contentblogs/add', [ContentBlogsController::class, 'add'])->middleware('auth');
Route::get('/console/contentblogs/edit/{contentblog:id}', [ContentBlogsController::class, 'editForm'])->where('education', '[0-9]+')->middleware('auth');
Route::post('/console/contentblogs/edit/{contentblog:id}', [ContentBlogsController::class, 'edit'])->where('education', '[0-9]+')->middleware('auth');
Route::get('/console/contentblogs/delete/{contentblog:id}', [ContentBlogsController::class, 'delete'])->where('education', '[0-9]+')->middleware('auth');


//contentblogs
Route::get('/console/workexperiences/list', [WorkexperiencesController::class, 'list'])->middleware('auth');
Route::get('/console/workexperiences/add', [WorkexperiencesController::class, 'addForm'])->middleware('auth');
Route::post('/console/workexperiences/add', [WorkexperiencesController::class, 'add'])->middleware('auth');
Route::get('/console/workexperiences/edit/{workexperience:id}', [WorkexperiencesController::class, 'editForm'])->where('education', '[0-9]+')->middleware('auth');
Route::post('/console/workexperiences/edit/{workexperience:id}', [WorkexperiencesController::class, 'edit'])->where('education', '[0-9]+')->middleware('auth');
Route::get('/console/workexperiences/delete/{workexperience:id}', [WorkexperiencesController::class, 'delete'])->where('education', '[0-9]+')->middleware('auth');