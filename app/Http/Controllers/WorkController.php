<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;


class WorkController extends Controller


{
    //一覧ページ
    public function index()
    {
        $works = Work::latest()->get();
        return view('works.index', compact('works'));
    }

    //新規作成ページ
    public function create()
    {
        return view('works.create');
    }

    //保存機能
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contents' => 'required',
            'pulldown' => 'required',
            'image_at' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_at')) {
            $image = $request->file('image_at');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;
        } else {
            $imagePath = null;
        }

        $work = new Work;
        $work->title = $request->title;
        $work->contents = $request->contents;
        $work->pulldown = $request->pulldown;
        $work->image_at = $imagePath;
        $work->user_id = Auth::id();
        $work->save();

        return redirect()->route('works.index');
    }

    //詳細ページ
    public function show($id)
    {
        $work = Work::find($id);
        return view('works.show', ['work' => $work]);
    }

    //編集機能
    public function edit($id)
    {
        $work = Work::find($id);
        return view('works.edit', ['work' => $work]);
    }

    //更新機能
    // 更新機能のアップデート
public function update(Request $request, $id)
{
    // 指定された ID の Work レコードを取得
    $work = Work::find($id);

    // フォームから送信されたデータのバリデーションルールの設定
    $request->validate([
        'title' => 'required',
        'contents' => 'required',

        'image_at' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // 画像の保存処理
    if ($request->hasFile('image_at')) {
        $image = $request->file('image_at');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/'.$imageName;
    } else {
        // 新しい画像がアップロードされていない場合は、元の画像パスを使う
        $imagePath = $work->image_at;
    }

    // Work モデルのデータを更新
    $work->title = $request->title;
    $work->contents = $request->contents;
    $work->pulldown = $request->pulldown;
    $work->image_at = $imagePath;
    $work->save();

    // インデックスページへリダイレクト
    return redirect()->route('works.index');
}

    //削除機能
    public function destroy($work)
    {
        $work = Work::find($work);
        $work->delete();
        return redirect()->route('works.index');
    }

    //マイページへの移動function
//     public function mypage()
//     {
//         $works = Work::latest()->get();
//         return view('works.index', compact('works'));
//     }
}
