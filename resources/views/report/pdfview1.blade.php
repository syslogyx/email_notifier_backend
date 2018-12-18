<!doctype html>
<html>
	<style type="text/css">
        @page {
            header: page-header;
            footer: page-footer;
            /*margin-top: 100px;*/
            /*margin-bottom: 10px;*/
        }
        /*.page-break {
            page-break-after: always;
            box-decoration-break: slice;
            page-break-inside:avoid;
        }*/
       table th , td{
            padding-left: 0.35em;
            padding-right: 0.35em;
            padding-top: 0.35em;
            padding-bottom: 0.35em;
            vertical-align: top;
            border:1px solid black;
        }
    </style>
    <body>
        <htmlpageheader name="page-header">
            Machine Working Report
        </htmlpageheader>
        <hr>
        <h3 style="text-align:center;font-family:Calibri (Body);"> Machine Status Details</h3>
        <div class="page-break">
            <table style="font-family:Calibri (Body);border-collapse: collapse;" width="100%">
                <thead width="100%">
                    <tr>
                        <th width="7%" style="text-align:center">Sr No.</th>
                        <th width="15%" style="text-align:center">Machine Name</th>
                        <th width="13%" style="text-align:center">Off Time</th>
                        <th width="13%" style="text-align:center;">On Time</th>
                        <th width="14%" style="text-align:center;">Estimation Hour</th>
                        <th width="11%" style="text-align:center">Down Time</th>
                        <th width="13%" style="text-align:center">Reason</th>
                        <th width="14%" style="text-align:center">Message</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($data as $key => $fn)
                    <tr>
                        <td style="text-align:center">{{++$key}}</td>
                        <td style="text-align:center">{{$fn['machine']['name']}}</td>
                        <td style="text-align: center;">{{$fn['created_at']}}</td>
                        <td style="text-align:center;">{{$fn['on_time']}}</td>

                        <td style="text-align:center;">
                        @if($fn['user_estimation'])
                            @if (count($fn['user_estimation']) > 0)
                                {{$fn['user_estimation'][0]['hour']}}
                            @else
                                {{'-'}}
                            @endif
                        
                        @else{{'-'}}
                        @endif
                        </td>
                        <td style="text-align:center">{{$fn['actual_hour']}}</td>
                        <td style="text-align:center">
                        @if($fn['user_estimation'])
                            @if (count($fn['user_estimation']) > 0)
                                {{$fn['user_estimation'][0]['reason_data']['reason']}}
                            @else
                                {{'-'}}
                            @endif
                         
                        @else{{'-'}}
                        @endif
                        </td>
                        <td style="text-align:center">
                         @if($fn['user_estimation'])
                            @if (count($fn['user_estimation']) > 0)
                            {{$fn['user_estimation'][0]['msg']}}
                            @else
                                {{'-'}}
                            @endif
                         
                        @else{{'-'}}
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
            </htmlpagefooter>
            <!-- <htmlpagefooter name="page-footer" style="bottom: 0px">
                <div style="text-align: center;color:#cac5c5">{PAGENO}</div>
                <img src="{{ public_path('/img/Footer_.png') }}">
            </htmlpagefooter> -->
    </body>
</html>