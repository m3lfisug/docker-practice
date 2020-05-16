<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::debug('StudentController@index');

        echo 'コントローラー';

        $query = Student::query();
        if(empty($request->get('keyword'))) {
            $query = $query->where('name','like','%'.$request->get('keyword').'%');
        }
        if(!empty($request->get('deleted_view'))) {
            $query = $query->whereNull('deleted_at');
        }
        $students = Student::query()->paginate(40);

        return view('student.index',[
            'students' => $students
        ]);
    

        // return view('student.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::debug('StudentController@create');
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 入力条件（入力必須|型|文字数）
        $validationRules = [
            'name' => 'required|string|max:10',
            'age' => 'required|integer|digits_between:1,3',
        ];
        // 入力不十分の時に出る文言
        $validationMessages = [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は10文字以下で入力してください',
            'age.*' => '年齢は3桁以内で必ず入力してください'
        ];
        // $request->validate($validationRules,$validationMessages);

        $validator = Validator::make($request->all(),$validationRules,$validationMessages);
        if (!$validator->passes()) { //passes trueかfalseを返す
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $student = new Student();
            $student->name = $request->get('name');
            $student->age = $request->get('age');
            $student->save();
            Log::info('student created user id : ' . $student->id);
            // with sessionに格納、一度表示したら消える
            return redirect()->route('student.index')->with('success',$student->name . 'を追加しました');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()
                ->withErrors(['システムエラー'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::debug('StudentController@show');

        $query = Student::query();
        $query = $query->where('id', '=', $id);
        $student = $query->first();

        return view('student.show',[
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Log::debug('StudentController@edit');

        $query = Student::query();
        $query = $query->where('id', '=', $id);
        $student = $query->first();

        return view('student.edit',[
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::debug('StudentController@update');

        $validationRules = [
            'name' => 'required|string|max:10',
            'age' => 'required|integer|digits_between:1,3'
        ];
        $validationMessages = [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は10文字以下で入力してください',
            'age.*' => '年齢は3桁以内で必ず入力してください'
        ];
        
        // $request->validate($validationRules,$validationMessages);
        $validator = Validator::make($request->all(),$validationRules,$validationMessages);
        if (!$validator->passes()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $query = Student::query();
            $query = $query->where('id', '=', $id);
            $student = $query->first();

            $student->name = $request->get('name');
            $student->age = $request->get('age');
            $student->save();

            Log::info('student updated user id :' . $student->id);
            return redirect()->route('student.index')->with('success',$student->name . 'を更新しました。');
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return back()
                ->withErrors(['システムエラー'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
