@extends('layoutCMS.layout')
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
@section("nav_title" , "الاصناف")
@section("nav_subTitle" , "تعديل صنف")
@section("content")
@if ($errors->any())
<div class="error">
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
    
@endif
    <form action="{{route("Categories.update",$category->id)}}" method="post">
        @csrf
        @method("put")
      <label for="c_name">اسم الصنف</label>
      <input type="text" id="c_name" name="c_name" placeholder="إدخل اسم الصنف" value="{{$category->name}}">

      <label for="available_status">هل الصنف متوفر؟</label>
      <select id="available_status" name="available_status">
        <option value="1" @if ($category->isAvailable==1) selected
        @endif>متوفر</option>
        <option value="-1" @if ($category->isAvailable==0) selected
            @endif>غير متوفر</option>
      </select>
      <input type="submit" value="تعديل">
    </form>

    @if (session("message"))
    <div class="sucsses">
        {{session("message")}}
    </div>
        
    @endif
@endsection

@section("script")
@endsection