## NOTE: Copy the assets folder from 'public/backend/custom-menu' and paste it into your public directory..

## CustomMenu Setup
````
php artisan module:migrate CustomMenu
php artisan module:seed CustomMenu

````

## Add your default menu item to the DefaultMenusEnum array
Navigate to `Modules/CustomMenu/app/Enums`, then open the file named `DefaultMenusEnum` and add your item.


## Using Model Class

#### menu item list by menu name 
````
$menu = Menus::where('name','Test Menu')->first();

````
#### menu item list by menu id 
````
$menu = Menus::find(1);

````
#### or get menu by name and the items with EAGER LOADING 
````
$menu = Menus::where('name','Test Menu')->with('items')->first();

````
#### or get menu by name and the items with EAGER LOADING 
````
$menu = Menus::where('id', 1)->with('items')->first();

````
#### you can access by model result
````
$public_menu = $menu->items;

````
#### or you can convert it to array
````
$public_menu = $menu->items->toArray();

````


## Or using helper

#### menu item list by menu slug 
````
menuGetBySlug('test-menu')

````
#### menu item list by menu id 
````
menuGetById(1);

````

## Now inside your blade template file place the menu using this simple example

#### Using Helper  
````
$public_menu = menuGetBySlug('test-menu'); //return array

````