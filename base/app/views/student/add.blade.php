@extends('layout.main')
@section('content')
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['errors'] as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span>{{$_SESSION['success']}}</span>
    @endif
        <form action="{{route('post-student')}}" method="post">
        <label>Tên sinh viên</label>
        <input type="text" name="name">
        <label>Năm sinh</label>
        <input type="text" name="year_of_birth">
        <label>Số điện thoại</label>
        <input type="text" name="phone_number">
        <input type="submit" name="btn-submit" value="Gửi">
    </form>
@endsection