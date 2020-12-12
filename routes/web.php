<?php

use App\Http\Controllers\{AuthenticationController, ChatappController, HrmsController, JobController, PagesController, ProjectController};
use App\Http\Livewire\{Reports, Products, Signatures, Dashboards, Sofs, Documents, Categories, Accounts, Genders, Maritals, JobTitles, Educations, Religions, Units, Companies, Settings, Users};
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


Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function () {

    Route::get('/', Dashboards\Index::class)->name('dashboard.index');
    Route::get('accounts', Accounts\Index::class)->name('accounts.index');
    Route::get('genders', Genders\Index::class)->name('genders.index');
    Route::get('maritals', Maritals\Index::class)->name('maritals.index');
    Route::get('jobtitles', JobTitles\Index::class)->name('jobtitles.index');
    Route::get('educations', Educations\Index::class)->name('educations.index');
    Route::get('religions', Religions\Index::class)->name('religions.index');
    Route::get('units', Units\Index::class)->name('units.index');
    Route::get('companies', Companies\Index::class)->name('companies.index');
    Route::get('settings', Settings\Index::class)->name('settings.index');
    Route::get('users', Users\Index::class)->name('users.index');
    Route::get('categories', Categories\Index::class)->name('categories.index');
    Route::get('products', Products\Index::class)->name('products.index');
    Route::get('documents', Documents\Index::class)->name('documents.index');
    Route::get('sofs', Sofs\Index::class)->name('sofs.index');
    Route::get('signatures', Signatures\Index::class)->name('signatures.index');
    
    Route::get('reports/daily', Reports\Daily::class)->name('reports.daily');

    /* HR */
    Route::get('hrms', function () {
        return redirect('hrms/index');
    });
    Route::get('hrms/index',                      [HrmsController::class, 'index'])->name('hrms.index');
    Route::get('hrms/users',                      [HrmsController::class, 'users'])->name('hrms.users');
    Route::get('hrms/departments',                [HrmsController::class, 'departments'])->name('hrms.departments');
    Route::get('hrms/employee',                   [HrmsController::class, 'employee'])->name('hrms.employee');
    Route::get('hrms/activities',                 [HrmsController::class, 'activities'])->name('hrms.activities');
    Route::get('hrms/holidays',                   [HrmsController::class, 'holidays'])->name('hrms.holidays');
    Route::get('hrms/events',                     [HrmsController::class, 'events'])->name('hrms.events');
    Route::get('hrms/payroll',                    [HrmsController::class, 'payroll'])->name('hrms.payroll');
    Route::get('hrms/accounts',                   [HrmsController::class, 'accounts'])->name('hrms.accounts');
    Route::get('hrms/report',                     [HrmsController::class, 'report'])->name('hrms.report');

    /* Project */
    Route::get('project', function () {
        return redirect('project/index2');
    });
    Route::get('project/index2',                  [ProjectController::class, 'index2'])->name('project.index2');
    Route::get('project/list',                    [ProjectController::class, 'list'])->name('project.list');
    Route::get('project/taskboard',               [ProjectController::class, 'taskboard'])->name('project.taskboard');
    Route::get('project/ticket',                  [ProjectController::class, 'ticket'])->name('project.ticket');
    Route::get('project/ticketdetails',           [ProjectController::class, 'ticketdetails'])->name('project.ticketdetails');
    Route::get('project/clients',                 [ProjectController::class, 'clients'])->name('project.clients');
    Route::get('project/todo',                    [ProjectController::class, 'todo'])->name('project.todo');

    /* Job */
    Route::get('job', function () {
        return redirect('job/index3');
    });
    Route::get('job/index3',                      [JobController::class, 'index3'])->name('job.index3');
    Route::get('job/positions',                   [JobController::class, 'positions'])->name('job.positions');
    Route::get('job/applicants',                  [JobController::class, 'applicants'])->name('job.applicants');
    Route::get('job/resumes',                     [JobController::class, 'resumes'])->name('job.resumes');
    Route::get('job/jobsettings',                 [JobController::class, 'jobsettings'])->name('job.jobsettings');

    /* Authentication  */
    Route::get('authentication', function () {
        return redirect('authentication/login');
    });
    Route::get('authentication/login',              [AuthenticationController::class, 'login'])->name('authentication.login');
    Route::get('authentication/register',           [AuthenticationController::class, 'register'])->name('authentication.register');
    Route::get('authentication/forgotpassword',     [AuthenticationController::class, 'forgotpassword'])->name('authentication.forgotpassword');
    Route::get('authentication/error404',           [AuthenticationController::class, 'error404'])->name('authentication.error404');
    Route::get('authentication/error500',           [AuthenticationController::class, 'error500'])->name('authentication.error500');

    /* Extra pages  */
    Route::get('pages', function () {
        return redirect('pages/search');
    });
    Route::get('pages/search',                      [PagesController::class, 'search'])->name('pages.search');
    Route::get('pages/calendar',                    [PagesController::class, 'calendar'])->name('pages.calendar');
    Route::get('pages/contact',                     [PagesController::class, 'contact'])->name('pages.contact');
    Route::get('pages/filemanager',                 [PagesController::class, 'filemanager'])->name('pages.filemanager');

    /* Chat app  */
    Route::get('chatapp', function () {
        return redirect('chatapp/chat');
    });
    Route::get('chatapp/chat',                      [ChatappController::class, 'chat'])->name('chatapp.chat');
});
