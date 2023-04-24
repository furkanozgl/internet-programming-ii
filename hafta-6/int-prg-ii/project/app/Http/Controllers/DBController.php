<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DBController extends Controller
{
    public function select()
    {
        /*
        $news = DB::select('SELECT * FROM news ORDER BY id DESC');
        */

        $news = News::orderBy('id', 'DESC')->get();

        return view( 'db.select', [
            'news' => $news,
        ]);
    }

    public function category(Request $request, int $id)
    {
        $news = Category::findOrFail($id)
        ->news()
            ->orderBy('id' , 'DESC')
            ->get();

        return view( 'db.select', [
            'category_id' => $id,
            'news' => $news,
        ]);
    }

    public function detail(Request $request, int $id)
    {
        /*
        $newsDetail = DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        */

        $news = News::findOrFail($id);

        Log::info( 'Haber görüntülendi', [
            'id' => $id,
            'ip' => $request->getClientIp(),
        ]);

        return view( 'db.detail', [
            'news' => $news,
        ]);
    }

    public function add()
    {
        /*
        $categories = DB::select( 'SELECT * FROM categories ORDER BY `order` ASC');
        */

        $categories = Category::orderBy('order')->get();

        return view( 'db.add', [
            'categories' => $categories,
        ]);
    }

    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255|unique:news,title',
            'summary' => 'required',
            'content' => 'required|min:40',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);

        if($validator->fails()) {
            return redirect( 'db/add')
                ->withErrors($validator)
                ->withInput();
        }

        /*
        DB::insert( 'INSERT INTO news (category_id, title, summary, content, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?)', [
            $request->get( 'category_id'),
            $request->get( 'title'),
            $request->get( 'summary'),
            $request->get( 'content'),
            Carbon::now()->format( 'Y-m-d H:i:s'),
            Carbon::now()->format( 'Y-m-d H:i:s'),
        ]);
        */

        $news = new News();
        $news->category_id = $request->get( 'category_id');
        $news->title = $request->get( 'title');
        $news->summary = $request->get( 'summary');
        $news->content = $request->get( 'content');
        $news->save();

        return response()->redirectTo( '/db/select');
    }

    public function delete(Request $request, int $id)
    {
        /*
        DB::delete( 'DELETE FROM news WHERE id = ?', [$id]);
        */

        $news = News::findOrFail($id);

        $news->delete();

        return response()->redirectTo( '/db/select');
    }

    public function edit(Request $request, int $id)
    {
        /*
        $newsDetail = DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        */

        $newsDetail = News::findOrFail($id);

        $categories = Category::orderBy('order')->get();

        return view( 'db.edit', [
            'newsDetail' => $newsDetail,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, int $id)
    {


            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5|max:255|unique:news,title',
                'summary' => 'required',
                'content' => 'required|min:40',
                'category_id' => 'required|numeric|exists:categories,id',
            ]);

            if($validator->fails()) {
                return redirect( 'db/edit/' . $id)
                    ->withErrors($validator)
                    ->withInput();
            }

            $news = News::findOrFail($id);

            $news->title = $request->get( 'title');
        $news->summary = $request->get( 'summary');
        $news->content = $request->get( 'content');
        $news->category_id = $request->get( 'category_id');

        /*
        DB::update('UPDATE news SET title = :title, summary = :summary, content = :content, updated_at = :updated_at WHERE id= :id', [
           'title' => $request->get( 'title'),
            'summary'=> $request->get( 'summary'),
            'content'=> $request->get( 'content'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'id' => $id,
        ]);
        */



        return response()->redirectTo( '/db/detail/' . $id);
    }
}
