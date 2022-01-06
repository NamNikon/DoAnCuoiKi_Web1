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
                 <th>Total</th>
                 <th>Address</th>
                 <th>Customer</th>
                 <th>Status</th>
             </tr>
         </thead>
         <tbody>
        @if (@isset($purchages))
        @foreach ($purchages as $purchage)
        <tr id="{{ $purchage->id }}">
              <td>
                  {{ $purchage->id }}
              </td>
              <td>
                {{ $purchage->total }} VND
              </td>
              <td>
                  {{ $purchage->address }}
              </td>
              <td>
                  {{ $purchage->name }}
              </td>
              <td>
                {{ csrf_field() }}
                    @if (@isset($listStatus))
                    <select name="select" class="my-select form-control select_status">
                        @foreach ($listStatus as $item)
                        @if ($item->id ==  $purchage->status_id )
                            <option value="{{ $purchage->status_id }}"
                            selected="selected"
                            >
                        @else 
                        <option value="{{ $item->id}}">
                        @endif
                    {{ $item->status }}</option>
                        @endforeach
                    </select>
                    @endif
              </td>
          </tr>
        @endforeach
        @endif
         </tbody>
     </table>
     {{ $purchages->render('admin/common/paging') }}
 </div>


 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>