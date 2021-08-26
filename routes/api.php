<?php

use App\Http\Controllers\SimulasiUpgradeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'SimulasiUpgrade'], function () {
    Route::get('/getData',[SimulasiUpgradeController::class, 'getByNomorKontrak']);
    Route::post('/',[SimulasiUpgradeController::class, 'insertSimulasi']);
    Route::post('/{id}/polisTahunan',[SimulasiUpgradeController::class, 'insertPolisTahunan']);
    Route::post('/{id}/insertMassPolisTahunan',[SimulasiUpgradeController::class, 'insertMassPolisTahunan']);
    Route::get('/getList',[SimulasiUpgradeController::class, 'getListSimulasiUpgrade']);
    Route::get('/{id}/getDetail',[SimulasiUpgradeController::class, 'getDetailSimulasiUpgrade']);
    Route::get('/{id}/printPdf',[SimulasiUpgradeController::class, 'printPdf']);
    Route::post('/{id}/uploadFile',[SimulasiUpgradeController::class, 'uploadFile']);
    Route::post('/{id}/changeStatus',[SimulasiUpgradeController::class, 'changeStatus']);
});
