<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
 <!-- DATA TABLE -->
 <h3 class="title-5 m-b-35 mr-5 mt-1">ADD NEW PRODUCT</h3>
 @if (@isset($msg))
 <h3 class="title-5 m-b-35 mr-5 mt-1">{{ $msg }}</h3>
 @endif
 <div class="table-responsive table-responsive-data2">
    <form action="/admin/product-add-new" method="post" novalidate="novalidate">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="control-label mb-1">Product Name</label>
            <input id="cc-pament" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false">
        </div>
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Category</label>
            @if (@isset($categories))
                <select name="select" id="select_cat" class="my-select form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                    
                </select>
                <input type="hidden" id="catId" name="catId" value="{{ $categories[0]->id }}">
            @endif
            <!-- <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" name="price" type="number" class="form-control cc-exp" min="0">
                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                </div>
                <div class="col">
                    <label for="quantity" class="control-label mb-1">Quantity</label>
                        <input id="quantity" name="quantity" type="number" class="form-control cc-exp" value="" autocomplete="cc-exp"
                        min="0">
                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>     
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="cpu" class="control-label mb-1">CPU</label>
                    <input id="cpu" name="cpu" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>    
                </div>
                <div class="col">
                    <label for="ram" class="control-label mb-1">RAM</label>
                    <input id="ram" name="ram" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>  
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="rom" class="control-label mb-1">ROM</label>
                    <input id="rom" name="rom" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>    
                </div>
                <div class="col">
                    <label for="gpu" class="control-label mb-1">GPU</label>
                    <input id="gpu" name="gpu" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>  
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="screen" class="control-label mb-1">SCREEN</label>
                    <input id="screen" name="screen" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>    
                </div>
                <div class="col">
                    <label for="operating_system" class="control-label mb-1">Operating System</label>  {{-- HỆ ĐIỀU HÀNH --}}
                    <input id="operating_system" name="operating_system" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>  
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="weight" class="control-label mb-1">WEIGHT</label>
                    <input id="weight" name="weight" type="text" class="form-control cc-exp" value="" autocomplete="cc-exp">
                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>    
                </div>
             
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label for="file-input" class="form-control-label">Main Image</label> {{-- CHỌN 1 ẢNH --}}
                    <input type="file" id="file-input" name="file-input" class="form-control-file">
                </div>
               <div class="col-8">
                    <label for="file-input" class="form-control-label">Image Details</label> {{-- CHỌN NHIỀU ẢNH --}}               
                    <input type="file" id="file-input" name="file-input" class="form-control-file">
               </div>
            </div>
        </div>

        <div>
            <button id="payment-button" type="submit" class="btn btn-primary btn-lg btn-block">
                <i class="fa fa-plus"></i>
                <span id="payment-button-amount">Add</span>
                <span id="payment-button-sending" style="display:none;">Sending…</span>
            </button>
        </div>
    </form>
 </div>
 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>