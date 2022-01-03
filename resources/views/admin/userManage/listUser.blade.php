<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
 <!-- DATA TABLE -->
 <h3 class="title-5 m-b-35 mr-5 mt-1">USER MANAGE</h3>
<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                 <option value="0" selected="selected">All Role</option>
                 @foreach ($roles as $key)
                 <option value="">{{ $key->role_name }}</option>
                 @endforeach
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
</div>
    

 <div class="table-responsive table-responsive-data2">
     <table class="table table-data2">
         <thead>
             <tr>
                 <th>id</th>
                 <th>name</th>
                 <th>email</th>
                 <th>date</th>
                 <th>role</th>
                 <th>delete</th>
             </tr>
         </thead>
         <tbody>
            @if (@isset($users))
            @foreach ($users as $user)
             <tr class="tr-shadow" id="{{ $user->id }}">
                <td>{{$user->id}}</td> 
                <td>{{$user->name}}</td>
                 <td>
                     <span class="block-email">{{$user->email}}</span>
                 </td>
                 <td>{{$user->created_at}}</td>
                 <td>
                 {{ csrf_field() }}
                    <select name="select" id="select_role" class="my-select form-control">
                        @foreach ($roles as $key)
                        @if ($key->id ==  $user->role )
                            <option value="{{ $user->role }}"
                            selected="selected"
                            >
                        @else 
                        <option value="{{ $key->id}}">
                        @endif
                    {{ $key->role_name }}</option>
                        @endforeach
                    </select>
                 </td>
                 <td>
                     <div class="table-data-feature">
                         <a href="/admin/delete/user/{{$user->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                             <i class="zmdi zmdi-delete"></i>
                        </a>
                     </div>
                 </td>
             </tr>
            @endforeach
            @endif
         </tbody>
     </table>
     {{ $users->links() }}
 </div>
 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>