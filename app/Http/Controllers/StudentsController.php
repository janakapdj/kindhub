<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\ClassRoom;

class StudentsController extends Controller
{
    protected $student;
    protected $classRoom;

    public function __construct(Student $student,ClassRoom $classRoom)
    {
        $this->student = $student;
        $this->classRoom = $classRoom;
    }

    public function index()
    {
        return $this->student->with(['ClassRoom', 'ClassRoom.Teacher'])->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Create new student
     */
    public function store(Request $request)
    {
        $student_data = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'join_year' => $request->get('join_year'),
            'class_room_id' => $request->get('class_room_id')
        ];
        $this->student->create($student_data);
        return response()->json('success');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Edit student
     */
    public function edit($id)
    {
        $result = array();
        $class_rooms = $this->classRoom->all();
        $student = $this->student->find($id);
        $result['student'] = $student;
        $result['class_room'] = $class_rooms;
        return response()->json($result);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Update Student
     */
    public function update($id, Request $request)
    {
        $this->student->where('id', $id)
            ->update([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'gender' => $request->get('gender'),
                'join_year' => $request->get('join_year'),
                'class_room_id' => $request->get('class_room_id')
            ]);
        return response()->json('successfully updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * delete student
     */
    public function delete($id)
    {
        $student = $this->student->find($id);
        $student->delete();
        return response()->json('successfully deleted');
    }
}
