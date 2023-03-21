@extends('layoutCMS.layout')
@section('nav_title', 'المنتجات')
@section('nav_subTitle', 'عرض المنتجات')
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
@section('content')
    <table>
        <tr>
            <th>رقم المنتج</th>
            <th>اسم المنتج</th>
            <th>سعر المنتج</th>
            <th>رقم الصنف</th>
            <th>تاريخ الإضافة</th>
            <th>العمليات</th>

        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    {{ $product->category_id }}
                </td>
                <td>
                    {{ $product->created_at }}
                </td>
                <td>
                    <a onclick="confirmDelete({{ $product->id }},this)" class="glyphicon glyphicon-remove"
                        style="color: red"></a>

                        <a href="{{route("Products.edit",$product->id)}}" class="glyphicon glyphicon-edit"></a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function confirmDelete(id , ref) {
            Swal.fire({
                title: 'هل أنت متاكد ؟',
                text: "لن تستطيع التراجع عن الحذف",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم احذفه'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteProduct(id, ref)
                }
            });
        }

        function deleteProduct(id, ref) {
            // Make a request for a user with a given ID
            axios.delete('/Products/'+ id)
                .then(function(response) {
                    ref.closest("tr").remove();
                    dialogAfterDelete(response.data);
                })
                .catch(function(error) {
                    dialogAfterDelete(error.response.data);
                });
        }

        function dialogAfterDelete(data) {
            Swal.fire({
                position: 'top-end',
                icon: data.icon,
                title: data.title,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endsection
