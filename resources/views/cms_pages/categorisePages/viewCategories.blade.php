@extends('layoutCMS.layout')
@section('style')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: right;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endsection
@section('nav_title', 'الأصناف')
@section('nav_subTitle', 'عرض الأصناف')
@section('content')
    <table>
        <tr>
            <th>رقم الصنف</th>
            <th>اسم الصنف</th>
            <th>التوافر</th>
            <th>تاريخ الإضافة</th>
            <th>العمليات</th>

        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                @if ($category->isAvailable)
                    <td>متوفر</td>
                @else
                    <td>غير متوفر</td>
                @endif
                <td>{{ $category->created_at }}</td>
                <td>
                    <a onclick="confirmDialog({{ $category->id }},this)" class="glyphicon glyphicon-remove"
                        style="color: red"></a>
                        <a href="{{route("Categories.edit",$category->id)}}" class="glyphicon glyphicon-edit"></a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function confirmDialog(id, ref) {
            Swal.fire({
                title: 'هل أنت متأكد',
                text: "لا يمكن التراجع عن ذلك",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم متأكد'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCategory(id, ref)
                }
            })
        }

        function deleteCategory(id, ref) {
            axios.delete("/Categories/" + id)
                .then(function(response) {
                    ref.closest("tr").remove();
                    messageDialog(response.data);
                })
                .catch(function(error) {
                    messageDialog(error.response.data)
                })

        }

        function messageDialog(data) {
            Swal.fire({
                position: 'top-end',
                icon: data["icon"],
                title: data["title"],
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
@endsection
