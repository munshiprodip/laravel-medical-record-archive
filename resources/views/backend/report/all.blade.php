<html>
<head>
    <title>KYAMCH MRA | Repotr - All patients files</title>
    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1cm;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 1cm;
            right: 1cm;
            height: 1.5cm;

            /** Extra personal styles **/
            text-align: center;
        }
        .footer-table, .content-table{
            width: 100%;
            border-collapse: collapse;
        }
        .content-table, .content-table th, .content-table td{
            border: 1px solid #010101;
            padding: 3px;
        }
        .footer-table
    </style>
</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>
    <img src="{{ asset('public/backend/assets/images/header.png')}}" alt="Header" width="100%" height="100%" />
</header>

<footer>
    <hr/>
    <table class="footer-table">
        <tr>
            <td width="33%">{{ $userId }}</td>
            <td style="text-align: center">{{ $date }}</td>
            <td width="33%" style="text-align: right">www.kyamch.org</td>
        </tr>
    </table>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
    <h3 style="text-align: center; text-decoration: underline;" >{{ $title }}</h3>

    <table class="content-table">
        <thead>
            <tr>
                <th>SL</th>
                <th>Registration No</th>
                <th>Admission No</th>
                <th>Patient Name</th>
                <th>Ward Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $row->hn }}</td>
                <td>{{ $row->an }}</td>
                <td>{{ $row->patient_name }}</td>
                <td>{{ $row->ward->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
