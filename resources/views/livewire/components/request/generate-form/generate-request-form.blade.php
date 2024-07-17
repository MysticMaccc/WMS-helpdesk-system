<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Request Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: smaller;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: left;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-section th {
            background-color: #ddd;
            font-size: smaller;
        }

        .form-section td {
            background-color: #fff;
            font-size: x-small;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .italic {
            font-style: italic;
        }

        .text-center {
            text-align: center;
        }

        .no-border {
            border: none;
        }

        .w-100 {
            width: 100%;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            text-align: center;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>

<body>
    <footer class="w-100">
        <table class="w-100">
            <tr>
                <td class="text-right no-border">
                    <small><i>Page <span class="pagenum"></span></i><i> (This document is system generated.)</i></small>
                </td>
            </tr>
        </table>
    </footer>
    <div class="header text-uppercase">
        {{$requestData->company->name}}
    </div>
    <p class="italic">Reference Number: {{$requestData->reference_number}}</p>

    <table class="form-section">
        <thead>
            <tr>
                <th class="text-center" colspan="2">Request Form</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Name:</td>
                <td>{{$requestData->user->full_name}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{$requestData->user->email}}</td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>{{$requestData->department->name}}</td>
            </tr>
            <tr>
                <td>Status of Request:</td>
                <td>{{$requestData->status->name}}</td>
            </tr>
            <tr>
                <td>Request Date:</td>
                <td>{{$requestData->created_at->format('M d, Y H:i:s A')}}</td>
            </tr>
        </tbody>
    </table>

    <table class="form-section">
        <thead>
            <tr>
                <th class="text-center" colspan="2">Request Detail <span class="italic">({{$requestData->request_type->name}})</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="1">Details</th>
                <th colspan="1">Cost</th>
            </tr>
            @foreach($detailData as $detail)
            <tr>
                <td colspan="1">{{$detail->details}}</td>
                <td colspan="1">{{number_format($detail->cost, 2)}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="form-section">
        <thead>
            <tr>
                <th class="text-center" colspan="3">History of Request</th>
            </tr>
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>Performed By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requestData->request_update_log as $history)
            <tr>
                <td>{{$history->created_at->format('M d, Y H:i:s A')}}</td>
                <td>{{$history->status->name}}</td>
                <td>{{$history->modified_by}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>