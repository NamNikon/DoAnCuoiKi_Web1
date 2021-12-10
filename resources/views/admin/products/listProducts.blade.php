<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
 <!-- DATA TABLE -->
 <h3 class="title-5 m-b-35 mr-5 mt-1">PRODUCT MANAGE</h3>
 
 <div class="table-responsive table-responsive-data2">
     <table class="table table-data2">
         <thead>
             <tr>
                 <th>id</th>
                 <th>name</th>
                
             </tr>
         </thead>
         <tbody>
            @if (@isset($products))
            @foreach ($products as $product)
             <tr class="tr-shadow">
                <td>{{$product->id}}</td> 
                <td>{{$product->products_name}}</td>
             </tr>
            @endforeach
            @endif
         </tbody>
     </table>
 </div>
 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>