<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FacebookPage;
use App\Models\InstagramAccount;
use App\Models\Product;
use App\Models\Recommendation;
use App\Models\User;
use App\Models\YouTubeChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'employee') {
            $iduser=Auth::user()->id;
            $user = User::findOrFail($iduser);
            $user->is_approved = true;
            $user->save();
        }
       
            // تحميل كل الفئات لاستخدامها في العرض إذا لزم الأمر
        $categories = Category::all();
        return view('backend.recommendations.index', compact('categories'));
    }











    public function recommend(Request $request)
    {
        $messages = [
            'platforms.required' => 'The platforms field is required.',
            'category_id.required' => 'The category field is required.',


        ];
        $request->validate([
            'platforms' => 'required|array|min:1',
            'category_id' => 'required|exists:categories,id',
        ],$messages);

        $platforms = $request->input('platforms');
        $categoryId = $request->input('category_id');

        if((auth()->user()->customer)!=null){
            // الحصول على الموقع الحالي للمستخدم عبر علاقته مع جدول الزبائن
            $location = auth()->user()->customer->current_location;
        }
        else
        {
            $location = 'حلب';
        }
        $allRecommendations = collect(); // استخدم collection لجمع التوصيات من المنصات المختلفة

        foreach ($platforms as $platform) {
            $recommendations = collect();

            switch ($platform) {
                case 'facebook':
                    $recommendations = FacebookPage::where('category_id', $categoryId)
                        ->where('location', $location)
                        ->orderBy('followers_count', 'desc')
                        ->take(5)
                        ->get();
                    break;

                case 'instagram':
                    $recommendations = InstagramAccount::where('category_id', $categoryId)
                        ->where('location', $location)
                        ->orderBy('followers_count', 'desc')
                        ->take(5)
                        ->get();
                    break;

                case 'youtube':
                    $recommendations = YouTubeChannel::where('category_id', $categoryId)
                        ->where('location', $location)
                        ->orderBy('subscribers_count', 'desc')
                        ->take(5)
                        ->get();
                    break;
            }

            // إضافة توصيات المنصة الحالية إلى القائمة العامة مع توضيح المنصة
            $allRecommendations = $allRecommendations->merge($recommendations->map(function($item) use ($platform) {
                $item->platform = $platform;
                return $item;
            }));
        }

        return view('backend.recommendations.results', compact('allRecommendations'));
    }



}
