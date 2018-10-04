
<style>

.table {
    background-color: white;
}
.table {
    width: 100%;
    margin-bottom: 20px;
}
.table-responsive {
    min-height: .01%;
    overflow-x: auto;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
thead {
    color: #2d90ca;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
.table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td {
    padding: 5px;
}
.table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>th, .table>caption+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>td, .table>thead:first-child>tr:first-child>td {
    border-top: 0;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
#id{
  height: 50px;
  width:50px;
}
body{
  font-size: 9px;
}
thead { display: table-row-group; }

.breakNow { page-break-inside:avoid; page-break-after:always; }

@page {
	/* size: 11in 100in; /* <length>{1,2} | auto | portrait | landscape */ */
	      /* 'em' 'ex' and % are not allowed; length values are width height */
 /* <any of the usual CSS values for margins> */
	             /*(% of page-box width for LR, of height for TB) */
	margin-header: 5mm; /* <any of the usual CSS values for margins> */
	margin-footer: 5mm; /* <any of the usual CSS values for margins> */
	marks: /*crop | cross | none*/
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
}
.wrapping-div {
        display: block;
        page-break-inside: avoid !important;
    }

.wrapping-div tbody, .wrapping-div tr, .wrapping-div td, .wrapping-div th {
        page-break-inside: avoid !important;
    }
</style>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<div>
  <div id="tableToExport">
    @foreach ($finalResponse as $key => $value)
    <div id="export-table">
      <div class="table-responsive wrapping-div">
        <table class=" table table-condensed table-bordered"  id="hidden_table">
          <thead class="thead-default">
            <tr>
              <td colspan="15"><h4>Product Id : {{$value["project_id"]}}</h4></td>
            </tr>
            <tr>
              @foreach ($pdfSettingData["selected_columns"] as $key1 => $value1)
                <th style="text-align: center;vertical-align: middle;">{{$value1["column_display_name"]}}</th>
              @endforeach
            </tr>
          </thead>
          @foreach ($value["test_cases"] as $key2 => $value2)
            @if(isset($value2['ActualLength']))
            <tbody class="level1">
              <tr>
                  <td rowspan="{{($value2['mode_length'] * 2) + $value2['ActualLength'] - 2}}">TC#{{$value2['Test Case']}}</td>
                  <td rowspan="{{($value2['mode_length'] * 2)+ $value2['ActualLength'] - 2}}">{{$value2['Test Condition']}}</td>
                  <td rowspan="{{($value2['mode_length'] * 2)+ $value2['ActualLength'] - 2 }}">{{$value2['Valid for Modes']}}</td>
              </tr>
              @foreach ($value2["Mode_data"] as $key3 => $value3)
                <tr>
                  <td rowspan="{{count($value3['Actual']) + 1}}" >{{$value3['mode_name']}}</td>
                  <td rowspan="{{count($value3['Actual']) + 1}}" >{{(isset($value3['Time (ms)'])?$value3['Time (ms)']:0)}}</td>
                  <td rowspan="{{count($value3['Actual']) + 1}}" >{{(isset($value3['Voltage (V)'])?$value3['Voltage (V)']:0)}}</td>
                  <td>Excepted</td>
                  <td> {{(isset($value3['Excepted']['test_point_3_time']) ? $value3['Excepted']['test_point_3_time'] : 0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_4_time'])?$value3['Excepted']['test_point_4_time']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_1_voltage'])?$value3['Excepted']['test_point_1_voltage']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_2'])?$value3['Excepted']['test_point_2']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_3_voltage'])?$value3['Excepted']['test_point_3_voltage']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['number_of_pulse'])?$value3['Excepted']['number_of_pulse']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_4_pulse_high'])?$value3['Excepted']['test_point_4_pulse_high']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_4_pulse_low'])?$value3['Excepted']['test_point_4_pulse_low']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_4_voltage'])?$value3['Excepted']['test_point_4_voltage']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_5'])?$value3['Excepted']['test_point_5']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_6'])?$value3['Excepted']['test_point_6']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_7_V'])?$value3['Excepted']['test_point_7_V']:0)}}</td>
                  <td> {{(isset($value3['Excepted']['test_point_7_V2'])?$value3['Excepted']['test_point_7_V2']:0)}}</td>
                  <td> </td>
                  <td></td>
                </tr>
                @foreach ($value3["Actual"] as $key4 => $value4)
                  <tr>
                    <td>Actual</td>
                    <td> {{$value4['test_point_3_time']}}</td>
                    <td> {{$value4['test_point_4_time']}}</td>
                    <td> {{$value4['test_point_1_voltage']}}</td>
                    <td> {{$value4['test_point_2']}}</td>
                    <td> {{$value4['test_point_3_voltage']}}</td>
                    <td> {{$value4['number_of_pulse']}}</td>
                    <td> {{$value4['test_point_4_pulse_high']}}</td>
                    <td> {{$value4['test_point_4_pulse_low']}}</td>
                    <td> {{$value4['test_point_4_voltage']}}</td>
                    <td> {{$value4['test_point_5']}}</td>
                    <td> {{$value4['test_point_6']}}</td>
                    <td> {{$value4['test_point_7_V']}}</td>
                    <td> {{$value4['test_point_7_V2']}}</td>
                    <td> {{$value4['status']}}</td>
                    <td> {{ explode(' ',$value4["created_at"])[0]}}</td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          @endif
        @endforeach
      </table>
    </div>
    @if((count($finalResponse)-1)>$key)
    <div class="breakNow">

    </div>
    @endif
    @endforeach
  </div>
</div>
