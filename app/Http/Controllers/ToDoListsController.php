<?php
namespace App\Http\Controllers;

use App\Models\ToDoListModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoListsController extends Controller
{
    //-------This is to show to do lists in view---------//

    public function showMain()
    {
        $id        = Auth::id();
        $toDoLists = ToDoListModel::where('app_user_id', $id)->get();

        return view('UserTodoList.MainPage', compact('toDoLists'));

    }

    //---------This is to store to do lists-----------//
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'ToDoList' => 'required',
        ]);

        try {

            $userId   = Auth::id();
            $saveData = ToDoListModel::create([
                'ToDoList'    => $validateData['ToDoList'],
                'app_user_id' => $userId,
            ]);

            if ($saveData) {
                return redirect()->back()->with(['success' => "To Do List"]);
            } else {
                return redirect()->back()->with(['fail' => "To Do List failed to save"]);

            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    //---------This is delete process------//
    public function delete($id)
    {
        $toDo = ToDoListModel::where('id', $id)->first();

        $result = $toDo->delete();

        if ($result) {
            return redirect()->back()->with('success', 'To do list delete successfully!');
        } else {
            return redirect()->back()->with('fail', 'To do list delete fail!');

        }
    }
}
