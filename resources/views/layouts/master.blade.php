<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
            margin: 0px !important
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 50% !important;
        }

        div.table-responsive>div.dataTables_wrapper>div.row {
            padding: 10px
        }

        table.dataTable>tbody>tr {
            text-align: center;
        }

        .dataTables_wrapper .dataTable .btn {
            padding: 5px;
        }
    </style>
    <title>@yield('titre')</title>
</head>

<body>

    <div class="container-scroller">
        @include('layouts.topbar')
        <div class="container-fluid page-body-wrapper" style="padding-left: 0px;padding-right: 0px;padding-top: 35px;">
            @include('layouts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>





    @include('layouts.script')
</body>

</html>
