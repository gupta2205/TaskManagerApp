<?php

use Acme\Services\TaskCreatorService;

class TasksController extends \BaseController {

	protected $taskCreator;

	public function __construct(TaskCreatorService $taskCreator) {
		$this->taskCreator = $taskCreator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Task::with('user')->orderBy('created_at', 'desc')->get();
		$users = User::lists('username', 'id');

		return View::make('tasks.index', compact('tasks', 'users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasks/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
			$this->taskCreator->make(Input::all());
		}
		catch (Acme\Validators\ValidationException $e) {
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		return Redirect::home();
	}

	/**
	 * Display the specified resource.
	 * GET /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::findOrFail($id);
		// return $task;
		return View::make('tasks.show', compact('task'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tasks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$task = Task::find($id);
		$task->completed = Input::get('completed') ? Input::get('completed') : 0;
		$task->save();

		return Redirect::home();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}