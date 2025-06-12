<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);                     // Listar todas
Route::post('/tasks', [TaskController::class, 'store']);                    // Criar
Route::put('/tasks/{id}/status', [TaskController::class, 'updateStatus']);  // Atualizar status
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);           // Deletar
Route::get('/tasks/status/{status}', [TaskController::class, 'filterByStatus']); // Filtrar por status
Route::put('/tasks/{id}', [TaskController::class, 'update']);
