<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SkillMatrixRequest;
use App\Repositories\Admin\Level\LevelRepository;
use App\Repositories\Admin\Skill\SkillRepository;
use App\Repositories\Admin\SkillMatrix\SkillMatrixRepository;
use App\Repositories\Admin\User\UserRepository;

class SkillMatrixController extends Controller
{
    protected $levelRepository;
    protected $skillRepository;
    protected $skillMatrixRepository;
    protected $userRepository;

    public function __construct(LevelRepository $levelRepository, SkillRepository $skillRepository, SkillMatrixRepository $skillMatrixRepository, UserRepository $userRepository)
    {
        $this->levelRepository = $levelRepository;
        $this->skillRepository = $skillRepository;
        $this->skillMatrixRepository = $skillMatrixRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.skillMatrix.index', [
            'skillMatrixs' => $this->skillMatrixRepository->paginate(),
            'skills' => $this->skillRepository->getAll(),
            'levels' => $this->levelRepository->getAll(),
            'users' => $this->userRepository->getAll(),

       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skillMatrix.form', [
            'skill' => $this->skillRepository->getAll(),
            'level' => $this->levelRepository->getAll(),
            'user' => $this->userRepository->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillMatrixRequest $request)
    {
        $this->skillMatrixRepository->save($request->validated());
        return redirect()->route('admin.skillMatrix.create')->with(
            'Success',
            'Create success'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$skillMatrix = $this->skillMatrixRepository->findById($id)) {
            abort(404);
        }

        return view('admin.skillMatrix.form', [
            'skillMatrixs' => $skillMatrix,
            'skills'=> $this->skillRepository->getAll(),
            'levels'=> $this->levelRepository->getAll(),
            'users'=> $this->userRepository->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillMatrixRequest $request, $id)
    {
        $this->skillMatrixRepository->save($request->validated(), ['id' => $id]);
        return redirect()->route('admin.skillMatrix.index')->with(
            'Success',
            'Update Success'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->skillMatrixRepository->deleteById($id);
        return redirect()->route('admin.skillMatrix.index')->with(
            'Success',
            'Delete success'
        );
    }
}
