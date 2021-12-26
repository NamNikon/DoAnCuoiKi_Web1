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
                 <th>Category</th>
                 <th>Quantity</th>
                 <th>Liked</th>
                 <th>DELETE</th>
             </tr>
         </thead>
         <tbody>
            @if (@isset($products))
            @foreach ($products as $product)
             <tr class="tr-shadow">
                <td>{{$product->id}}</td> 
                <td>{{$product->products_name}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->liked}}</td>
                <td>
                    <div class="table-data-feature">
                        <a href="#" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                       </a>
                    </div>
                </td>
             </tr>
            @endforeach
            @endif
         </tbody>
     </table>
     <div class="form-group">
         <div class="row">
             <div class="col">
                {{ $products->render('admin/common/paging') }}
             </div>
         </div>
        
    </div>
 </div>


 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>