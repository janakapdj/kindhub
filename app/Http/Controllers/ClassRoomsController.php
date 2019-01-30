<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassRoom;

class ClassRoomsController extends Controller
{
    protected $classRoom;

   public function __construct(ClassRoom $classRoom)
   {
       $this->classRoom = $classRoom;
   }

    public function index()
    {
        return $this->classRoom->with('Teacher')->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Create new class
     */
    public function store(Request $request)
    {
        $class_room = [
            'class_name' => $request->get('class_name'),
            'teacher_id' => $request->get('teacher_id')
        ];
        $this->classRoom->create($class_room);
        return response()->json('success');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * edit class
     */
    public function edit($id)
    {
        $class_room = $this->classRoom->find($id);
        return response()->json($class_room);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * update class room
     */
    public function update($id, Request $request)
    {
        $this->classRoom->where('id', $id)->update(['class_name'=> $request->get('class_name')]);
        return response()->json('successfully updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * delete specific class room
     */
    public function delete($id)
    {
        $class_room = $this->classRoom->find($id);
        $class_room->delete();
        return response()->json('successfully deleted');
    }
}
