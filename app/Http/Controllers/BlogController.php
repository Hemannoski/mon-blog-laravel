<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function readCategories(): View{
        // $category = Category::all();
        return view('blog.create');
    }

    public function createArticle(Request $request){

        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);


        $category = Category::firstOrCreate([
            'name' => $validateData['categorie']
        ]);

        $validateData['category_id'] = $category->id;

        if ($request->hasFile('image')) {
        
            // $ImageName = time() . '.' . $request->image->extension();

            // $request->image->move(public_path('images'), $ImageName);

            // $validateData['image'] = 'images/' . $ImageName;

            $path = $request->file('image')->store('images', 'public');

            $validateData['image'] = $path;

        }else{
            $validateData['image'] = null;
        }

        $validateData['author_id'] = Auth::id();

        Article::create($validateData);

        return redirect()->route('dashboard')->with('success', 'Bien reçu, votre article a bien été créé avec succès, n\'hésitez pas en créer d\'autres');
    }


    public function dashboardArticle(): View{

        $author = Auth::id();

        $allAuthorArticles = Article::where('author_id', $author)->get();        

        return view('dashboard', ['allAuthorArticles' => $allAuthorArticles,]);
    }

    public function dashboardArticleSingle(mixed $id): View{
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('blog.update', ['article' => $article, 'categories' => $categories]);
    }

    public function destroy(mixed $id){
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('dashboard')->with('delete', 'Article supprimé avec succès!');
    }

    public function update(Request $request, mixed $id){


        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $article = Article::findOrFail($id);

        $validateData['category_id'] = $validateData['categorie_id'];
        unset($validateData['categorie_id']);


        // dd($validateData);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $path = $request->file('image')->store('images', 'public');

            $validateData['image'] = $path;
        }else {
            
            $validateData['image'] = $article->image;
        }

        $article->update($validateData);

        return redirect()->route('dashboard')->with('update', 'Article modifié avec succès!');
    }

    public function index(): View{

        $articles = Article::with('author')->get();

        // dd($articles);

        return view('blog.index', ['articles'=>$articles]);
    }

    public function show(mixed $id): View{

        $article = Article::with(['category', 'author'])->findOrFail($id);

        // dd($article);

        return view('blog.show', ['article'=>$article]);
    }


}
