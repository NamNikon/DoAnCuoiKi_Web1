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
                 <option value="3" >Date to Date</option>
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
      type="date" name="stt_date2" id="stt_date2" value="{{ date('Y-m-d') }}">
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
                <th>name</th>
                <th class="text-right">price</th>
                <th class="text-right">quantity</th>
                <th class="text-right">total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2018-09-29 05:57</td>
                <td>100398</td>
                <td>iPhone X 64Gb Grey</td>
                <td class="text-right">$999.00</td>
                <td class="text-right">1</td>
                <td class="text-right">$999.00</td>
            </tr>
            <tr>
                <td>2018-09-28 01:22</td>
                <td>100397</td>
                <td>Samsung S8 Black</td>
                <td class="text-right">$756.00</td>
                <td class="text-right">1</td>
                <td class="text-right">$756.00</td>
            </tr>
            <tr>
                <td>2018-09-27 02:12</td>
                <td>100396</td>
                <td>Game Console Controller</td>
                <td class="text-right">$22.00</td>
                <td class="text-right">2</td>
                <td class="text-right">$44.00</td>
            </tr>
            <tr>
                <td>2018-09-26 23:06</td>
                <td>100395</td>
                <td>iPhone X 256Gb Black</td>
                <td class="text-right">$1199.00</td>
                <td class="text-right">1</td>
                <td class="text-right">$1199.00</td>
            </tr>
            <tr>
                <td>2018-09-25 19:03</td>
                <td>100393</td>
                <td>USB 3.0 Cable</td>
                <td class="text-right">$10.00</td>
                <td class="text-right">3</td>
                <td class="text-right">$30.00</td>
            </tr>
            <tr>
                <td>2018-09-29 05:57</td>
                <td>100392</td>
                <td>Smartwatch 4.0 LTE Wifi</td>
                <td class="text-right">$199.00</td>
                <td class="text-right">6</td>
                <td class="text-right">$1494.00</td>
            </tr>
            <tr>
                <td>2018-09-24 19:10</td>
                <td>100391</td>
                <td>Camera C430W 4k</td>
                <td class="text-right">$699.00</td>
                <td class="text-right">1</td>
                <td class="text-right">$699.00</td>
            </tr>
            <tr>
                <td>2018-09-22 00:43</td>
                <td>100393</td>
                <td>USB 3.0 Cable</td>
                <td class="text-right">$10.00</td>
                <td class="text-right">3</td>
                <td class="text-right">$30.00</td>
            </tr>
        </tbody>
    </table>
</div>





 <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</section>