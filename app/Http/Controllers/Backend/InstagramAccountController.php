<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InstagramAccount;

class InstagramAccountController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $instagramAccounts = InstagramAccount::with('category')->get();
        return view('backend.instagram_accounts.index', compact('instagramAccounts','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.instagram_accounts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'followers_count' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name' => $request->name,
            'url' => $request->url,
            'description' => $request->description,
            'followers_count' => $request->followers_count,
            'category_id' => $request->category_id,
            'location' => $request->location,

            'image'  =>  $new_name,
        );
       // dd($form_data);

       InstagramAccount::create($form_data);

      //  InstagramAccount::create($request->all());

        return redirect()->route('instagram_accounts.index')->with('success', 'Instagram Account created successfully.');
    }

    public function edit(InstagramAccount $instagramAccount)
    {
        $categories = Category::all();
        return view('backend.instagram_accounts.edit', compact('instagramAccount', 'categories'));
    }

    public function update(Request $request, InstagramAccount $instagramAccount)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'followers_count' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name' => $request->name,
            'url' => $request->url,
            'description' => $request->description,
            'followers_count' => $request->followers_count,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'image'  =>  $new_name,
        );

        $instagramAccount->update($form_data);

        return redirect()->route('instagram_accounts.index')->with('success', 'Instagram Account updated successfully.');
    }

    public function destroy(InstagramAccount $instagramAccount)
    {
        $instagramAccount->delete();
        return redirect()->route('instagram_accounts.index')->with('success', 'Instagram Account deleted successfully.');
    }

    public function filter(Request $request)
    {
        $query = InstagramAccount::query();

        // تحقق من وجود القيم المطلوبة في الطلب
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('min_followers')) {
            $query->where('followers_count', '>=', $request->min_followers);
        }

        if ($request->filled('max_followers')) {
            $query->where('followers_count', '<=', $request->max_followers);
        }
        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }
        $instagramAccounts = $query->with('category')->get();

        // تحميل كل الفئات لاستخدامها في العرض إذا لزم الأمر
        $categories = Category::all();

        return view('backend.instagram_accounts.index', compact('instagramAccounts', 'categories'));
    }


public function show(InstagramAccount $instagramAccount)
{
    $instagramAccount->load('category');
    return view('backend.instagram_accounts.show', compact('instagramAccount'));
}


}
