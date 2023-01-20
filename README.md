
## RestApi
using sanctum package ...
--**composer require laravel/sanctum**
#### Vendor Publish ...
--**php artisan vendor:publish --provider**
Select sanctum service provider ....

#### authenticate api  ..
<p>When you use sanctum package ..laravel will provide middleware just go the kernel  and register the middleware by uncomment the line  </p>

#### migration file create command.
--**php artisan make:migration create_name_table**

then then we migrate this this ....

#### create controller ..
Here we create three controller 
1.**php artisan make:controller BaseController**.
2.**php artisan make:controller Api/RegisterController**.
3.**php artisan make:controller Api/ProductController --resource**.

#### Route 
Here we working with api so we will write route in api.php...
<p>We use here resource route. </p>


#### Using tinker .
*** php artisan tinker  ***.
<p>App\Models\Product::create(['name'=>'My first Product','description'=>'Product description 1'])</p>

#### Resource file 

*** php artisan make:resource ProductResource ***.
We return an array of product ....



#### Some php artisan command ..
*** php artisan server *** .
*** php artisan optimize *** .


#### We are using Postman to check api..


