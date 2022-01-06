<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
 <!-- DATA TABLE -->
 <h3 class="title-5 m-b-35 mr-5 mt-1">STATISTIC PURCHAGE</h3>
 
<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select id="selectedMethod" class="js-select2" name="property">
                 <option value="0" selected>Date</option>
                 <option value="1" >Month</option>
                 <option value="2" >Year</option>
                 <option value="3" >Quarterly</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
</div>

<div class="table-data__tool">
    <div class="table-data__tool-left">
      <input style="height: 100%; padding: 0px 10px;border-radius: 3px;color:#666;margin-right:10px;" 
      type="date" name="stt_date1" id="stt_date1" value="{{ date('Y-m-d') }}">
    </div>
</div>

<div class="table-data__tool">
    <div class="table-data__tool-left">
      <input style="height: 100%; padding: 0px 10px;border-radius: 3px;color:#666;margin-right:10px;display:none;" 
      type="number" name="stt_date2" id="stt_date2" value="1"  min="1" max="4">
    </div>
</div>


<div class="table-data__tool">
    <div class="table-data__tool-left">
      <input style="height: 100%; padding: 0px 10px;border-radius: 3px;color:#666;margin-right:10px;display:none;" 
      type="number" name="stt_month" id="stt_month" value="{{ now()->month  }}" min="1" max="12">
    </div>
</div>


<div class="table-data__tool">
    <div class="table-data__tool-left">
      <input style="height: 100%; padding: 0px 10px;border-radius: 3px;color:#666;margin-right:10px;display:none;" 
      type="number" name="stt_year" id="stt_year" value="{{ now()->year  }}" min="1980" max="3000">
    </div>
</div>


<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <button type="button" id="statistic" class="btn btn-primary">Inquiry</button>
        </div>
    </div>
</div>

 <div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning">
        <thead>
            <tr>
                <th>date</th>
                <th>order ID</th>
                <th>address</th>
                <th class="text-right">total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>





 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>