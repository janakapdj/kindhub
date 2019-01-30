<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeachersController extends Controller
{
    protected $teacher;

   public function __construct(Teacher $teacher)
   {
       $this->teacher = $teacher;
   }

    public function index()
    {
        return $this->teacher->all();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Create new student
     */
    public function store(Request $request)
    {
        $teacher = [
            'teacher_name' => $request->get('teacher_name')
        ];
        $this->teacher->create($teacher);
        return response()->json('success');
    }

    public function edit($id)
    {
        $teacher = $this->teacher->find($id);
        return response()->json($teacher);
    }

    public function update($id, Request $request)
    {
        $this->teacher->where('id', $id)->update(['teacher_name'=> $request->get('teacher_name')]);
        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $teacher = $this->teacher->find($id);
        $teacher->delete();
        return response()->json('successfully deleted');
    }
}
