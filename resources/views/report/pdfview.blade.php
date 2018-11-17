<!doctype html>
<html>
	<style type="text/css">
	
        @page {
        header: page-header;
        footer: page-footer;
        }
       table th , td{
        
        padding-left: 0.35em;
        padding-right: 0.35em;
        padding-top: 0.35em;
        padding-bottom: 0.35em;
        vertical-align: top;
        border:1px solid black;
        
        }
        /*table td {
            padding-left: 0.35em;
            padding-right: 0.35em;
            padding-top: 0.35em;
            padding-bottom: 0.35em;
            vertical-align: top;
            border:1px solid black;

        }*/
    </style>
    <body>
       <!-- fund  inward log table  -->
        <htmlpageheader name="page-header">
            Machine Working Report
        </htmlpageheader>
        <hr>
        <h3 style="text-align:center;font-family:Calibri (Body);"> Machine Status Details</h3>
        <div>
            <table style="font-family:Calibri (Body);border-collapse: collapse;" width="100%">
                <thead width="100%">
                    <tr>
                        <th width="10%" style="text-align:center">Sr No.</th>
                        <th width="15%">Machine Name</th>
                        <th width="10%" style="text-align:center">Off Time</th>
                        <th width="10%" style="text-align:center;">On Time</th>
                        <th width="10%" style="text-align:center;">Estimation Hour</th>
                        <th width="10%" style="text-align:center">Actual Hour</th>
                        <th width="15%" style="text-align:center">Reason</th>
                        <th width="20%" style="text-align:center">Message</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($data as $key => $fn)

                    <tr>
                      
                        <td style="text-align:center">{{++$key}}</td>
                        <td style="text-align:center">{{$fn['machine']['name']}}</td>
                        <td style="text-align: center;">{{$fn->created_at}}</td>
                        <td style="text-align:center;">{{$fn->on_time ? $fn->on_time : "-"}}</td>
                        <td style="text-align:center;">
                             @if (count($fn['userEstimation']) > 0)
                                {{$fn['userEstimation'][0]['hour']}}
                            @else
                                {{'-'}}
                            @endif
                        </td>
                        <td style="text-align:center">{{$fn['actual_hour']}}</td>
                        <td style="text-align:center">
                            @if (count($fn['userEstimation']) > 0)
                                {{$fn['userEstimation'][0]['reasonData']['reason']}}
                            @else
                                {{'-'}}
                            @endif
                        </td>
                        <td style="text-align:center">
                            @if (count($fn['userEstimation']) > 0)
                            {{$fn['userEstimation'][0]['msg']}}
                            @else
                                {{'-'}}
                            @endif
                        </td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>

           <htmlpagefooter name="page-footer">
                <hr>
                <span style="text-align: center">{PAGENO}</span>
               <!--  {DATE j-m-Y} -->
            </htmlpagefooter>
    </body>
</html>