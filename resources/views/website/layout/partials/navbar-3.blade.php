 <nav class="navbar navbar-expand-lg main_menu main_menu_3">
     <div class="container">
         @include('components.website.home.logo')
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <i class="far fa-bars menu_icon_bar"></i>
             <i class="far fa-times close_icon_close"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav m-auto">
                 @include('components.website.home.nav-item')
             </ul>
             @include('components.website.home.cart')
         </div>
     </div>
 </nav>
