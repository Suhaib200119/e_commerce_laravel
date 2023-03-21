@extends("layoutCMS.layout")
@section("style")
<style>
    input[type=text], select {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    label{
        font-size: 14px
    }
    .error{
        background-color: red;
        height: 30px;
        text-align: right;
      
      
    }
    .sucsses{
        background-color: #4CAF50;
        color: white;
        height: 30px;
        text-align: right;
       
    }
    
    </style>
@endsection
@section("nav_title","المنتجات")
@section("nav_subTitle","إضافة منتج")
@section("content")

@if ($errors->any()){
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error )
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
}
    
@endif
<form action="{{route("Products.store")}}" method="post">
    @csrf
  <label for="p_name">اسم المنتج</label>
  <input type="text" id="p_name" name="p_name" placeholder="إدخل اسم المنتج">

  <label for="p_price">سعر المنتج</label>
  <input type="text" id="p_price" name="p_price" placeholder="إدخل سعر المنتج">


  <label for="category">الصنف الذي ينتمي إليه المنتج</label>
  <select id="category_id" name="category_id">
   @foreach ($categories as $category)
   <option value="{{$category->id}}">{{$category->name}}</option>
   @endforeach
  </select>
  <input type="submit" value="إضافة">
</form>

@if (session("message"))
<div class="sucsses">
    {{session("message")}}
</div>
    
@endif
@endsection

@section("script")
    
@endsection