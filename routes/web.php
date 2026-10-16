<?php

use App\Http\Controllers\JsonparseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuickProductActionsController;
use App\Http\Controllers\CartActionsController;
use Illuminate\Support\Facades\Route;
use App\Livewire\HomeComponent;
use App\Livewire\CartComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\FavouriteComponent;
use App\Livewire\ShopComponent;
use App\Livewire\ProductDetailsComponent;
use App\Livewire\ThankyouComponent;
use App\Livewire\SearchComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\SubCategoryComponent;
use App\Livewire\SubSubCategoryComponent;
use App\Livewire\AboutComponent;
use App\Livewire\ArticlesComponent;
use App\Livewire\ContactsComponent;
use App\Livewire\DeliveryComponent;
use App\Livewire\HitComponent;
use App\Livewire\SaleComponent;
use App\Livewire\NewComponent;
use App\Livewire\ReviewsComponent;
use App\Livewire\ArticleComponent;
use App\Livewire\PrivacyPolicyComponent;
use App\Livewire\LegalInformationComponent;

//ADMIN
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminCategoriesComponent;
use App\Livewire\Admin\AdminEditCategoryComponent;
use App\Livewire\Admin\AdminProductsComponent;
use App\Livewire\Admin\AdminEditProductComponent;
use App\Livewire\Admin\AdminUpdateComponent;
use App\Livewire\Admin\AdminSlidersComponent;
use App\Livewire\Admin\AdminAddSlideComponent;
use App\Livewire\Admin\AdminEditSlideComponent;
use App\Livewire\Admin\AdminArticlesComponent;
use App\Livewire\Admin\AdminAddArticleComponent;
use App\Livewire\Admin\AdminEditArticleComponent;
use App\Livewire\Admin\AdminOrdersComponent;
use App\Livewire\Admin\AdminOrderComponent;
use App\Livewire\Admin\AdminUsersComponent;

//USER
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\User\UserOrdersComponent;
use App\Livewire\User\UserOrderComponent;
use App\Livewire\User\UserProfileComponent;





//Common routes
Route::get('/', HomeComponent::class)->name('home');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/checkout', CheckoutComponent::class)->middleware('auth')->name('checkout');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/favourite', FavouriteComponent::class)->name('favourite');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/product/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/category/{slug}', CategoryComponent::class)->name('category');
Route::get('/category/{slug}/{subcategory_slug}', SubCategoryComponent::class)->name('subcategory');
Route::get('/category/{slug}/{subcategory_slug}/{subsubcategory_slug}', SubSubCategoryComponent::class)->name('subsubcategory');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/articles', ArticlesComponent::class)->name('articles');
Route::get('/contacts', ContactsComponent::class)->name('contacts');
Route::get('/delivery', DeliveryComponent::class)->name('delivery');
Route::get('/hits', HitComponent::class)->name('hits');
Route::get('/sales', SaleComponent::class)->name('sales');
Route::get('/news', NewComponent::class)->name('news');
Route::get('/reviews', ReviewsComponent::class)->name('reviews');
Route::get('/articles/{article_slug}', ArticleComponent::class)->name('article');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('privacy.policy');
Route::get('/legal-information', LegalInformationComponent::class)->name('legal.information');
Route::post('/quick-actions/cart/{slug}', [QuickProductActionsController::class, 'addToCart'])->name('quick-cart.add');
Route::post('/quick-actions/wishlist/{slug}', [QuickProductActionsController::class, 'toggleWishlist'])->name('quick-wishlist.toggle');
Route::post('/cart-actions/increase/{rowId}', [CartActionsController::class, 'increase'])->name('cart-actions.increase');
Route::post('/cart-actions/decrease/{rowId}', [CartActionsController::class, 'decrease'])->name('cart-actions.decrease');
Route::post('/cart-actions/destroy/{rowId}', [CartActionsController::class, 'destroy'])->name('cart-actions.destroy');
Route::post('/cart-actions/destroy-all', [CartActionsController::class, 'destroyAll'])->name('cart-actions.destroy-all');
Route::post('/cart-actions/checkout', [CartActionsController::class, 'checkout'])->name('cart-actions.checkout');




//Admin routes
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin', AdminDashboardComponent::class)->name('admin.dashboard');

    //Categories
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories'); //Get all categories
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory'); //Edit category

    //Products
    Route::get('/admin/products', AdminProductsComponent::class)->name('admin.products'); //Get all products
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct'); //Edit product

    //Update categories and products
    Route::get('/admin/update', AdminUpdateComponent::class)->name('admin.update');

    //Slides
    Route::get('/admin/slides', AdminSlidersComponent::class)->name('admin.slides'); //Get all slides
    Route::get('/admin/slide/add', AdminAddSlideComponent::class)->name('admin.addslide'); //Add slide
    Route::get('/admin/slide/edit/{slide_id}', AdminEditSlideComponent::class)->name('admin.editslide'); //Edit slide

    //Articles
    Route::get('/admin/articles', AdminArticlesComponent::class)->name('admin.articles'); //Get all articles
    Route::get('/admin/article/add', AdminAddArticleComponent::class)->name('admin.addarticle'); //Add article
    Route::get('/admin/article/edit/{article_id}', AdminEditArticleComponent::class)->name('admin.editarticle'); //Edit article

    //Orders
    Route::get('/admin/orders', AdminOrdersComponent::class)->name('admin.orders'); //Get all orders
    Route::get('/admin/orders/{order_id}', AdminOrderComponent::class)->name('admin.orderdetails'); //Get one order

    // USERS
    Route::get('/admin/users', AdminUsersComponent::class)->name('admin.users');

});


//User routes
Route::middleware(['auth', 'role:user'])->group(function(){

    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

    //User orders
    Route::get('/user/dashboard/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/dashboard/order/{order_id}', UserOrderComponent::class)->name('user.order');

    //User profile
    Route::get('/user/dashboard/profile', UserProfileComponent::class)->name('user.profile');

});


require __DIR__.'/auth.php';
//Route::get('/json', [JsonparseController::class, 'upload']);
