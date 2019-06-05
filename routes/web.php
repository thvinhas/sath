<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Cursos Routes
 */
Route::resource('cursos', 'CursoController');

/*
 * Semestres Routes
 */
Route::resource('semestres', 'SemestreController');

/*
 * Turnos Routes
 */
Route::resource('turnos', 'TurnoController');

/*
 * Perguntas Routes
 */
Route::resource('perguntas', 'PerguntasController');

/*
 * Turmas Routes
 */
Route::resource('turmas', 'TurmaController');

/*
 * Projetos Routes
 */
Route::resource('projetos', 'ProjetoController');
Route::get('projetos-professor-edit', ['as' => 'projetos.professorEdit', 'uses' =>'ProjetoController@projetoProfessorEdit']);
Route::patch('projetos-professor-update', ['as' => 'projetos.professorUpdate', 'uses' =>'ProjetoController@projetoProfessorUpdate']);
Route::get('questionario-resposta', ['as' => 'questionario.respostas', 'uses' =>'QuestionarioController@questionarioResposta']);
Route::get('relatoriosProjetos', ['as' => 'turma.relatorio', 'uses' =>'TurmaController@relatorio']);
Route::get('relatoriosProjetos', ['as' => 'turma.getDados', 'uses' =>'QuestionarioController@getDados']);
Route::get('relatoriosQuestionario', ['as' => 'questionario.relatorio', 'uses' =>'QuestionarioController@relatorio']);
Route::post('Salvar-Resposta', ['as' => 'questionario.respostas-salvar', 'uses' =>'QuestionarioController@questionarioRespostaSalvar']);

/*
 * Questionarios Routes
 */
Route::resource('questionarios', 'QuestionarioController');
