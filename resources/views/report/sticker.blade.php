
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
    border-bottom: 1px solid;
}

.table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>th, .table>caption+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>td, .table>thead:first-child>tr:first-child>td {
    border-top: 0;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {

    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
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
    #table td{
            color: black;
            font-weight: 600;
        }
        #table tr{
            font-size: 9px;
        }
</style>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<div>

  <table class="table " id="table">
                          <tbody>
                              @foreach ($json as $key => $value)
                              <tr>
                                @foreach ($value as $k1 => $v1)
                                  <td>
                                       {{@$v1['seriesName']}}{{@$v1['finalId'][0]}}{{@$v1['finalId'][1]}}<br>
                                       {{@$v1['finalId'][2]}}{{@$v1['finalId'][3]}}{{@$v1['finalId'][4]}}{{@$v1['finalId'][5]}}
                                  </td>
                                @endforeach
                              </tr>
                              @endforeach

                          </tbody>
                      </table>
</div>
